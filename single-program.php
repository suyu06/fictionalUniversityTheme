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
           <span class="metabox__main"><?php the_title();?></span>
        </p>
      </div>
       <div class="generic-content"><?php the_content(); ?></div>     
      </div>     
      <!-- <h2><?php the_title(); ?></h2>
      <p><?php the_content(); ?></p>  -->
<?php         }
get_footer();
?>