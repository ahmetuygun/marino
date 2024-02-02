<?php

/*************************************************
## Woocommerce 
*************************************************/

function cosmetsy_product_image(){
	if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
		$att=get_post_thumbnail_id();
		$image_src = wp_get_attachment_image_src( $att, 'full' );
		$image_src = $image_src[0];

		$size = get_theme_mod( 'cosmetsy_product_image_size', array( 'width' => '', 'height' => '') );

		if($size['width'] && $size['height']){
			$image = cosmetsy_resize( $image_src, $size['width'], $size['height'], true, true, true );  
		} else {
			$image = $image_src;
		}
		
		return esc_url($image);
	} else {
		return wc_placeholder_img_src('');
	}
}

function cosmetsy_product_second_image(){
	global $product;
	
	$product_image_ids = $product->get_gallery_image_ids();
	
	if($product_image_ids){
		$gallery_count = 1;
		foreach( $product_image_ids as $product_image_id ){
			if($gallery_count == 1){
				$image_url = wp_get_attachment_url( $product_image_id );
				return esc_url($image_url);
			}
			$gallery_count++;
		}
	}
}

function cosmetsy_sale_percentage(){
	global $product;

	$output = '';
	
	if(get_theme_mod('cosmetsy_product_badge_tab', 0) == 1){
		
		$product = wc_get_product(get_the_ID());
		$badgetext = $product->get_meta('_klb_product_badge_text');
		$badgetype = $product->get_meta('_klb_product_badge_type');
		$badgebg = $product->get_meta('_klb_product_badge_bg_color');
		$badgecolor = $product->get_meta('_klb_product_badge_text_color');
		$percentagecheck = $product->get_meta('_klb_product_percentage_check');
		$percentagetype = $product->get_meta('_klb_product_percentage_type');
		$percentagebg = $product->get_meta('_klb_product_percentage_bg_color');
		$percentagecolor = $product->get_meta('_klb_product_percentage_text_color');

		$badgecss = '';
		if($badgebg || $badgecolor){
			$badgecss .= 'style="';
			if($badgebg){
				$badgecss .= 'background-color: '.esc_attr($badgebg).';';
			}
			if($badgecolor){
				$badgecss .= 'color: '.esc_attr($badgecolor).';';
			}
			$badgecss .= '"';
		}
		
		$percentagecss = '';
		if($percentagebg || $percentagecolor){
			$percentagecss .= 'style="';
			if($percentagebg){
				$percentagecss .= 'background-color: '.esc_attr($percentagebg).';';
			}
			if($percentagecolor){
				$percentagecss .= 'color: '.esc_attr($percentagecolor).';';
			}
			$percentagecss .= '"';
		}
		
		if ( $product->is_on_sale() || $badgetext ){
			$output .= '<div class="product-badges">';
			if ( !$percentagecheck && $product->is_on_sale() && $product->is_type( 'variable' ) ) {
				$percentage = ceil(100 - ($product->get_variation_sale_price() / $product->get_variation_regular_price( 'min' )) * 100);
				$output .= '<span class="badge '.esc_attr($percentagetype).' onsale" '.$percentagecss.'>'.$percentage.'%</span>';
			} elseif( !$percentagecheck && $product->is_on_sale() && $product->get_regular_price()  && !$product->is_type( 'grouped' )) {
				$percentage = ceil(100 - ($product->get_sale_price() / $product->get_regular_price()) * 100);
				$output .= '<span class="badge '.esc_attr($percentagetype).' onsale" '.$percentagecss.'>'.$percentage.'%</span>';
			}
			
			if($badgetext){
				$output .= '<span class="badge '.esc_attr($badgetype).'" '.$badgecss.'>'.esc_html($badgetext).'</span>';
			}
			
			$output .= '</div>';
		}

	} else {
		// Declared 1.2.0
		if ( $product->is_on_sale() && $product->is_type( 'variable' ) ) {
		$percentage = ceil(100 - ($product->get_variation_sale_price() / $product->get_variation_regular_price( 'min' )) * 100);
		} elseif( $product->is_on_sale() && $product->get_regular_price() ) {
			$percentage = ceil(100 - ($product->get_sale_price() / $product->get_regular_price()) * 100);
		}
		
		if($product->is_on_sale() && $product->is_type( 'variable' )){
			return '<span class="badge onsale"><span>'.$percentage.'%</span></span>';
		
		} elseif($product->is_on_sale() && $product->get_regular_price()){
			return '<span class="badge onsale"><span>'.$percentage.'%</span></span>';
		}
	}
	return $output;

}

