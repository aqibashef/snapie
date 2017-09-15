<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package snapie
 */

?>

<div class="col-md-6 preview">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php

            if(has_post_thumbnail()):
                ?>
                <a href="<?php echo get_the_permalink(); ?>">
                <?php

                the_post_thumbnail();
                ?>
                </a>
                <?php
            endif;
            ?>
            <h4><?php echo get_the_title(); ?></h4>
        </header>
    </article><!-- #post-## -->
</div>
