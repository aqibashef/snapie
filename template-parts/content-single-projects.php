<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PhotoMash
 */

?>

<div class="col-md-12 single-project-wrapper">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php

            if ( is_single() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;

            if(has_post_thumbnail()):
                the_post_thumbnail();
            endif;
            ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php
            if(function_exists('rwmb_get_value')){
                $images = rwmb_get_value('images');
                if(isset($images)&& count($images) > 0){
                    echo '<div class="grid">';
                    echo '<div class="grid-sizer"></div>';
                    $flag = 1;
                    foreach ($images as $image){
                        if($flag == 0){
                            $flag = 1;
                            echo '<div class="grid-item">';
                        }
                        else {
                            echo '<div class="grid-item grid-item--width2">';
                            $flag = 0;
                        }
                        echo '<a class="image-link" href="'.$image['full_url'].'">';
                        echo '<img src="'.$image['full_url'].'" alt="">';
                        echo '</a>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
            }

            ?>
        </div><!-- .entry-content -->
    </article><!-- #post-## -->
</div>
