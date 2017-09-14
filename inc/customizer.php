<?php
/**
 * PhotoMash Theme Customizer.
 *
 * @package PhotoMash
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function photomash_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'photomash_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function photomash_customize_preview_js() {
	wp_enqueue_script( 'photomash_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'photomash_customize_preview_js' );


/**
 * Cutomizer option for nav menu pic
 * @param $wp_customize
 */

function snapie_customizer_nav_menu_image($wp_customize){
    $wp_customize->add_setting('snapie_customizer_nav_menu_image');

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'photomash_customizer_nav_menu_image',
        array(
            'label'      => __( 'Navigation Menu Image', 'photomash' ),
            'section'    => 'title_tagline',
            'settings'   => 'snapie_customizer_nav_menu_image'
        )
    ));
}
add_action('customize_register', 'snapie_customizer_nav_menu_image');

function snapie_customizer_sanitizer($args)
{
	return args;
}