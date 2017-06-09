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

function snapie_projects_post_type(){
    register_post_type('projects', array(
        'labels'				=> array(
            'name'					=> __('Projects', 'snapie'),
            'singular_name'			=> __('Project', 'snapie'),
            'menu_name'          	=> __( 'Projects', 'snapie' ),
            'name_admin_bar'     	=> __( 'Project', 'snapie' ),
            'add_new'            	=> __( 'Add New', 'snapie' ),
            'add_new_item'       	=> __( 'Add New Project', 'snapie' ),
            'new_item'           	=> __( 'New Project', 'snapie' ),
            'edit_item'          	=> __( 'Edit Project', 'snapie' ),
            'view_item'          	=> __( 'View Project', 'snapie' ),
            'all_items'          	=> __( 'All Projects', 'snapie' ),
            'search_items'       	=> __( 'Search Project', 'snapie' ),
            'parent_item_colon'  	=> __( 'Parent Project:', 'snapie' ),
            'not_found'          	=> __( 'No project found.', 'snapie' ),
            'not_found_in_trash' 	=> __( 'No project found in Trash.', 'snapie' )
        ),
        'description'			=> __('All new amazing projects here', 'snapie'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail', 'comments', 'editor' )
    ));

    $labels = array(
        'name'               => __('Project Categories', 'snapie'),
        'singular'           => __('Project Category', 'snapie'),
        'search_items'       => __('Search Project Category', 'snapie'),
        'all_items'         => __( 'All Project Categories', 'snapie' ),
        'parent_item'       => __( 'Parent Project Category', 'snapie' ),
        'parent_item_colon' => __( 'Parent Project Category:', 'snapie' ),
        'edit_item'         => __( 'Edit Project Category', 'snapie' ),
        'update_item'       => __( 'Update Project Category', 'snapie' ),
        'add_new_item'      => __( 'Add New Project Category', 'snapie' ),
        'new_item_name'     => __( 'New Project Category Name', 'snapie' ),
        'menu_name'         => __( 'Project Category', 'snapie' ),
    );

    register_taxonomy('project-category', 'projects', array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true
    ));
}
add_action('init', 'snapie_projects_post_type');

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