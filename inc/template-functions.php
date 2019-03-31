<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package the-business-wp
 * @since 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function the_business_wp_body_classes( $classes ) {
	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
		$classes[] = 'has-sidebar';
	}


	// Add class if the site title and tagline is hidden.
	if ( 'blank' === get_header_textcolor() ) {
		$classes[] = 'title-tagline-hidden';
	}

	// Get the colorscheme or the default if there isn't one.
	$colors    = the_business_wp_sanitize_colorscheme( get_theme_mod( 'colorscheme', 'blue' ) );
	$classes[] = 'colors-' . $colors;
	
	// Get the colorscheme or the default if there isn't one.
	$scheme    = esc_html(get_theme_mod( 'fontsscheme', 'default' ) );
		
	if ('default' !=$scheme) {
	    $classes[] = 'custom-fonts';
	}	

	return $classes;
}
add_filter( 'body_class', 'the_business_wp_body_classes' ); 


/**
 * Checks to see if we're on the front page or not.
 */
function the_business_wp_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}
