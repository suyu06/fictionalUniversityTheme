<?php
get_header();
pageBanner(array(
    'title'=> 'Past Events',
    'subtitle'=> 'A recap of our past events.'));
?>
<!-- <div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg') ?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">
           Past Events</h1>
        <div class="page-banner__intro">
            <p>A recap of our past events.</p>
        </div>
    </div>
</div> -->
<div class="container container--narrow page-section">
    <?php    
    $pastEvents = new WP_Query(        
        array(
            $today=date('Ymd'),
            // Get the current page number for pagination
            'paged' => get_query_var('paged', 1), 
            'posts_per_page' =>1, 
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',  // Use 'meta_value_num' for numeric sorting   
            'order' => 'ASC',  // Order by descending date
            'meta_query' => array(
                array(
                    'key' => 'event_date',
                    'compare' => '<',
                    'value' =>$today,  // Compare with the current date in Ymd format
                    'type' => 'numeric'  // Ensure the comparison is numeric
                )
            ),
        )
    );
    // if there is a post, then show the the title and content of the post
    while ($pastEvents->have_posts()) {
        $pastEvents->the_post(); 
        get_template_part('template-parts/content', 'event');          
    }
    // show the pagination links
    echo paginate_links(array(
        'total' => $pastEvents->max_num_pages, // Total number of pages
        'current' => max(1, get_query_var('paged')), // Current page number
        'prev_text' => __('« Previous'), // Text for the previous page link
        'next_text' => __('Next »'), // Text for the next page link
    ));
    ?>

</div>
<?php
get_footer();
?>