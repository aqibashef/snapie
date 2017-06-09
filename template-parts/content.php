<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package snapie
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php

        if(has_post_thumbnail()):
            the_post_thumbnail();
        endif;

        if ( is_single() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;

        if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php snapie_posted_on(); ?>
            </div><!-- .entry-meta -->
            <?php
        endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        echo '<p>'.substr(get_the_content(), 0, 150).'</p>';
        ?>
        <p><a href="<?php echo get_permalink(get_the_ID()); ?>">Read more <i class="fa fa-angle-double-right"></i></a></p>
    </div><!-- .entry-content -->
    <?php if(is_single()): ?>
    <footer class="entry-footer">
        <?php snapie_entry_footer(); ?>
    </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-## -->
