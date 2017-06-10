<?php 

/**
 * Adds a custom post type for photos here.
 */
function snapie_photos_post_type($args){
	$args[] = array(
		'post_type'				=> 'photos',
		'args'					=> array(
			'labels'				=> array(
				'name'					=> __('Photos', 'snapie'),
				'singular_name'			=> __('Photo', 'snapie'),
				'menu_name'          	=> __( 'Photos', 'snapie' ),
				'name_admin_bar'     	=> __( 'Photo', 'snapie' ),
				'add_new'            	=> __( 'Add New', 'snapie' ),
				'add_new_item'       	=> __( 'Add New Photo', 'snapie' ),
				'new_item'           	=> __( 'New Photo', 'snapie' ),
				'edit_item'          	=> __( 'Edit Photo', 'snapie' ),
				'view_item'          	=> __( 'View Photo', 'snapie' ),
				'all_items'          	=> __( 'All Photos', 'snapie' ),
				'search_items'       	=> __( 'Search Photos', 'snapie' ),
				'parent_item_colon'  	=> __( 'Parent Photos:', 'snapie' ),
				'not_found'          	=> __( 'No photos found.', 'snapie' ),
				'not_found_in_trash' 	=> __( 'No photos found in Trash.', 'snapie' )
			),
			'description'		 	=> __('All new amazing photos here', 'snapie'),
			'public'             	=> true,
			'publicly_queryable' 	=> true,
			'show_ui'            	=> true,
			'show_in_menu'       	=> true,
			'query_var'          	=> true,
			'capability_type'    	=> 'post',
			'has_archive'        	=> true,
			'hierarchical'       	=> true,
			'menu_position'      	=> null,
			'supports'           	=> array( 'title', 'thumbnail', 'comments' )
		)
	);
	return $args;
}
add_filter('themebuilder_post_types', 'snapie_photos_post_type');

/**
 * Adds a custom post type for projects here.
 */

function snapie_projects_post_type($args){
	$args[] = array(
		'post_type'				=> 'projects',
		'args'					=> array(
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
	        'description'		 	=> __('All new amazing projects here', 'snapie'),
	        'public'             	=> true,
	        'publicly_queryable'	=> true,
	        'show_ui'            	=> true,
	        'show_in_menu'       	=> true,
	        'query_var'          	=> true,
	        'capability_type'    	=> 'post',
	        'has_archive'        	=> true,
	        'hierarchical'       	=> true,
	        'menu_position'      	=> null,
	        'supports'           	=> array( 'title', 'thumbnail', 'comments', 'editor' )
	    )
	);
	return $args;
}
add_filter('themebuilder_post_types', 'snapie_projects_post_type');

?>