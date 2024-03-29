<?php

class widget_social_list extends WP_Widget { 
	
	// Widget Settings
	function __construct() {
		$widget_ops = array('description' => esc_html__('Only Detail Page: Social List.','cosmetsy-core') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'social_list' );
		 parent::__construct( 'social_list', esc_html__('Cosmetsy Social list','cosmetsy-core'), $widget_ops, $control_ops );
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

		
		<?php $sociallist = get_theme_mod( 'cosmetsy_social_list_widget' ); ?>
		<?php if(!empty($sociallist)){ ?>
			<div class="widget--wrapper">
			  <div class="site-social">
				<ul class="default style-3">
					<?php foreach($sociallist as $s){ ?>
					  <li>
						<a href="<?php echo esc_url($s['social_url']); ?>" target="_blank" class="<?php echo esc_attr($s['social_icon']); ?>">
						  <span class="social-icon"><i class="klb-<?php echo esc_attr($s['social_icon']); ?>"></i></span>
						  <span class="social-text"><?php echo esc_attr($s['social_icon']); ?></span>
						  <span class="social-label"><?php esc_html_e('Follow','cosmetesy-core'); ?></span>
						</a>
					  </li>
					<?php } ?>
				</ul>
			  </div>
			</div>
		<?php } ?>
	


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
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','cosmetsy-core'); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
		  <?php esc_html_e('You can customize the social list from Dashboard > Appearance > Customize > Cosmetsy Widgets > Social List','cosmetsy-core'); ?>

		</p>
	<?php
	}
}

// Add Widget
function widget_social_list_init() {
	register_widget('widget_social_list');
}
add_action('widgets_init', 'widget_social_list_init');

?>