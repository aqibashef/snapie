
<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package snapie
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wptime-plugin-preloader"></div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'snapie' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-nav-bar-wrapper center-v">
			<div class="site-branding text-center">
				<?php
				$logo_id = get_theme_mod('snapie_customizer_nav_menu_image');
				if($logo_id):
					print_r($logo_id);
					?>
					<a href="<?php echo esc_url(home_url('/')); ?>" class="site-title"><img src="<?php echo $logo_id; ?>"
																							alt="Logo"></a>
					<?php
				else:
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description hidden-sm hidden-xs"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php
					endif;
				endif;?>
				<button class="menu-toggle navbar-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->

			<?php
			if(is_active_sidebar('nav_menu_footer')){
				dynamic_sidebar('nav_menu_footer');
			}
			?>

		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
