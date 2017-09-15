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

function snapie_albums_post_type($args){
	$args[] = array(
		'post_type'				=> 'albums',
		'args'					=> array(
	        'labels'				=> array(
	            'name'					=> __('Albums', 'snapie'),
	            'singular_name'			=> __('Album', 'snapie'),
	            'menu_name'          	=> __( 'Albums', 'snapie' ),
	            'name_admin_bar'     	=> __( 'Album', 'snapie' ),
	            'add_new'            	=> __( 'Add New', 'snapie' ),
	            'add_new_item'       	=> __( 'Add New Album', 'snapie' ),
	            'new_item'           	=> __( 'New Album', 'snapie' ),
	            'edit_item'          	=> __( 'Edit Album', 'snapie' ),
	            'view_item'          	=> __( 'View Album', 'snapie' ),
	            'all_items'          	=> __( 'All Albums', 'snapie' ),
	            'search_items'       	=> __( 'Search Album', 'snapie' ),
	            'parent_item_colon'  	=> __( 'Parent Album:', 'snapie' ),
	            'not_found'          	=> __( 'No album found.', 'snapie' ),
	            'not_found_in_trash' 	=> __( 'No album found in Trash.', 'snapie' )
	        ),
	        'description'		 	=> __('All new amazing album here', 'snapie'),
	        'public'             	=> true,
	        'publicly_queryable'	=> true,
	        'show_ui'            	=> true,
	        'show_in_menu'       	=> true,
	        'query_var'          	=> true,
	        'capability_type'    	=> 'post',
	        'has_archive'        	=> true,
	        'hierarchical'       	=> true,
	        'menu_position'      	=> null,
	        'supports'           	=> array( 'title', 'thumbnail', 'comments')
	    )
	);
	return $args;
}
add_filter('themebuilder_post_types', 'snapie_albums_post_type');

?>