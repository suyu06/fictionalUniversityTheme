<!-- <h1>Greetings from header.php</h1> -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <!-- <meta charset="UTF-8">-->
  <!-- <title>Document</title> -->
  <meta charset="<?php bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!-- <h1>Fictional University</h1> -->
  <header class="site-header">
    <div class="container">
      <h1 class="school-logo-text float-left">
        <a href="<?php echo site_url() ?>"><strong>Fictional</strong> CEGEP</a>
      </h1>
      <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu group">
        <nav class="main-navigation">
          <ul>
            <li <?php
                if (is_page('about-us') or wp_get_post_parent_id(0) == 12) echo 'class="current-menu-item"' ?>>
              <a href="<?php echo site_url('/about-us') ?>">About us</a>
            </li>
            <li <?php if (get_post_type() == 'program') echo 'class="current-menu-item"'; ?>>
              <a href="<?php echo get_post_type_archive_link('program')?>">Programs</a></li>
            <li <?php if (get_post_type() == 'event'OR is_page('past-events')) echo 'class="current-menu-item"'; ?>>
              <a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a>
            </li>
            <li><a href="#">Campuses</a></li>
            <li <?php
                if (get_post_type() == 'post') echo 'class="current-menu-item"' ?>>
              <a href="<?php echo site_url('/blog'); ?>">Blog</a>
            </li>
          </ul>
          <!-- dymamic nav menu -->
          <!-- <?php
                wp_nav_menu(array(
                  'theme_location' => 'headerMenuLocation'
                ));
                ?> -->
        </nav>
        <div class="site-header__util">
          <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
          <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
          <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
      </div>
    </div>
  </header>