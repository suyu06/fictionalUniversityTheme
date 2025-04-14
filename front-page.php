<!-- This is our amazing custom theme. -->
<!-- function & arrays-->
<!-- <?php
      function greet($name, $color)
      {
        echo "<p>Hi,my name is $name and my favorite color is $color</p>";
      }
      greet("Jean", "vert");
      greet("martin", "bleu");
      ?>
<h1><?php bloginfo("name"); ?></h1>
<h1><?php bloginfo("description"); ?></h1>

<?php
$count = 1;
while ($count < 10) {
  echo "<li>$count</li>";
  $count++;
}
?>
<?php
$names = array("Matin", "Pierre", "Ziba", "suzy");
$n = 0;
while ($n < count($names)) {
  echo "<li>$names[$n]</li>";
  $n++;
}

?> -->
<?php get_header(); ?>

<!--while(have_posts()){
            the_post();?>
       <h2><a href= "<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
       <p><?php the_content(); ?></p>  -->

<div class="page-banner">
  <!-- fix the image url problem -->
  <!-- <div class="page-banner__bg-image" style="background-image: url(images/library-hero.jpg)"></div> -->
  <div class="page-banner__bg-image"
    style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg') ?>)"></div>
  <div class="page-banner__content container t-center c-white">
    <h1 class="headline headline--large">Welcome!</h1>
    <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
    <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
    <a href="#" class="btn btn--large btn--blue">Find Your Major</a>
  </div>
</div>

<div class="full-width-split group">
  <div class="full-width-split__one">
    <div class="full-width-split__inner">
      <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>

      <div class="event-summary">
        <a class="event-summary__date t-center" href="#">
          <span class="event-summary__month">Mar</span>
          <span class="event-summary__day">25</span>
        </a>
        <div class="event-summary__content">
          <h5 class="event-summary__title headline headline--tiny"><a href="#">Poetry in the 100</a></h5>
          <p>Bring poems you&rsquo;ve wrote to the 100 building this Tuesday for an open mic and snacks. <a href="#" class="nu gray">Learn more</a></p>
        </div>
      </div>
      <div class="event-summary">
        <a class="event-summary__date t-center" href="#">
          <span class="event-summary__month">Apr</span>
          <span class="event-summary__day">02</span>
        </a>
        <div class="event-summary__content">
          <h5 class="event-summary__title headline headline--tiny"><a href="#">Quad Picnic Party</a></h5>
          <p>Live music, a taco truck and more can found in our third annual quad picnic day. <a href="#" class="nu gray">Learn more</a></p>
        </div>
      </div>

      <p class="t-center no-margin"><a href="#" class="btn btn--blue">View All Events</a></p>
    </div>
  </div>
  <div class="full-width-split__two">
    <div class="full-width-split__inner">
      <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
      <?php
      // Custom query to get the latest 2 posts
      // The 'posts_per_page' parameter controls how many posts to retrieve
      // The 'post_type' parameter specifies the type of posts to retrieve
      // The 'orderby' and 'order' parameters control the order of the posts
      $homepagePosts = new WP_Query(
        array(
          'posts_per_page' => 2,
          'post_type' => 'post',
          'orderby' => 'post_date',
          'order' => 'DESC'
        )
      );
      // Check if there are posts to display
      while ($homepagePosts->have_posts()) {
        $homepagePosts->the_post(); ?>
        <div class="event-summary">
          <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
            <span class="event-summary__month"><?php the_time('M'); ?></span>
            <span class="event-summary__day"><?php the_time('d'); ?></span>
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <p><?php echo wp_trim_words(get_the_content(), 18); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
          </div>
        </div>

      <?php }
      // Reset the post data to the original query
      wp_reset_postdata(); ?>


      <p class="t-center no-margin">
        <a href="<?php echo site_url('/blog'); ?>" class="btn btn--yellow">View All Blog Posts</a>
      </p>
    </div>
  </div>
</div>

<div class="hero-slider">
  <div data-glide-el="track" class="glide__track">
    <div class="glide__slides">
      <!-- fix the image url problem -->
      <!-- <div class="hero-slider__slide" style="background-image: url(images/bus.jpg)"> -->
      <div class="hero-slider__slide"
        style="background-image: url(<?php echo get_theme_file_uri('/images/bus.jpg') ?>)">
        <div class="hero-slider__interior container">
          <div class="hero-slider__overlay">
            <h2 class="headline headline--medium t-center">Free Transportation</h2>
            <p class="t-center">All students have free unlimited bus fare.</p>
            <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
          </div>
        </div>
      </div>
      <!-- fix the image url problem -->
      <!-- <div class="hero-slider__slide" style="background-image: url(images/apples.jpg)"> -->
      <div class="hero-slider__slide"
        style="background-image: url(<?php echo get_theme_file_uri('/images/apples.jpg') ?>)">
        <div class="hero-slider__interior container">
          <div class="hero-slider__overlay">
            <h2 class="headline headline--medium t-center">An Apple a Day</h2>
            <p class="t-center">Our dentistry program recommends eating apples.</p>
            <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
          </div>
        </div>
      </div>
      <!-- fix the image url problem -->
      <!-- <div class="hero-slider__slide" style="background-image: url(images/bread.jpg)"> -->
      <div class="hero-slider__slide"
        style="background-image: url(<?php echo get_theme_file_uri('images/bread.jpg') ?>)">
        <div class="hero-slider__interior container">
          <div class="hero-slider__overlay">
            <h2 class="headline headline--medium t-center">Free Food</h2>
            <p class="t-center">Fictional University offers lunch plans for those in need.</p>
            <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
  </div>
</div>
<?php get_footer();
?>