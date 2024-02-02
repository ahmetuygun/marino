<?php

class widget_footer_about extends WP_Widget { 
	
	// Widget Settings
	function __construct() {
		$widget_ops = array('description' => esc_html__('Only Detail Page: Footer About.','cosmetsy') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'footer_about' );
		 parent::__construct( 'footer_about', esc_html__('Cosmetsy Footer About','cosmetsy'), $widget_ops, $control_ops );
	}


	
	// Widget Output
	function widget($args, $instance) {

		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		
		echo $before_widget;

		if($title) {
			echo $before_title . $title . $after_title;
		}
		?>
		
		<div class="widget widget_text">
			<div class="klb-about-widget textwidget">
				<?php if (get_theme_mod( 'cosmetsy_footer_about_logo' )) { ?>
					<img class="footer-logo" src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'cosmetsy_footer_about_logo' )) ); ?>" alt="<?php bloginfo("name"); ?>" width="140" height="33">
				<?php } ?>
				<p><?php echo cosmetsy_sanitize_data(get_theme_mod('cosmetsy_footer_about_text')); ?></p>
			</div>
		</div>
		<?php echo $after_widget;

	}
	
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		
		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array('title' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','cosmetsy'); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
		  <?php esc_html_e('You can customize the about widget from Dashboard > Appearance > Customize > Cosmetsy Widgets > Footer About','cosmetsy'); ?>

		</p>
	<?php
	}
}

// Add Widget
function widget_footer_about_init() {
	register_widget('widget_footer_about');
}
add_action('widgets_init', 'widget_footer_about_init');

?>