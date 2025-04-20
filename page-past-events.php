<?php
get_header();
?>
<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg') ?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">
           Past Events</h1>
        <div class="page-banner__intro">
            <p>A recap of our past events.</p>
        </div>
    </div>
</div>
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
        $pastEvents->the_post(); ?>
        <div class="event-summary">
          <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
            <span class="event-summary__month"><?php 
            $eventDate=new DateTime(get_field('event_date'));
            echo $eventDate->format('M'); // Get the month name from the event date
            ?></span>          
            </span>
            <span class="event-summary__day">
              <?php  echo $eventDate-> format('d')?>
            </span>
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h5>
            <p><?php echo wp_trim_words(get_the_content(), 18); ?> 
            <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a>
          </p>
          </div>
        </div>
    <?php }
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