function cosmetsy_vendor_name(){
	if (function_exists('get_wcmp_vendor_settings')) {
		global $post;
		$vendor = get_wcmp_product_vendors($post->ID);
		if (isset($vendor->page_title)) {
			$store_name = $vendor->page_title;
			return '<div class="klb-vendor-name"><a href="'.esc_url($vendor->permalink).'">'.esc_html($store_name).'</a></div>';
		}
	}
}

if ( class_exists( 'woocommerce' ) ) {
add_theme_support( 'woocommerce' );
add_image_size('cosmetsy-woo-product', 450, 450, true);

// Remove woocommerce defauly styles
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// hide default shop title anasayfadaki title gizlemek için
add_filter('woocommerce_show_page_title', 'cosmetsy_override_page_title');
function cosmetsy_override_page_title() {
return false;
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 ); /*remove result count above products*/
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 ); //remove rating
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 ); //remove rating
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title',10);

add_action( 'woocommerce_before_shop_loop_item', 'cosmetsy_shop_thumbnail', 10);
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 ); /*remove breadcrumb*/


remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20);
remove_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products',10);
add_action( 'woocommerce_after_single_product_summary', 'cosmetsy_related_products', 20);
function cosmetsy_related_products(){
	$related_column = get_theme_mod('cosmetsy_shop_related_post_column') ? get_theme_mod('cosmetsy_shop_related_post_column') : '4';
    woocommerce_related_products( array('posts_per_page' => $related_column, 'columns' => $related_column));
}

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display', 20);
add_filter( 'woocommerce_cross_sells_columns', 'cosmetsy_change_cross_sells_columns' );
function cosmetsy_change_cross_sells_columns( $columns ) {
	return 4;
}

/*************************************************
## Cart Button with Quantity Box
*************************************************/
function cosmetsy_cart_with_quantity($id){
	global $product;

	$step_quantity = function_exists('cosmetsy_step_quantity') ? cosmetsy_step_quantity($product) : '1';
	$min_quantity = function_exists('cosmetsy_min_quantity') ? cosmetsy_min_quantity($product) : '';
	$max_quantity = function_exists('cosmetsy_max_quantity') ? cosmetsy_max_quantity($product) : '';

	$in_cart_class = cosmetsy_item_quantity_in_cart($id) ? 'product-in-cart' : '';
	$in_cart_value = cosmetsy_item_quantity_in_cart($id) ? cosmetsy_item_quantity_in_cart($id) : '1';
	
	$output = '';
	
	$output .= '<div class="product-button-group cart-with-quantity '.esc_attr($in_cart_class).'">';
	
	$output .= '<div class="quantity ajax-quantity">';
	$output .= '<div class="quantity-button minus"><i class="klbth-icon-minus"></i></div>';
	$output .= '<input type="text" class="input-text qty text" name="quantity" step="'.esc_attr($step_quantity).'" min="'.esc_attr($min_quantity).'" max="'.esc_attr($max_quantity).'" value="'.esc_attr($in_cart_value).'" title="Menge" size="4" inputmode="numeric">';
	$output .= '<div class="quantity-button plus"><i class="klbth-icon-plus"></i></div>';
	$output .= '</div><!-- quantity -->';
	
	$output .= cosmetsy_add_to_cart_button();

	$output .= '</div>';
	
	return $output;
}

/*************************************************
## Re-order WooCommerce Single Product Summary
*************************************************/
$reorder_single = get_theme_mod( 'cosmetsy_shop_single_reorder', 
	array( 
		'woocommerce_template_single_title', 
		'woocommerce_template_single_rating', 
		'woocommerce_template_single_price', 
		'woocommerce_template_single_excerpt',
		'woocommerce_template_single_add_to_cart', 
		'woocommerce_template_single_meta', 
		'cosmetsy_social_share', 
		 
	) 
);

if($reorder_single){
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'cosmetsy_social_share', 70);
	
	$count = 7;
	
	foreach ( $reorder_single as $single_part ) {
		
		add_action( 'woocommerce_single_product_summary', $single_part, $count );
		
		$count+=7;
	}
}

/*----------------------------
  Product Type 1
 ----------------------------*/
