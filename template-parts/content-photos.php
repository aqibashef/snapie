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

	<div class="entry-content">
		<?php
			$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
			if($thumb_url):?>
				<a class="image-link" href="<?php echo $thumb_url[0]; ?>">
					<img src="<?php echo $thumb_url[0]; ?>" alt="Image">
				</a>
			<?php
			endif;
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
