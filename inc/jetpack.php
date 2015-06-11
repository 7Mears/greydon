<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package greydon
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function greydon_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'greydon_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function greydon_jetpack_setup
add_action( 'after_setup_theme', 'greydon_jetpack_setup' );

function greydon_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function greydon_infinite_scroll_render