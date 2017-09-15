
<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package snapie
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
            <div class="col-md-12 project-archive-wrapper">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'albums' );

			endwhile;

//			the_posts_navigation();
            ?>
            </div>
            <?php
		else :
            ?>
            <div class="col-md-12">
                <?php
                get_template_part( 'template-parts/content', 'none' );
                ?>
            </div>
            <?php
		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
