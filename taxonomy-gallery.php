<?php
/**
 * The template for displaying photo archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package snapie
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="photo-archive-container">
                <?php
                if ( have_posts() ) : ?>
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
                    <?php
                    the_posts_pagination(array(
                        'mid_size'			=> 2,
                        'prev_text'			=> '<i class="fa fa-angle-double-left"></i>',
                        'next_text'			=> '<i class="fa fa-angle-double-right"></i>'
                    ));

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif; ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