function cosmetsy_product_type1(){
	global $product;
	global $post;
	global $woocommerce;
	
	$output = '';
	
	$id = get_the_ID();
	$allproduct = wc_get_product( get_the_ID() );

	$cart_url = wc_get_cart_url();
	$price = $allproduct->get_price_html();
	$weight = $product->get_weight();
	$stock_status = $product->get_stock_status();
	$stock_text = $product->get_availability();
	$rating = wc_get_rating_html($product->get_average_rating());
	$ratingcount = $product->get_review_count();
	$wishlist = get_theme_mod( 'cosmetsy_wishlist_button', '0' );
	$compare = get_theme_mod( 'cosmetsy_compare_button', '0' );
	$quickview = get_theme_mod( 'cosmetsy_quick_view_button', '0' );

	$postview  = isset( $_POST['shop_view'] ) ? $_POST['shop_view'] : '';

	if(cosmetsy_shop_view() == 'list_view' || $postview == 'list_view') {
		$output .= '<div class="klb-product-list product-content">';
		$output .= '<div class="row klb-product">';
		
		$output .= '<div class="col-xl-4 col-lg-4 ">';
		$output .= '<div class="product-media">';
		$output .= cosmetsy_sale_percentage();
		$output .= '<figure class="entry-media">';
		$output .= '<a href="'.get_permalink().'">';
		$output .= '<span class="second-thumbnail" style="background-image: url('.cosmetsy_product_second_image().');"></span>';
		$output .= '<img src="'.cosmetsy_product_image().'" alt="'.the_title_attribute( 'echo=0' ).'">';
		$output .= '</a>';
		$output .= '<div class="product-action">';
		if($quickview == '1'){
		$output .= '<a href="'.$product->get_id().'" class="detail-bnt quickview-button">';
		$output .= '<i class="klb-eye"></i>';
		$output .= '</a>';
		}
		if($wishlist == '1'){
		$output .= do_shortcode('[ti_wishlists_addtowishlist]');
		}
		$output .= cosmetsy_add_to_cart_button();
		$output .= '</div>';
		$output .= '</figure>';
		$output .= '</div>';
		$output .= '</div>';
		
		$output .= '<div class="col-xl-8 col-lg-8">';
		$output .= '<div class="content-align">';
		$output .= '<div class="entry-wrapper">';
		$output .= '<div class="entry-category">';
		$output .= wc_get_product_category_list($product->get_id(), '');
		$output .= '</div>';
		$output .= '<h2 class="entry-name woocommerce-loop-product__title">';
		$output .= '<a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">'.get_the_title().'</a>';
		$output .= '</h2>';
		$output .= '<span class="price">';
		$output .= $price;
		$output .= '</span>';
		$output .= '<p>'.cosmetsy_limit_words(get_the_excerpt(), '20').'</p>';
		$output .= '<a href="'.get_permalink().'" class="button light alt" title="'.the_title_attribute( 'echo=0' ).'">'.esc_html__('Shop Now','cosmetsy').'</a>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		
		
		$output .= '</div>';
		$output .= '</div>';
	} else {
		
		$output .= '<div class="product-content">';
		$output .= '<div class="product-media">';
		$output .= cosmetsy_sale_percentage();
		$output .= '<figure class="entry-media">';
		$output .= '<a href="'.get_permalink().'">';
		$output .= '<span class="second-thumbnail" style="background-image: url('.cosmetsy_product_second_image().');"></span>';
		$output .= '<img src="'.cosmetsy_product_image().'" alt="'.the_title_attribute( 'echo=0' ).'">';
		$output .= '</a>';
		$output .= '<div class="product-action">';
		if($quickview == '1'){
		$output .= '<a href="'.$product->get_id().'" class="detail-bnt quickview-button">';
		$output .= '<i class="klb-eye"></i>';
		$output .= '</a>';
		}
		if($wishlist == '1'){
		$output .= do_shortcode('[ti_wishlists_addtowishlist]');
		}
		$output .= cosmetsy_add_to_cart_button();
		$output .= '</div>';
		$output .= '</figure>';
		$output .= '</div>';

		$output .= '<div class="content-align">';
		$output .= '<div class="entry-wrapper">';
		$output .= '<div class="entry-category">';
		$output .= wc_get_product_category_list($product->get_id(), '');
		$output .= '</div>';
		$output .= '<h2 class="entry-name woocommerce-loop-product__title">';
		$output .= '<a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">'.get_the_title().'</a>';
		$output .= '</h2>';
		$output .= '<span class="price">';
		$output .= $price;
		$output .= '</span>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';

	}

	
	return $output;
}

