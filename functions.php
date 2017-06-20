<?php
/**
 * snapie functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package snapie
 */

if ( ! function_exists( 'snapie_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function snapie_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on snapie, use a find and replace
	 * to change 'snapie' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'snapie', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'snapie' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'snapie_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'snapie_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function snapie_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'snapie_content_width', 640 );
}
add_action( 'after_setup_theme', 'snapie_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function snapie_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'snapie' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'snapie' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'snapie_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function snapie_scripts() {
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('jinvert-scroll-css', get_template_directory_uri() . '/css/jInvertScroll.css');
	wp_enqueue_style('magnific-popup-css', get_template_directory_uri() . '/css/magnific-popup.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style('droid-serif', 'https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i');
	wp_enqueue_style('dosis', 'https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i');
	wp_enqueue_style( 'snapie-style', get_stylesheet_uri() );

	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'));
	wp_enqueue_script('jinvert-scroll-js', get_template_directory_uri() . '/js/jquery.jInvertScroll.min.js', array('jquery'));
	wp_enqueue_script('magnific-popup-js', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'));
	wp_enqueue_script('isotope-js', get_template_directory_uri(). '/js/isotope.min.js', array('jquery'));
	wp_enqueue_script( 'snapie-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'snapie-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script('snapie-js', get_template_directory_uri() . '/js/snapie.js', array(), false, true);
}
add_action( 'wp_enqueue_scripts', 'snapie_scripts' );

/**
* Includes the plugin installer
*/
require get_template_directory() . '/inc/Plugin_Installer/example.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom Widget for nav social icons.
 */

require_once get_template_directory() . '/inc/Nav_Social_Icon.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
* Includes the setup file for custom post types
*/
require get_template_directory() . '/inc/custom-post-type-setup.php';

/**
* Includes the setup file for custom post types
*/
require get_template_directory() . '/inc/custom-taxonomy-setup.php';

/**
* Includes the setup file for metabox
*/
require get_template_directory() . '/inc/custom-meta-box-setup.php';

/**
* Includes the setup file for widgets
*/
require get_template_directory() . '/inc/widgets/widgets_init.php';