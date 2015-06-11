<?php
/**
* @package greydon
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="page">

    <header class="site-header" role="banner">
      <div class="container">

        <div class="site-branding">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img id="slide-img-1" src="<?php echo get_bloginfo('template_directory');?>/images/logo.png" class="site-logo" alt="" /></a>
        </div>
        <!-- /site-branding -->

        <nav id="site-navigation" class="main-navigation" role="navigation">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="menu-lines"></span>
          </button>
          <?php wp_nav_menu( array( 'theme_location'=>'primary', 'menu_id' => 'primary-menu' ) ); ?>
        </nav>
        <!-- /site-navigation -->

      </div>
      <!-- /container -->
    </header>