/*----------------------------
  Product Type 2
 ----------------------------*/
function cosmetsy_product_type2(){
	global $product;
	global $post;
	global $woocommerce;
	
	$output = '';
	
	$id = get_the_ID();
	$allproduct = wc_get_product( get_the_ID() );

	$cart_url = wc_get_cart_url();
	$price = $allproduct->get_price_html();
	$weight = $product->get_weight();
	$stock_status = $product->get_stock_status();
	$stock_text = $product->get_availability();
	$rating = wc_get_rating_html($product->get_average_rating());
	$ratingcount = $product->get_review_count();
	$wishlist = get_theme_mod( 'cosmetsy_wishlist_button', '0' );
	$compare = get_theme_mod( 'cosmetsy_compare_button', '0' );
	$quickview = get_theme_mod( 'cosmetsy_quick_view_button', '0' );

	
	if(cosmetsy_shop_view() == 'list_view') {
		$output .= '<div class="klb-product-list product-content">';
		$output .= '<div class="row klb-product">';
		
		$output .= '<div class="col-xl-4 col-lg-4 ">';
		$output .= '<div class="product-media">';
		$output .= cosmetsy_sale_percentage();
		$output .= '<figure class="entry-media">';
		$output .= '<a href="'.get_permalink().'">';
		$output .= '<span class="second-thumbnail" style="background-image: url('.cosmetsy_product_second_image().');"></span>';
		$output .= '<img src="'.cosmetsy_product_image().'" alt="'.the_title_attribute( 'echo=0' ).'">';
		$output .= '</a>';
		$output .= '<div class="product-action">';
		if($quickview == '1'){
		$output .= '<a href="'.$product->get_id().'" class="detail-bnt quickview-button">';
		$output .= '<i class="klb-eye"></i>';
		$output .= '</a>';
		}
		if($wishlist == '1'){
		$output .= do_shortcode('[ti_wishlists_addtowishlist]');
		}
		$output .= cosmetsy_add_to_cart_button();
		$output .= '</div>';
		$output .= '</figure>';
		$output .= '</div>';
		$output .= '</div>';
		
		$output .= '<div class="col-xl-8 col-lg-8">';
		$output .= '<div class="content-align">';
		$output .= '<div class="entry-wrapper">';
		$output .= '<div class="entry-category">';
		$output .= wc_get_product_category_list($product->get_id(), '');
		$output .= '</div>';
		$output .= '<h2 class="entry-name woocommerce-loop-product__title">';
		$output .= '<a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">'.get_the_title().'</a>';
		$output .= '</h2>';
		$output .= '<span class="price">';
		$output .= $price;
		$output .= '</span>';
		$output .= '<p>'.cosmetsy_limit_words(get_the_excerpt(), '20').'</p>';
		$output .= '<a href="'.get_permalink().'" class="button light alt" title="'.the_title_attribute( 'echo=0' ).'">'.esc_html__('Shop Now','cosmetsy').'</a>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		
		
		$output .= '</div>';
		$output .= '</div>';
	} else {
		
		$output .= '<div class="product-content">';
		$output .= '<div class="product-media">';
		$output .= cosmetsy_sale_percentage();
		$output .= '<figure class="entry-media">';
		$output .= '<a href="'.get_permalink().'">';
		$output .= '<span class="second-thumbnail" style="background-image: url('.cosmetsy_product_second_image().');"></span>';
		$output .= '<img src="'.cosmetsy_product_image().'" alt="'.the_title_attribute( 'echo=0' ).'">';
		$output .= '</a>';
		$output .= '<div class="product-action">';
		if($quickview == '1'){
		$output .= '<a href="'.$product->get_id().'" class="detail-bnt quickview-button">';
		$output .= '<i class="klb-eye"></i>';
		$output .= '</a>';
		}
		if($wishlist == '1'){
		$output .= do_shortcode('[ti_wishlists_addtowishlist]');
		}
		$output .= '</div>';
		$output .= '</figure>';
		$output .= '</div>';

		$output .= '<div class="content-align">';
		$output .= '<div class="entry-wrapper">';
		$output .= '<div class="entry-category">';
		$output .= wc_get_product_category_list($product->get_id(), '');
		$output .= '</div>';
		$output .= '<h2 class="entry-name woocommerce-loop-product__title">';
		$output .= '<a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">'.get_the_title().'</a>';
		$output .= '</h2>';
		$output .= '<div class="product-switcher">';
		$output .= '<div class="product-switcher--item">';
		$output .= '<span class="price">';
		$output .= $price;
		$output .= '</span>';
		$output .= '</div>';
		$output .= '<div class="product-switcher--item">';
		$output .= cosmetsy_add_to_cart_button();
		$output .= '</div>';
		$output .= '</div>';
		

		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';

	}

	
	return $output;
}

