<?php

/**
 * Created by PhpStorm.
 * User: aqib
 * Date: 10/13/16
 * Time: 6:03 PM
 */
class Nav_Social_Icon extends WP_Widget
{
    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'nav_social_icon',
            'description' => 'This widget will show nav social icon',
        );
        parent::__construct( 'nav_social_icon', 'Nav Social Icon', $widget_ops );
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
        if(! empty( $instance['fb_url'])):
            ?>
            <a href="<?php echo $instance['fb_url']; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <?php
        endif;
        if(! empty($instance['_500px'])):
            ?>
            <a href="<?php echo $instance['_500px']; ?>" target="_blank"><i class="fa fa-500px" aria-hidden="true"></i></a>
            <?php
        endif;
        if(! empty($instance['flickr'])):
            ?>
            <a href="<?php echo $instance['_500px']; ?>" target="_blank"><i class="fa fa-flickr" aria-hidden="true"></i></a>
            <?php
        endif;
        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
        $fb_url = !empty($instance['fb_url']) ? $instance['fb_url'] : '';
        $_500px = !empty($instance['_500px']) ? $instance['_500px'] : '';
        $flickr = !empty($instance['flickr']) ? $instance['flickr'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('fb_url')); ?>">Facebook URL</label>
            <input class="widefat" id="<?php esc_attr($this->get_field_id('fb_url')); ?>" name="<?php echo esc_attr($this->get_field_name('fb_url')); ?>" type="url" value="<?php echo esc_attr($fb_url); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('_500px')); ?>">500px</label>
            <input class="widefat" id="<?php esc_attr($this->get_field_id('_500px')); ?>" name="<?php echo esc_attr($this->get_field_name('_500px')); ?>" type="url" value="<?php echo esc_attr($_500px); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('flickr')); ?>">flickr</label>
            <input class="widefat" id="<?php esc_attr($this->get_field_id('flickr')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr')); ?>" type="url" value="<?php echo esc_attr($flickr); ?>">
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
        $instance['fb_url'] = ( ! empty($new_instance['fb_url'])) ? esc_attr($new_instance['fb_url']) : '';
        $instance['_500px'] = ( ! empty($new_instance['_500px'])) ? esc_attr($new_instance['_500px']) : '';
        $instance['flickr'] = ( ! empty($new_instance['flickr'])) ? esc_attr($new_instance['flickr']) : '';

        return $instance;
    }

}