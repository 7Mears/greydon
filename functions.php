<?php
/**
 * eyedea functions and definitions
 *
 * @package eyedea
 */

//Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'eyedea_setup' ) ) :
function eyedea_setup() {

	// Add language support
	load_theme_textdomain( 'eyedea', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	//Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	//Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'eyedea' ),
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
	add_theme_support( 'custom-background', apply_filters( 'eyedea_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // eyedea_setup
add_action( 'after_setup_theme', 'eyedea_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function eyedea_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'eyedea' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'eyedea_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function eyedea_scripts() {
	// Main stylesheet
	wp_enqueue_style( 'eyedea-style', get_stylesheet_uri() );

	wp_enqueue_script( 'eyedea-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'eyedea-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	// Main javascript file with jquery
	wp_enqueue_script( 'eyedea-javascript', get_template_directory_uri() . '/js/script.js', array('jquery'), '20130115', true );
	// Google Fonts
	wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Roboto:500,900,400italic,100,700italic,300,700,500italic,100italic,300italic,400|Roboto+Slab:400,100,300,700');
	wp_enqueue_style( 'googleFonts');
	wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), '4.0.3' );

	// Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'eyedea_scripts' );

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


add_action( 'after_setup_theme', 'platinum_setup' );

// Remove meta links at header
remove_action( 'wp_head', 'wp_generator' ) ;
remove_action( 'wp_head', 'wlwmanifest_link' ) ;
remove_action( 'wp_head', 'rsd_link' ) ;
// Remove RSS feeds
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