/*----------------------------
  Product Type 3
 ----------------------------*/
function cosmetsy_product_type3(){
	global $product;
	global $post;
	global $woocommerce;
	
	$output = '';
	
	$id = get_the_ID();
	$allproduct = wc_get_product( get_the_ID() );

	$cart_url = wc_get_cart_url();
	$price = $allproduct->get_price_html();
	$weight = $product->get_weight();
	$stock_status = $product->get_stock_status();
	$stock_text = $product->get_availability();
	$rating = wc_get_rating_html($product->get_average_rating());
	$ratingcount = $product->get_review_count();
	$wishlist = get_theme_mod( 'cosmetsy_wishlist_button', '0' );
	$compare = get_theme_mod( 'cosmetsy_compare_button', '0' );
	$quickview = get_theme_mod( 'cosmetsy_quick_view_button', '0' );

	
	if(cosmetsy_shop_view() == 'list_view') {
		$output .= '<div class="klb-product-list product-content">';
		$output .= '<div class="row klb-product">';
		
		$output .= '<div class="col-xl-4 col-lg-4 ">';
		$output .= '<div class="product-media">';
		$output .= cosmetsy_sale_percentage();
		$output .= '<figure class="entry-media">';
		$output .= '<a href="'.get_permalink().'">';
		$output .= '<span class="second-thumbnail" style="background-image: url('.cosmetsy_product_second_image().');"></span>';
		$output .= '<img src="'.cosmetsy_product_image().'" alt="'.the_title_attribute( 'echo=0' ).'">';
		$output .= '</a>';
		$output .= '<div class="product-action">';
		if($quickview == '1'){
		$output .= '<a href="'.$product->get_id().'" class="detail-bnt quickview-button">';
		$output .= '<i class="klb-eye"></i>';
		$output .= '</a>';
		}
		if($wishlist == '1'){
		$output .= do_shortcode('[ti_wishlists_addtowishlist]');
		}
		$output .= cosmetsy_add_to_cart_button();
		$output .= '</div>';
		$output .= '</figure>';
		$output .= '</div>';
		$output .= '</div>';
		
		$output .= '<div class="col-xl-8 col-lg-8">';
		$output .= '<div class="content-align">';
		$output .= '<div class="entry-wrapper">';
		$output .= '<div class="entry-category">';
		$output .= wc_get_product_category_list($product->get_id(), '');
		$output .= '</div>';
		$output .= '<h2 class="entry-name woocommerce-loop-product__title">';
		$output .= '<a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">'.get_the_title().'</a>';
		$output .= '</h2>';
		$output .= '<span class="price">';
		$output .= $price;
		$output .= '</span>';
		$output .= '<p>'.cosmetsy_limit_words(get_the_excerpt(), '20').'</p>';
		$output .= '<a href="'.get_permalink().'" class="button light alt" title="'.the_title_attribute( 'echo=0' ).'">'.esc_html__('Shop Now','cosmetsy').'</a>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		
		
		$output .= '</div>';
		$output .= '</div>';
	} else {
		$output .= '<div class="product-content">';
		$output .= '<div class="product-media">';
		$output .= cosmetsy_sale_percentage();
		$output .= '<figure class="entry-media">';
		$output .= '<a href="'.get_permalink().'">';
		$output .= '<span class="second-thumbnail" style="background-image: url('.cosmetsy_product_second_image().');"></span>';
		$output .= '<img src="'.cosmetsy_product_image().'" alt="'.the_title_attribute( 'echo=0' ).'">';
		$output .= '</a>';
		$output .= cosmetsy_add_to_cart_button();
		$output .= '<div class="product-action">';
		if($quickview == '1'){
		$output .= '<a href="'.$product->get_id().'" class="detail-bnt quickview-button">';
		$output .= '<i class="klb-eye"></i>';
		$output .= '</a>';
		}
		if($wishlist == '1'){
		$output .= do_shortcode('[ti_wishlists_addtowishlist]');
		}
		$output .= '</div>';
		$output .= '</figure>';
		$output .= '</div>';

		$output .= '<div class="content-align">';
		$output .= '<div class="entry-wrapper">';
		$output .= '<div class="entry-category">';
		$output .= wc_get_product_category_list($product->get_id(), '');
		$output .= '</div>';
		$output .= '<h2 class="entry-name woocommerce-loop-product__title">';
		$output .= '<a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">'.get_the_title().'</a>';
		$output .= '</h2>';
		$output .= '<span class="price">';
		$output .= $price;
		$output .= '</span>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
	}

	
	return $output;
}

