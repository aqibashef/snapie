<?php 
	
	/**
	 * Adds a custom taxonomy named gallery for photos post type here.
	 */
	function snapie_gallery_taxonomy($args){
		$labels = array(
		    'name'              => __('Gallery', 'snapie'),
	        'singular'          => __('Gallery', 'snapie'),
	        'search_items'      => __('Search Gallery', 'snapie'),
	        'all_items'         => __( 'All Galleries', 'snapie' ),
	        'parent_item'       => __( 'Parent Gallery', 'snapie' ),
	        'parent_item_colon' => __( 'Parent Gallery:', 'snapie' ),
	        'edit_item'         => __( 'Edit Gallery', 'snapie' ),
	        'update_item'       => __( 'Update Gallery', 'snapie' ),
	        'add_new_item'      => __( 'Add New Gallery', 'snapie' ),
	        'new_item_name'     => __( 'New Gallery Name', 'snapie' ),
	        'menu_name'         => __( 'Gallery', 'snapie' ),
	    );

		$args[] = array(
			'taxonomy'			=> 'gallery',
			'post_types'		=> array( 'photos' ),
			'args'				=>  array(
			    'public'            => true,
		        'hierarchical'      => true,
		        'labels'            => $labels,
		        'show_ui'           => true,
		        'show_admin_column' => true,
		        'show_in_nav_menus'	=> true,
		        'show_in_rest'      => true,
		        'query_var'         => true
		    )
		);
		return $args;
	}

	add_filter('themebuilder_taxonomies', 'snapie_gallery_taxonomy');

	/**
	 * Adds a custom taxonomy named project category for projects post type.
	 */

	function snapie_project_category_taxonomy($args){
		$labels = array(
	        'name'              => __('Project Categories', 'snapie'),
	        'singular'          => __('Project Category', 'snapie'),
	        'search_items'      => __('Search Project Category', 'snapie'),
	        'all_items'         => __( 'All Project Categories', 'snapie' ),
	        'parent_item'       => __( 'Parent Project Category', 'snapie' ),
	        'parent_item_colon' => __( 'Parent Project Category:', 'snapie' ),
	        'edit_item'         => __( 'Edit Project Category', 'snapie' ),
	        'update_item'       => __( 'Update Project Category', 'snapie' ),
	        'add_new_item'      => __( 'Add New Project Category', 'snapie' ),
	        'new_item_name'     => __( 'New Project Category Name', 'snapie' ),
	        'menu_name'         => __( 'Project Category', 'snapie' ),
	    );

	    $args[] = array(
	    	'taxonomy'			=> 'project-category',
	    	'post_types'		=> array('projects'),
	    	'args'				=> array(
		        'hierarchical'      => true,
		        'labels'            => $labels,
		        'show_ui'           => true,
		        'show_admin_column' => true,
		        'show_in_nav_menus'	=> true,
		        'query_var'         => true
		    )
    	);

	    return $args;
	}

	add_filter('themebuilder_taxonomies', 'snapie_gallery_taxonomy');

?>