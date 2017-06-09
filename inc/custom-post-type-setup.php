<?php 

/**
 * Add a custom post type for photos here.
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
			'description'			=> __('All new amazing photos here', 'snapie'),
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
		)
	);
	return $args;
	// register_post_type('photos', array(
	// 	'labels'				=> array(
	// 		'name'					=> __('Photos', 'snapie'),
	// 		'singular_name'			=> __('Photo', 'snapie'),
	// 		'menu_name'          	=> __( 'Photos', 'snapie' ),
	// 		'name_admin_bar'     	=> __( 'Photo', 'snapie' ),
	// 		'add_new'            	=> __( 'Add New', 'snapie' ),
	// 		'add_new_item'       	=> __( 'Add New Photo', 'snapie' ),
	// 		'new_item'           	=> __( 'New Photo', 'snapie' ),
	// 		'edit_item'          	=> __( 'Edit Photo', 'snapie' ),
	// 		'view_item'          	=> __( 'View Photo', 'snapie' ),
	// 		'all_items'          	=> __( 'All Photos', 'snapie' ),
	// 		'search_items'       	=> __( 'Search Photos', 'snapie' ),
	// 		'parent_item_colon'  	=> __( 'Parent Photos:', 'snapie' ),
	// 		'not_found'          	=> __( 'No photos found.', 'snapie' ),
	// 		'not_found_in_trash' 	=> __( 'No photos found in Trash.', 'snapie' )
	// 	),
	// 	'description'			=> __('All new amazing photos here', 'snapie'),
	// 	'public'             => true,
	// 	'publicly_queryable' => true,
	// 	'show_ui'            => true,
	// 	'show_in_menu'       => true,
	// 	'query_var'          => true,
	// 	'capability_type'    => 'post',
	// 	'has_archive'        => true,
	// 	'hierarchical'       => true,
	// 	'menu_position'      => null,
	// 	'supports'           => array( 'title', 'thumbnail', 'comments' )
	// ));

	// $labels = array(
	//     'name'               => __('Gallery', 'snapie'),
 //        'singular'           => __('Gallery', 'snapie'),
 //        'search_items'       => __('Search Gallery', 'snapie'),
 //        'all_items'         => __( 'All Galleries', 'snapie' ),
 //        'parent_item'       => __( 'Parent Gallery', 'snapie' ),
 //        'parent_item_colon' => __( 'Parent Gallery:', 'snapie' ),
 //        'edit_item'         => __( 'Edit Gallery', 'snapie' ),
 //        'update_item'       => __( 'Update Gallery', 'snapie' ),
 //        'add_new_item'      => __( 'Add New Gallery', 'snapie' ),
 //        'new_item_name'     => __( 'New Gallery Name', 'snapie' ),
 //        'menu_name'         => __( 'Gallery', 'snapie' ),
 //    );

	// register_taxonomy('gallery', array('photos'), array(
	//     'public'            => true,
 //        'hierarchical'      => true,
 //        'labels'            => $labels,
 //        'show_ui'           => true,
 //        'show_admin_column' => true,
 //        'show_in_rest'      => true,
 //        'query_var'         => true
 //    ));
}
add_filter('themebuilder_post_types', 'snapie_photos_post_type');

?>