/*----------------------------
  Add my owns
 ----------------------------*/
function cosmetsy_shop_thumbnail () {
	echo cosmetsy_product_type1();
}

/*************************************************
## Woocommerce Cart Text
*************************************************/

//add to cart button
function cosmetsy_add_to_cart_button(){
	global $product;
	$output = '';

	ob_start();
	woocommerce_template_loop_add_to_cart();
	$output .= ob_get_clean();

	if(!empty($output)){
		$pos = strpos($output, ">");
		
		if ($pos !== false) {
		    $output = substr_replace($output,">", $pos , strlen(1));
		}
	}
	
	if($product->get_type() == 'variable' && empty($output)){
		$output = "<a class='btn btn-primary add-to-cart cart-hover' href='".get_permalink($product->id)."'>".esc_html__('Select options','cosmetsy')."</a>";
	}

	if($product->get_type() == 'simple'){
		$output .= "";
	} else {
		$btclass  = "single_bt";
	}
	
	if($output) return "$output";
}



/*************************************************
## Woo Cart Ajax
*************************************************/ 

add_filter('woocommerce_add_to_cart_fragments', 'cosmetsy_header_add_to_cart_fragment');
function cosmetsy_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	
	<span class="cart-count"><?php echo sprintf(_n('(%d)', '(%d)', $woocommerce->cart->cart_contents_count, 'cosmetsy'), $woocommerce->cart->cart_contents_count);?></span>
	

	<?php
	$fragments['span.cart-count'] = ob_get_clean();

	return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'cosmetsy_header_add_to_cart_fragment_icon');
function cosmetsy_header_add_to_cart_fragment_icon( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	
	<span class="cart-count-icon"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'cosmetsy'), $woocommerce->cart->cart_contents_count);?></span>
	

	<?php
	$fragments['span.cart-count-icon'] = ob_get_clean();

	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {

    ob_start();
    ?>

    <div class="fl-mini-cart-content">
        <?php woocommerce_mini_cart(); ?>
    </div>

    <?php $fragments['div.fl-mini-cart-content'] = ob_get_clean();

    return $fragments;

} );

/*************************************************
## Cosmetsy Woo Search Form
*************************************************/ 

add_filter( 'get_product_search_form' , 'cosmetsy_custom_product_searchform' );

function cosmetsy_custom_product_searchform( $form ) {

	$form = '<form class="product-search-form" action="' . esc_url( home_url( '/'  ) ) . '" role="search" method="get" id="searchform">
				<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search','cosmetsy').'">
				<button type="submit"><i class="klb-right"></i></button>
                <input type="hidden" name="post_type" value="product" />
			</form>';

	return $form;
}

function cosmetsy_header_product_search() {
	$terms = get_terms( array(
		'taxonomy' => 'product_cat',
		'hide_empty' => true,
		'parent'    => 0,
	) );

	$form = '';
	
	$form .= '<form action="' . esc_url( home_url( '/'  ) ) . '" class="search-holder--form" role="search" method="get" id="searchform">';
	$form .= '<input class="search-form-input" type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search any Product','cosmetsy').'">';
	$form .= '<button type="submit"><i class="klb-search"></i></button>';
	$form .= '<input type="hidden" name="post_type" value="product" />';
	$form .= '</form>';

	return $form;
}

