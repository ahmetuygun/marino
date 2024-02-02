<?php

/*************************************************
## Styles and Scripts
*************************************************/ 
define('KLB_INDEX_JS', plugin_dir_url( __FILE__ )  . '/js');
define('KLB_INDEX_CSS', plugin_dir_url( __FILE__ )  . '/css');

function klb_scripts() {
	wp_register_script( 'jquery-socialshare',    KLB_INDEX_JS . '/jquery-socialshare.js', array('jquery'), '1.0', true);
	wp_register_script( 'klb-social-share', 	  KLB_INDEX_JS . '/custom/social_share.js', array('jquery'), '1.0', true);
	wp_register_script( 'klb-widget-product-categories', 	  plugins_url( 'widgets/js/widget-product-categories.js', __FILE__ ), true );
	if (function_exists('get_wcmp_vendor_settings') && is_user_logged_in()) {
		if(is_vendor_dashboard()){
			wp_deregister_script( 'bootstrap');
			wp_deregister_script( 'jquery-nice-select');
		}
	}
}
add_action( 'wp_enqueue_scripts', 'klb_scripts' );

/*----------------------------
  Elementor Get Templates
 ----------------------------*/
if ( ! function_exists( 'cosmetsy_get_elementorTemplates' ) ) {
    function cosmetsy_get_elementorTemplates( $type = null )
    {
        if ( class_exists( '\Elementor\Plugin' ) ) {

            $args = [
                'post_type' => 'elementor_library',
                'posts_per_page' => -1,
            ];

            $templates = get_posts( $args );
            $options = array();

            if ( !empty( $templates ) && !is_wp_error( $templates ) ) {

				$options['0'] = esc_html__('Set a Template','cosmetsy-core');

                foreach ( $templates as $post ) {
                    $options[ $post->ID ] = $post->post_title;
                }
            } else {
                $options = array(
                    '' => esc_html__( 'No template exist.', 'cosmetsy-core' )
                );
            }

            return $options;
        }
    }
}

/*----------------------------
  Single Share
 ----------------------------*/
add_action( 'woocommerce_single_product_summary', 'cosmetsy_social_share', 70);
function cosmetsy_social_share(){
	$socialshare = get_theme_mod( 'cosmetsy_shop_social_share', '0' );
	$wishlist = get_theme_mod( 'cosmetsy_wishlist_button', '0' );
	
	echo '<div class="product-actions">';
	
	if($wishlist == '1'){
		echo do_shortcode('[ti_wishlists_addtowishlist]');
	}
	
	if($socialshare == '1'){
		wp_enqueue_script('jquery-socialshare');
		wp_enqueue_script('klb-social-share');
	
		$single_share_multicheck = get_theme_mod('cosmetsy_shop_single_share',array( 'title', 'facebook', 'twitter', 'pinterest', 'linkedin'));
	  
	  echo '<div class="product-share">';
		if(in_array('title', $single_share_multicheck)){
		   echo '<span class="hide-mobile">'.esc_html__('Share This Product:','cosmetsy-core').'</span>';
		 }  
		   echo '<div class="social-share site-social">';
			   echo '<ul class="icon style-3 social-link social-container">';
				   if(in_array('facebook', $single_share_multicheck)){
					   echo '<li>';
						   echo '<a href="#" class="facebook" aria-label="'.esc_attr__('Share this page with Facebook','cosmetsy').'">';
						   echo '<span class="social-icon"><i class="klb-facebook"></i></span>';
						   echo '<span class="social-text">'.esc_html__('Facebook','cosmetsy-core').'</span>';
						   echo '</a>';
					   echo '</li>';
					}
					if(in_array('twitter', $single_share_multicheck)){ 
					   echo '<li>';
					   
						   echo '<a href="#" class="twitter" aria-label="'.esc_attr__('Share this page with Twitter','cosmetsy').'">';
						   echo '<span class="social-icon"><i class="klb-twitter"></i></span>';
						   echo '<span class="social-text">'.esc_html__('Twitter','cosmetsy-core').'</span>';
						   echo '</a>';
					   echo '</li>';
					}
					if(in_array('pinterest', $single_share_multicheck)){   
					   echo '<li>';
					   
						   echo '<a href="#" class="pinterest" aria-label="'.esc_attr__('Share this page with Pinterest','cosmetsy').'">';
						   echo '<span class="social-icon"><i class="klb-pinterest"></i></span>';
						   echo '<span class="social-text">'.esc_html__('Pinterest','cosmetsy-core').'</span>';
						   echo '</a>';
					   echo '</li>';
					}
					if(in_array('linkedin', $single_share_multicheck)){	   
					   echo '<li>';
					   
						   echo '<a href="#" class="linkedin" aria-label="'.esc_attr__('Share this page with Linkedin','cosmetsy').'">';
						   echo '<span class="social-icon"><i class="klb-linkedin"></i></span>';
						   echo '<span class="social-text">'.esc_html__('Linkedin','cosmetsy-core').'</span>';
						   echo '</a>';
					  
					   echo '</li>';
					} 
			   echo '</ul>';
		   echo '</div>';
	   echo '</div>';
	}
	
	echo '</div>';
}

/*----------------------------
  Update Cart When Quantity changed on CART PAGE.
 ----------------------------*/
add_action( 'woocommerce_after_cart', 'cosmetsy_update_cart' );
function cosmetsy_update_cart() {
    echo '<script>
	
	var timeout;
	
    jQuery(document).ready(function($) {

		var timeout;

		$(\'.woocommerce\').on(\'change\', \'input.qty\', function(){

			if ( timeout !== undefined ) {
				clearTimeout( timeout );
			}

			timeout = setTimeout(function() {
				$("[name=\'update_cart\']").trigger("click");
			}, 1000 ); // 1 second delay, half a second (500) seems comfortable too

		});

    });
    </script>';
}

/*----------------------------
  Disable Crop Image WCMP
 ----------------------------*/
add_filter('wcmp_frontend_dash_upload_script_params', 'cosmetsy_crop_function');
function cosmetsy_crop_function( $image_script_params ) {
	$image_script_params['canSkipCrop'] = true;
	return $image_script_params;
}
