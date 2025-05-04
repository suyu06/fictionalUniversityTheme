<?php 
      get_header();
      while(have_posts()){
            the_post();
            pageBanner(
              
            );        
              ?>


      <!-- <h1>This is a page, not a post</h1>
      <h2><?php  the_title();?></h2>
      <p><?php the_content() ;?></p>  -->
      <!-- <div class="page-banner">
      <div class="page-banner__bg-image"
       style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg')?>)"></div>
      <div class="page-banner__content container container--narrow">
       //  replace the static title with dynamic title according to different pages 
        //<h1 class="page-banner__title">Our History</h1> 
        <h1 class="page-banner__title"><?php the_title();?></h1>
        <div class="page-banner__intro">
          <p>Don't forget to replace me later</p>
        </div>
      </div>
    </div> -->

    <div class="container container--narrow page-section">
      <!-- only show "return to parent page,if it's in the child page" -->
      <?php
      $theParent = wp_get_post_parent_id(get_the_ID());
       if($theParent){?>
        <div class="metabox metabox--position-up metabox--with-home-link">
        <!-- <p>
          <a class="metabox__blog-home-link"
           href="<?php echo site_url('/about-us') ?>">
           <i class="fa fa-home" aria-hidden="true"></i> Back to About Us</a>
           <span class="metabox__main">Our History</span>
        </p> -->
        <p>
          <a class="metabox__blog-home-link"
           href="<?php echo get_permalink($theParent); ?>">
           <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent);?></a>
           <span class="metabox__main"><?php the_title();?></span>
        </p>
      </div>
      <?php } ?>
      <!-- the column on the right side of the parent page -->
       <?php
       $testArray = get_pages(array(
         'child_of'=> get_the_ID()
       ));
      //  check if the current page has children or not
      if($theParent or $testArray){?> 
      <div class="page-links">
        <!-- change the static parent page name into dynamic -->
        <!-- <h2 class="page-links__title"><a href="#">About Us</a></h2> -->
        <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent); ?>"><?php echo get_the_title($theParent);?></a></h2>
        <!-- change the static code  -->
        <!-- <ul class="min-list">
          <li class="current_page_item"><a href="#">Our History</a></li>
          <li><a href="#">Our Goals</a></li>
        </ul> -->
        <ul class="min-list">
          <?php
          if($theParent){
            $findChildrenOf = $theParent;
          }else{
            $findChildrenOf = get_the_ID();
          }
          wp_list_pages(array(
            'title_li'=> NULL,
            'child_of'=> $findChildrenOf,
            'sort_column'=> 'menu_order'
          ));
          ?>
        </ul> 
      </div>
     <?php } ?>

      <!-- replace the static content with dynamic content according to different pages -->
      <div class="generic-content">        
        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p> -->
        <?php the_content();?>
      </div>
    </div>
<?php         }
      get_footer();
?>