function cosmetsy_category_search_form() {

	$terms = get_terms( array(
		'taxonomy' => 'product_cat',
		'hide_empty' => true,
		'parent'    => 0,
	) );

	$form = '';

	$form .= '<form action="' . esc_url( home_url( '/'  ) ) . '" class="cat-search header-search--form" role="search" method="get" id="searchform-cat">';
	$form .= '<div class="search-icon">';
	$form .= '<button type="submit" class="search_btn"><i class="klb-search"></i></button>';
	$form .= '</div>';
	$form .= '<input class="search-form-input" type="search" value="' . get_search_query() . '" name="s" placeholder="'.esc_attr__('Search Our Favorite Products...','cosmetsy').'">';
	$form .= '<select class="search-form-select" name="product_cat" id="category">';
	$form .= '<option value="">'.esc_html__('All Categories','cosmetsy').'</option>';
	foreach ( $terms as $term ) {
		if($term->count >= 1){
			$form .= '<option value="'.esc_attr($term->slug).'">'.esc_html($term->name).'</option>';
		}
	}
	$form .= '</select>';
	$form .= '<input type="hidden" name="post_type" value="product" />';
	$form .= '</form>';


	return $form;
}





/*************************************************
## Cosmetsy Gallery Thumbnail Size
*************************************************/ 
add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
    return array(
        'width' => 90,
        'height' => 54,
        'crop' => 0,
    );
} );


/*************************************************
## Quick View Scripts
*************************************************/ 

function cosmetsy_quick_view_scripts() {
  	wp_enqueue_script( 'cosmetsy-quick-ajax', get_template_directory_uri() . '/assets/js/custom/quick_ajax.js', array('jquery'), '1.0.0', true );
	wp_localize_script( 'cosmetsy-quick-ajax', 'MyAjax', array(
		'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
	));
  	wp_enqueue_script( 'cosmetsy-variationform', get_template_directory_uri() . '/assets/js/custom/variationform.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'wc-add-to-cart-variation' );
}
add_action( 'wp_enqueue_scripts', 'cosmetsy_quick_view_scripts' );

/*************************************************
## Quick View CallBack
*************************************************/ 

add_action( 'wp_ajax_nopriv_quick_view', 'cosmetsy_quick_view_callback' );
add_action( 'wp_ajax_quick_view', 'cosmetsy_quick_view_callback' );
function cosmetsy_quick_view_callback() {

	global $wpdb,$post; // this is how you get access to the database
	$id = intval( $_POST['id'] );
	$loop = new WP_Query( array(
		'post_type' => 'product',
		'p' => $id,
	  )
	);
	
	while ( $loop->have_posts() ) : $loop->the_post(); 
	$product = new WC_Product(get_the_ID());
	
	$rating = wc_get_rating_html($product->get_average_rating());
	$price = $product->get_price_html();
	$rating_count = $product->get_rating_count();
	$review_count = $product->get_review_count();
	$average      = $product->get_average_rating();
	$product_image_ids = $product->get_gallery_attachment_ids();

	$output = '';
	
		$output .= '<div class="quickview-product product white-popup">';
		$output .= '<div class="quickview-product--inner product-single">';
		
		if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
			$count = 0;
			$number = 0;
			
			$att=get_post_thumbnail_id();
			$image_src = wp_get_attachment_image_src( $att, 'full' );
			$image_src = $image_src[0];
			
			$output .= '<div class="column">';
			$output .= '<div class="woocommerce-product-gallery">';
			$output .= cosmetsy_sale_percentage();
			$output .= '<div class="slider-wrapper">';
			$output .= '<svg class="preloader" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg>';
			$output .= '<figure id="images" class="woocommerce-product-gallery__wrapper site-slider" data-slideshow="1" data-arrows="true" data-asfor="#thumbnails" data-speed="1200">';
			
			$output .= '<a href="#0"><img src="'.esc_url($image_src).'" alt="Cosmetsy"></a>';
			foreach( $product_image_ids as $product_image_id ){
				$image_url = wp_get_attachment_url( $product_image_id );
				$output .= '<a href="#0"><img src="'.esc_url($image_url).'" alt="Cosmetsy"></a>';
			}
			
			$output .= '</figure>';
			$output .= '<div id="thumbnails" class="product-thumbnails site-slider" data-slideshow="8" data-focuselect="true" data-asfor="#images" data-speed="1200" data-centermode="false">';
			
			$output .= '<a href="#0"><img src="'.esc_url($image_src).'" alt="Cosmetsy"></a>';
			foreach( $product_image_ids as $product_image_id ){
				$image_url = wp_get_attachment_url( $product_image_id );
				$output .= '<a href="#0"><img src="'.esc_url($image_url).'" alt="Cosmetsy"></a>';
			}
			
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
		}
			
		$output .= '<div class="column">';
		$output .= '<div class="product-details">';

		$output .= '<div class="product-details--header hot-product">';
		ob_start();
		woocommerce_template_single_title();
		$output .= ob_get_clean();
		$output .= '</div>';

		ob_start();
		woocommerce_template_single_rating();
		$output .= ob_get_clean();

		ob_start();
		woocommerce_template_single_price();
		$output .= ob_get_clean();

		$output .= '<div class="woocommerce-product-details__short-description">';
		$output .= '<p>'.get_the_excerpt().'</p>';
		$output .= '</div>';

		ob_start();
		woocommerce_template_single_add_to_cart();
		$output .= ob_get_clean();

		ob_start();
		woocommerce_template_single_meta();
		$output .= ob_get_clean();

		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';

		endwhile; 
		wp_reset_postdata();

	 	$output_escaped = $output;
	 	echo $output_escaped;
		
		wp_die();

}

