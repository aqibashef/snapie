<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package snapie
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function snapie_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'snapie_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function snapie_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'snapie_pingback_header' );

/**
 * Register Widget area for nav menu
 */

function snapie_primary_nav_widget(){
	register_sidebar(array(
		'name'			=> __('Nav Menu Footer', 'snapie'),
		'id'			=> 'nav_menu_footer',
		'before_widget' => '<div id="nav-menu-footer" class="nav-menu-footer">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'snapie_primary_nav_widget');

/**
 *
 */

function snapie_nav_social_icon_widget(){
	register_widget('Nav_Social_Icon');
}
add_action('widgets_init', 'snapie_nav_social_icon_widget');