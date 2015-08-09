<?php
/**
 * greydon functions and definitions
 *
 * @package greydon
 */

//Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}
if ( ! function_exists( 'greydon_setup' ) ) :
function greydon_setup() {
	// Add language support
	load_theme_textdomain( 'greydon', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	//Let WordPress manage the document title.
	add_theme_support( 'title-tag' );
	//Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'greydon' ),
	) );
	// Switch default markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	//Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
	// Set up the WordPress custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'greydon_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // greydon_setup
add_action( 'after_setup_theme', 'greydon_setup' );
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function greydon_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'greydon' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'greydon_widgets_init' );

/**
*	Use latest jQuery release
*/
if( !is_admin() ){
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false, '');
	wp_enqueue_script('jquery');
}

/**
 * Enqueue scripts and styles.
 */
function greydon_scripts() {
	// Main stylesheet
	wp_enqueue_style( 'greydon-style', get_stylesheet_uri() );
	// Main javascript file with jquery
	wp_enqueue_script( 'greydon-javascript', get_template_directory_uri() . '/js/app.js', array('jquery'), '20130115', true );
	// Google Fonts
	wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Droid+Serif|Droid+Sans');
	wp_enqueue_style( 'googleFonts');
	wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), '4.0.3' );
	// Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'greydon_scripts' );
// Implement the Custom Header feature.
  //require get_template_directory() . '/inc/custom-header.php';
//Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';
//Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';
//Load Jetpack compatibility file.
require get_template_directory() . '/inc/jetpack.php';
/**
* Clean up navigation
*/
//Deletes all CSS classes and id's, except for those listed in the array below
function custom_wp_nav_menu($var) {
	return is_array($var) ? array_intersect($var, array(
		//List of allowed menu classes
		'current_page_item',
		'current_page_parent',
		'current_page_ancestor',
		'first',
		'last',
		'vertical',
		'horizontal',
		'menu-item-has-children'
	)
	) : '';
}
add_filter('nav_menu_css_class', 'custom_wp_nav_menu');
add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
add_filter('page_css_class', 'custom_wp_nav_menu');
//Replaces "current-menu-item" with "active"
function current_to_active($text){
	$replace = array(
		//List of menu item classes that should be changed to "active"
		'current_page_item' => 'active',
		'current_page_parent' => 'active',
		'current_page_ancestor' => 'active',
	);
	$text = str_replace(array_keys($replace), $replace, $text);
	return $text;
}
add_filter ('wp_nav_menu','current_to_active');
add_action( 'after_setup_theme', 'greydon_setup' );
// Remove meta links at header
remove_action( 'wp_head', 'wp_generator' ) ;
remove_action( 'wp_head', 'wlwmanifest_link' ) ;
remove_action( 'wp_head', 'rsd_link' ) ;
// Remove RSS feeds
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );

// Remove emoji's
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Woo Commerce support
// add_action( 'after_setup_theme', 'woocommerce_support' );
// function woocommerce_support() {
//     add_theme_support( 'woocommerce' );
// }
