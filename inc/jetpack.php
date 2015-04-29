<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package eyedea
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function eyedea_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'eyedea_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function eyedea_jetpack_setup
add_action( 'after_setup_theme', 'eyedea_jetpack_setup' );

function eyedea_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function eyedea_infinite_scroll_render