<?php

class widget_subscribe_form extends WP_Widget { 
	
	// Widget Settings
	function __construct() {
		$widget_ops = array('description' => esc_html__('Display the subscribe form','cosmetsy') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'subscribe_form' );
		 parent::__construct( 'subscribe_form', esc_html__('Cosmetsy Subscribe Form','cosmetsy'), $widget_ops, $control_ops );
	}


	
	// Widget Output
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );

		$subtitle = $instance['subtitle'];
		$formid = $instance['formid'];
		
		echo $before_widget;

		if($title) {
			echo $before_title . $title . $after_title;
		}
		?>
		
		  <div class="widget widget_newsletter">
			<div class="site-newsletter">
			  <p><?php echo esc_html($subtitle); ?></p>
			  <?php echo do_shortcode('[mc4wp_form id="'.$formid.'"]'); ?>
			</div>
		  </div>
		
		
		<?php echo $after_widget;
	}
	
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['subtitle'] = $new_instance['subtitle'];
		$instance['formid'] = $new_instance['formid'];
		
		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array('title' => 'Subscribe For News', 'subtitle' => 'Subscribe to our newsletter and get 10% off on your first order.', 'formid' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','cosmetsy'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('subtitle'); ?>"><?php esc_html_e('Subtitle:','cosmetsy'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('subtitle'); ?>" name="<?php echo $this->get_field_name('subtitle'); ?>" value="<?php echo $instance['subtitle']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('formid'); ?>"><?php esc_html_e('Mailchimp Form ID:','cosmetsy'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('formid'); ?>" name="<?php echo $this->get_field_name('formid'); ?>" value="<?php echo $instance['formid']; ?>" />
		</p>
	<?php
	}
}

// Add Widget
function widget_subscribe_form_init() {
	register_widget('widget_subscribe_form');
}
add_action('widgets_init', 'widget_subscribe_form_init');

?>