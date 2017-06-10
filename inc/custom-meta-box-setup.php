<?php

/**
 * Adds custom meta boxes for projects post type
 */

function add_metabox_for_projects_post_type($meta_boxes){

    $meta_boxes[] = array(
        'title'             => __('Display Images', 'snapie'),
        'post_types'        => 'projects',
        'fields'            => array(
            array(
                'id'            => 'images',
                'name'          => __('Images', 'snapie'),
                'type'          => 'image_advanced'
            )
        )
    );

    return $meta_boxes;
}

add_filter('rwmb_meta_boxes', 'add_metabox_for_projects_post_type');

/**
 * Adds custom metaboxes for pages.
 */

function add_metabox_for_pages($meta_boxes){
	// $gallery_terms = get_terms( array(
	//     'taxonomy' => 'gallery',
	//     'hide_empty' => false,
	// ) );
	// print_r($gallery_terms);
	$meta_boxes[] = array(
		'title'				=> __('Page Settings', 'snapie'),
		'post_types'		=> 'page',
		'fields'			=> array(
			array(
				'id'			=> 'photo_archive_category',
				'name'			=> __('Photo Archive Category', 'snapie'),
				'desc'			=> __('This option will work only if the page template is set to Photo Archive.', 'snapie'),
				'type'			=> 'select',
				'options'       => array(
                    'featured_image'        => __('Featured Image', 'snapie'),
                    'gradient_overlay'      => __('Featured Image (With Gradient)', 'snapie'),
                    'video_background'      => __('Video Background', 'snapie'),
                    'text_rotator'          => __('Text Rotator', 'snapie'),
                    'slider'                => __('Slider', 'snapie')
                )

			)
		)
	);
	return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'add_metabox_for_pages');

?>