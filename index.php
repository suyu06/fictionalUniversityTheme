<?php
get_header();
?>
<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg') ?>)"></div>
    <div class="page-banner__content container container--narrow">
        <!-- replace the static title with dynamic title according to different pages -->
        <!-- <h1 class="page-banner__title">Our History</h1> -->
        <h1 class="page-banner__title">Welcome to our blog!</h1>
        <div class="page-banner__intro">
            <p>Keep up with our latest news.</p>
        </div>
    </div>
</div>
<div class="container container--narrow page-section">
    <?php
    // if there is a post, then show the the title and content of the post
    while (have_posts()) {
        the_post(); ?>
        <div class="post_item">
            <h2 class="headline headline--medium headline--post-title">
                <!-- show the title -->
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <div class="metabox">
                <!-- show the infos, such as author,date and category -->
                <p>Posted by <?php the_author_posts_link(); ?>
                    on <?php the_time('Mj Y'); ?>
                    in <?php echo get_the_category_list(', '); ?></p>
            </div>
            <div class="generic-content">
                <?php the_excerpt(); ?>
                <!-- continuing reading part -->
                <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">
                        Continue Reading &raquo;</a>
                </p>
            </div>
        </div>

    <?php }
    echo paginate_links();
    ?>

</div>
<?php
get_footer();
?>