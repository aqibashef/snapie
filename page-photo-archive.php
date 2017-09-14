<?php
/**
 * Template Name: Photo Archive
 *
 * The template for displaying photo archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package snapie
 */

get_header(); ?>
<?php

$gallery = rwmb_get_value('photo_archive_category');

query_posts( array(
    'post_type'     => 'photos',
    'post_per_page' => -1,
    'nopaging'      => true,
    'tax_query'     => array(
        array(
            'taxonomy'      => 'gallery',
            'field'         => 'slug',
            'terms'         => $gallery->slug
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
get_footer();
