<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package snapie
 */

?>

<div class="col-md-4 preview">
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

//            if ( is_single() ) :
//                the_title( '<h1 class="entry-title">', '</h1>' );
//            else :
//                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
//            endif;

//            if ( 'post' === get_post_type() ) : ?>
<!--                <div class="entry-meta">-->
<!--                    --><?php //snapie_posted_on(); ?>
<!--                </div><!-- .entry-meta -->
<!--                --><?php
//            endif; ?>
        </header><!-- .entry-header -->

<!--        <div class="entry-content">-->
<!--            --><?php
////            the_content( sprintf(
////            /* translators: %s: Name of current post. */
////                wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'snapie' ), array( 'span' => array( 'class' => array() ) ) ),
////                the_title( '<span class="screen-reader-text">"', '"</span>', false )
////            ) );
//
//            echo '<p>'.substr(get_the_content(), 0, 200).'</p>';
//
//            wp_link_pages( array(
//                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'snapie' ),
//                'after'  => '</div>',
//            ) );
//            ?>
<!--        </div><!-- .entry-content -->
<!---->
<!--        <footer class="entry-footer">-->
<!--            --><?php //snapie_entry_footer(); ?>
<!--        </footer><!-- .entry-footer -->
    </article><!-- #post-## -->
</div>
