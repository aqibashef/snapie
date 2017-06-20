<?php 

/**
* This class creates a widget for recent posts.
*/
class Snapie_Widget_Recent_Posts extends WP_widget
{
	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$widget_ops = array( 
			'classname' => 'widget_recent_entries',
			'description' => __('This widget shows most recent posts', 'snapie'),
		);
		parent::__construct( 'snapie_recent_posts_widget', 'Recent Posts', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		echo $args['before_widget'];
		$title = ! empty($instance['title']) ? $instance['title'] : 'Recent Posts';
		$number_of_posts = ! empty($instance['number_of_posts']) ? $instance['number_of_posts'] : 5;
		$posts = get_posts(array(
			'posts_per_page'		=> $number_of_posts,
			'post_type'				=> 'post',
			'post_status'			=> 'publish',
			'orderby'				=> 'date'
		));
		?>
		<h2 class="widget-title"><?php echo $title; ?></h2>
		<?php if(count($posts) > 0): ?>
			<ul>
				<?php foreach ($posts as $post):?>
					<li>
						<?php if(has_post_thumbnail($post->ID)): ?>
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>">
							</div>
						<?php endif; ?>
						<?php if(has_post_thumbnail($post->ID)) echo '<div class="col-md-8">'; ?>
						<a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a><br>
						By <a href="<?php echo get_author_posts_url($post->post_author); ?>"><?php echo esc_attr(get_userdata($post->post_author)->display_name); ?></a>
						<?php if(has_post_thumbnail($post->ID)) echo '</div>'; ?>
						<?php if(has_post_thumbnail($post->ID)) echo '</div>'; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = ! empty($instance['title']) ? $instance['title'] : '';
		$number_of_posts = ! empty($instance['number_of_posts']) ? $instance['number_of_posts'] : 5;
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title</label>
			<input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title'));?>" value="<?php echo $title; ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('number_of_posts')); ?>">Number of posts</label>
			<input type="number" name="<?php echo esc_attr($this->get_field_name('number_of_posts')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('number_of_posts')); ?>" value="<?php echo $number_of_posts; ?>">
		</p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['number_of_posts'] = ! empty($new_instance['number_of_posts']) ? $new_instance['number_of_posts'] : 5;

		return $instance;
	}
}

?>