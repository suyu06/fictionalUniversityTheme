<?php
get_header();
while (have_posts()) {
  the_post(); ?>
  <div class="page-banner">
    <div class="page-banner__bg-image"
      style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg') ?>)"></div>
    <div class="page-banner__content container container--narrow">
      <!-- replace the static title with dynamic title according to different pages -->
      <!-- <h1 class="page-banner__title">Our History</h1> -->
      <h1 class="page-banner__title"><?php the_title(); ?></h1>
      <div class="page-banner__intro">
        <p>Keep up with our latest news.</p>
      </div>
    </div>
  </div>
  <div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p>
        <a class="metabox__blog-home-link"
          href="<?php echo get_post_type_archive_link('program'); ?>">
          <i class="fa fa-home" aria-hidden="true"></i> All Programs</a>
        <span class="metabox__main"><?php the_title(); ?></span>
      </p>
    </div>
    <div class="generic-content"><?php the_content(); ?></div>

    <?php
    // custom query to get the professors related to the program
    $relatedProfessors = new WP_Query(
      array(
        'posts_per_page' => -1,
        'post_type' => 'professor',
        'orderby' => 'title',
        'order' => 'ASC',  // Order by ascending date
        'meta_query' => array(
          array(
            'key' => 'related_programs',
            'compare' => 'LIKE',
            'value' => '"' . get_the_ID() . '"',  // Compare with the current program ID
            // The 'LIKE' operator is used to check if the program ID is in the related programs field    
          ),

        )
      )
    );
    if ($relatedProfessors->have_posts()) {
      echo '<hr class="section-break">';
      echo '<h2 class="headline headline--medium">' . get_the_title() . ' Professors </h2>';
      while ($relatedProfessors->have_posts()) {
        $relatedProfessors->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php }
    }
    wp_reset_postdata(); // Reset the post data after custom query
    // This is important to avoid conflicts with the main query
    ?>
    <hr class="section-breawk">
    <?php
    // custom query to get the events related to the program

    $homepageEvents = new WP_Query(
      array(
        $today = date('Ymd'),  // Get today's date in Ymd format
        'posts_per_page' => 2,
        'post_type' => 'event',
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',  // Use 'meta_value_num' for numeric sorting   
        'order' => 'ASC',  // Order by ascending date
        'meta_query' => array(
          array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $today,  // Compare with the current date in Ymd format
            'type' => 'numeric'  // Ensure the comparison is numeric
          ),
          array(
            'key' => 'related_programs',
            'compare' => 'LIKE',
            'value' => '"' . get_the_ID() . '"',  // Compare with the current program ID
            // The 'LIKE' operator is used to check if the program ID is in the related programs field    
          ),

        )
      )
    );
    if ($homepageEvents->have_posts()) {
      // echo '<hr class="section-break">';
      echo '<h2 class="headline headline--medium">Upcoming ' . get_the_title() . ' Events </h2>';

      while ($homepageEvents->have_posts()) {
        $homepageEvents->the_post(); ?>
        <div class="event-summary">
          <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
            <span class="event-summary__month"> <?php
                                                // Get the month name from the event date
                                                $eventDate = new DateTime(get_field('event_date'));
                                                echo $eventDate->format('M'); ?>
            </span>

            <span class="event-summary__day">
              <?php
              // Get the day of the month from the event date
              // The 'd' format returns the day of the month with leading zeros (01 to 31)
              echo $eventDate->format('d'); ?>
            </span>
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h5>
            <p><?php if (has_excerpt()) {
                  echo get_the_excerpt();
                } else {
                  echo wp_trim_words(get_the_content(), 18);
                } ?>
              <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a>
            </p>
          </div>
        </div>
    <?php }
    }
    ?>
  </div>

<?php         }
get_footer();
?>