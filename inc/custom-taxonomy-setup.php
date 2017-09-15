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

	function snapie_album_category_taxonomy($args){
		$labels = array(
	        'name'              => __('Album Categories', 'snapie'),
	        'singular'          => __('Album Category', 'snapie'),
	        'search_items'      => __('Search Album Category', 'snapie'),
	        'all_items'         => __( 'All Album Categories', 'snapie' ),
	        'parent_item'       => __( 'Parent Album Category', 'snapie' ),
	        'parent_item_colon' => __( 'Parent Album Category:', 'snapie' ),
	        'edit_item'         => __( 'Edit Album Category', 'snapie' ),
	        'update_item'       => __( 'Update Album Category', 'snapie' ),
	        'add_new_item'      => __( 'Add New Album Category', 'snapie' ),
	        'new_item_name'     => __( 'New Album Category Name', 'snapie' ),
	        'menu_name'         => __( 'Album Category', 'snapie' ),
	    );

	    $args[] = array(
	    	'taxonomy'			=> 'album-category',
	    	'post_types'		=> array('albums'),
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

	add_filter('themebuilder_taxonomies', 'snapie_album_category_taxonomy');

?>