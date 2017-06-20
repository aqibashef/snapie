<?php 
	
	require_once get_template_directory() .'/inc/widgets/snapie_recent_posts_widget.php';

	function snapie_unregister_widgets(){
		unregister_widget('WP_Widget_Recent_Posts');
		unregister_widget('WP_Widget_Calendar');
	}
	add_action('widgets_init', 'snapie_unregister_widgets');

	function snapie_register_widgets(){
		register_widget('Snapie_Widget_Recent_Posts');
	}
	add_action('widgets_init', 'snapie_register_widgets');
?>