/*************************************************
## Cosmetsy Filter by Attribute
*************************************************/ 
function cosmetsy_woocommerce_layered_nav_term_html( $term_html, $term, $link, $count ) { 

	$attribute_label_name = wc_attribute_label($term->taxonomy);;
	$attribute_id = wc_attribute_taxonomy_id_by_name($attribute_label_name);
	$attr  = wc_get_attribute($attribute_id);
	$array = json_decode(json_encode($attr), true);

	if($array['type'] == 'color'){
		$color = get_term_meta( $term->term_id, 'product_attribute_color', true );
		$term_html = '<div class="type-color"><span class="color-box" style="background-color:'.esc_attr($color).';"></span>'.$term_html.'</div>';
	}
	
	if($array['type'] == 'button'){
		$term_html = '<div class="type-button"><span class="button-box"></span>'.$term_html.'</div>';
	}

    return $term_html; 
}; 
         
add_filter( 'woocommerce_layered_nav_term_html', 'cosmetsy_woocommerce_layered_nav_term_html', 10, 4 ); 


/*************************************************
## Shop Width Body Classes
*************************************************/

function cosmetsy_body_classes( $classes ) {

	if( get_theme_mod('cosmetsy_shop_width') == 'wide' || cosmetsy_get_option() == 'wide' && is_shop()) { 
		$classes[] = 'shop-wide';
	} else {
		$classes[] = '';
	}
	
	return $classes;
}
add_filter( 'body_class', 'cosmetsy_body_classes' );

/*************************************************
## Related Products with Tags
*************************************************/
if(get_theme_mod('cosmetsy_related_by_tags',0) == 1){
	add_filter( 'woocommerce_product_related_posts_relate_by_category', '__return_false' );
}

/*************************************************
## Accordion in content
*************************************************/

if(get_theme_mod('cosmetsy_accordion_content_tabs',0) == 1){
	remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs', 10);
	add_action('woocommerce_single_product_summary','woocommerce_output_product_data_tabs', 70);
}	

/*************************************************
## Stock Availability Translation
*************************************************/ 

if(get_theme_mod('cosmetsy_stock_quantity',0) != 1){
add_filter( 'woocommerce_get_availability', 'cosmetsy_custom_get_availability', 1, 2);
function cosmetsy_custom_get_availability( $availability, $_product ) {
    
    // Change In Stock Text
    if ( $_product->is_in_stock() ) {
        $availability['availability'] = esc_html__('In Stock', 'cosmetsy');
    }
    // Change Out of Stock Text
    if ( ! $_product->is_in_stock() ) {
        $availability['availability'] = esc_html__('Out of stock', 'cosmetsy');
    }
    return $availability;
}
}

/*************************************************
## Archive Description After Content
*************************************************/
if(get_theme_mod('cosmetsy_category_description_after_content',0) == 1){
	remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
	remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);
	add_action('cosmetsy_after_main_shop', 'woocommerce_taxonomy_archive_description', 5);
	add_action('cosmetsy_after_main_shop', 'woocommerce_product_archive_description', 5);
}

/*************************************************
## Catalog Mode - Disable Add to cart Button
*************************************************/
if(get_theme_mod('cosmetsy_catalog_mode', 0) == 1 || cosmetsy_get_option() == 'catalogmode'){ 
	add_filter( 'woocommerce_loop_add_to_cart_link', 'cosmetsy_remove_add_to_cart_buttons', 1 );
	function cosmetsy_remove_add_to_cart_buttons() {
		return false;
	}
}

} // is woocommerce activated

?>