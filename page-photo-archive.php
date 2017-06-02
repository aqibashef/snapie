<?php
/**
 * Template Name: Photo Archive
 *
 * The template for displaying photo archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PhotoMash
 */

get_header(); ?>
<?php
global $wp_query;
//$args = array_merge( $wp_query->query_vars, array( 'post_type' => 'photos' ) );
//query_posts( 'post_type=photos&posts_per_page=-1' );
query_posts( array(
    'post_type'     => 'photos',
    'post_per_page' => -1,
    'nopaging'      => true,
    'tax_query'     => array(
        array(
            'taxonomy'      => 'gallery',
            'field'         => 'slug',
            'terms'         => 'home'
        )
    )
));
//wp_reset_query();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
					<!--					<div class="photo-container">-->
					<?php
					if ( have_posts() ) : ?>
            <div class="photo-archive-container">
                <div class="photo-container scroll center-v">
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
							get_template_part( 'template-parts/content', 'photos' );

						endwhile;
                        ?>
                </div>
            </div>
                    <?php
					else :
                        ?>
                        <div class="col-md-8">
                    <?php
						get_template_part( 'template-parts/content', 'none' );
                    ?>
                        </div>
                    <?php
					endif; ?>
					<!--					</div>-->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
