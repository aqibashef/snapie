<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package PhotoMash
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function photomash_body_classes( $classes ) {
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
add_filter( 'body_class', 'photomash_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function photomash_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'photomash_pingback_header' );

/**
 * Add a custom post type for photos here.
 */
function photomash_photos_post_type(){
	register_post_type('photos', array(
		'labels'				=> array(
			'name'					=> __('Photos', 'photomash'),
			'singular_name'			=> __('Photo', 'photomash'),
			'menu_name'          	=> __( 'Photos', 'photomash' ),
			'name_admin_bar'     	=> __( 'Photo', 'photomash' ),
			'add_new'            	=> __( 'Add New', '' ),
			'add_new_item'       	=> __( 'Add New Photo', 'photomash' ),
			'new_item'           	=> __( 'New Photo', 'photomash' ),
			'edit_item'          	=> __( 'Edit Photo', 'photomash' ),
			'view_item'          	=> __( 'View Photo', 'photomash' ),
			'all_items'          	=> __( 'All Photos', 'photomash' ),
			'search_items'       	=> __( 'Search Photos', 'photomash' ),
			'parent_item_colon'  	=> __( 'Parent Photos:', 'photomash' ),
			'not_found'          	=> __( 'No photos found.', 'photomash' ),
			'not_found_in_trash' 	=> __( 'No photos found in Trash.', 'photomash' )
		),
		'description'			=> __('All new amazing photos here', 'photomash'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail', 'comments' )
	));

	$labels = array(
	    'name'               => __('Gallery', 'photomash'),
        'singular'           => __('Gallery', 'photomash'),
        'search_items'       => __('Search Gallery', 'photomash'),
        'all_items'         => __( 'All Galleries', 'photomash' ),
        'parent_item'       => __( 'Parent Gallery', 'photomash' ),
        'parent_item_colon' => __( 'Parent Gallery:', 'photomash' ),
        'edit_item'         => __( 'Edit Gallery', 'photomash' ),
        'update_item'       => __( 'Update Gallery', 'photomash' ),
        'add_new_item'      => __( 'Add New Gallery', 'photomash' ),
        'new_item_name'     => __( 'New Gallery Name', 'photomash' ),
        'menu_name'         => __( 'Gallery', 'photomash' ),
    );

	register_taxonomy('gallery', array('photos'), array(
	    'public'            => true,
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true
    ));
}
add_action('init', 'photomash_photos_post_type');

function photomash_projects_post_type(){
    register_post_type('projects', array(
        'labels'				=> array(
            'name'					=> __('Projects', 'photomash'),
            'singular_name'			=> __('Project', 'photomash'),
            'menu_name'          	=> __( 'Projects', 'photomash' ),
            'name_admin_bar'     	=> __( 'Project', 'photomash' ),
            'add_new'            	=> __( 'Add New', '' ),
            'add_new_item'       	=> __( 'Add New Project', 'photomash' ),
            'new_item'           	=> __( 'New Project', 'photomash' ),
            'edit_item'          	=> __( 'Edit Project', 'photomash' ),
            'view_item'          	=> __( 'View Project', 'photomash' ),
            'all_items'          	=> __( 'All Projects', 'photomash' ),
            'search_items'       	=> __( 'Search Project', 'photomash' ),
            'parent_item_colon'  	=> __( 'Parent Project:', 'photomash' ),
            'not_found'          	=> __( 'No project found.', 'photomash' ),
            'not_found_in_trash' 	=> __( 'No project found in Trash.', 'photomash' )
        ),
        'description'			=> __('All new amazing projects here', 'photomash'),
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
        'name'               => __('Project Categories', 'photomash'),
        'singular'           => __('Project Category', 'photomash'),
        'search_items'       => __('Search Project Category', 'photomash'),
        'all_items'         => __( 'All Project Categories', 'photomash' ),
        'parent_item'       => __( 'Parent Project Category', 'photomash' ),
        'parent_item_colon' => __( 'Parent Project Category:', 'photomash' ),
        'edit_item'         => __( 'Edit Project Category', 'photomash' ),
        'update_item'       => __( 'Update Project Category', 'photomash' ),
        'add_new_item'      => __( 'Add New Project Category', 'photomash' ),
        'new_item_name'     => __( 'New Project Category Name', 'photomash' ),
        'menu_name'         => __( 'Project Category', 'photomash' ),
    );

    register_taxonomy('project-category', 'projects', array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true
    ));
}
add_action('init', 'photomash_projects_post_type');

function add_metabox_for_projects_post_type($meta_boxes){

    $meta_boxes[] = array(
        'title'             => __('Display Images', 'photomash'),
        'post_types'        => 'projects',
        'fields'            => array(
            array(
                'id'            => 'images',
                'name'          => __('Images', 'photomash'),
                'type'          => 'image_advanced'
            )
        )
    );

    return $meta_boxes;
}

add_filter('rwmb_meta_boxes', 'add_metabox_for_projects_post_type');

//function photomash_add_custom_types( $query ) {
//	if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
//		$query->set( 'post_type', array(
//			'post', 'nav_menu_item', 'photos', 'projects'
//		));
//		return $query;
//	}
//}
//add_filter( 'pre_get_posts', 'photomash_add_custom_types' );

/**
 * Cutomizer option for nav menu pic
 * @param $wp_customize
 */

function photomash_customizer_nav_menu_image($wp_customize){
	$wp_customize->add_setting('photomash_customizer_nav_menu_image');

	$wp_customize->add_control(new WP_Customize_Image_Control(
		$wp_customize,
		'photomash_customizer_nav_menu_image',
		array(
			'label'      => __( 'Navigation Menu Image', 'photomash' ),
			'section'    => 'title_tagline',
			'settings'   => 'photomash_customizer_nav_menu_image'
		)
	));
}
add_action('customize_register', 'photomash_customizer_nav_menu_image');

/**
 * Register Widget area for nav menu
 */

function photomash_primary_nav_widget(){
	register_sidebar(array(
		'name'			=> __('Nav Menu Footer', 'photomash'),
		'id'			=> 'nav_menu_footer',
		'before_widget' => '<div id="nav-menu-footer" class="nav-menu-footer">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'photomash_primary_nav_widget');

/**
 *
 */

function photomash_nav_social_icon_widget(){
	register_widget('Nav_Social_Icon');
}
add_action('widgets_init', 'photomash_nav_social_icon_widget');