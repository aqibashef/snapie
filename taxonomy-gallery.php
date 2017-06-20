<?php
/**
 * The template for displaying photo archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package snapie
 */

get_header(); ?>

	<div id="primary" class="content-area aqib">
		<main id="main" class="site-main" role="main">
            <div class="col-md-8 gallery-wrapper">
            <?php
            if ( have_posts() ) : ?>
                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    echo '<div class="col-md-4 preview">';
                    get_template_part( 'template-parts/content', 'photos' );
                    echo '</div>';

                endwhile;
                ?>
                <?php
                the_posts_pagination(array(
                    'prev_text'     => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
                    'next_text'     => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>'
                ));
            else :
                ?>
            <?php
                get_template_part( 'template-parts/content', 'none' );
                ?>
                <?php
            endif; ?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
