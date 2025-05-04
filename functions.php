<?php

function pageBanner($args = NULL)
{
    // php logic will go here
    if (!isset($args['title'])) {
        // if the title is not set, set it to the current page title
        $args['title'] = get_the_title();
    }
    if (!isset($args['subtitle'])) {
        // if the subtitle is not set, set it to the current page subtitle
        $args['subtitle'] = get_field('pager_banner_subtitle1');
    }
    if (!isset($args['photo'])) {
        // if the photo is not set,and if there is bcg image, set it to the bcg image
        if (get_field('page_banner_background_image')) {
            $pageBannerImage = get_field('page_banner_background_image');
            $args['photo'] = $pageBannerImage['sizes']['pageBanner'];
        } else {
            // if the photo is not set, set it to the default photo
            $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
        }
    }
?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image:url(<?php echo $args['photo']; ?>)"></div>
        <!-- <?php print_r($pageBannerImage) ?> -->
        <div class="page-banner__content container container--narrow">            
            <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
            <div class="page-banner__intro">
                <!-- <p><?php the_field('page_banner_subtitle1') ?></p> -->
                <p><?php echo $args['subtitle']; ?></p>
            </div>
        </div>
    </div>
<?php }

function university_files()
{
    // wp_enqueue_style('university_main_styles',get_stylesheet_uri());
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'university_files');

function university_features()
{
    //  dymamic nav menu
    // register_nav_menu('headerMenuLocation','Header Menu Location');
    // register_nav_menu('footerLocationOne','Footer Location One');
    // register_nav_menu('footerLocationTwo','Footer Location Two');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorLandscape', 400, 260, true);
    add_image_size('professorPortrait', 480, 650, true);
    add_image_size('pageBanner', 1500, 350, true);
}
add_action('after_setup_theme', 'university_features');

// Add custom post type for event
function university_adjust_queries($query)
{
    if (!is_admin() && is_post_type_archive('event') && $query->is_main_query()) {
        // Set the number of posts per page to all posts
        $query->set('posts_per_page', -1);
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => date('Ymd'),
                'type' => 'numeric'
            )
        ));
    }
    if (!is_admin() && is_post_type_archive('program') && $query->is_main_query()) {
        $query->set('posts_per_page', -1);
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
}
add_action('pre_get_posts', 'university_adjust_queries');
