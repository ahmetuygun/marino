<?php

/*************************************************
## Scripts
*************************************************/
function cosmetsy_buy_now_scripts() {
	wp_enqueue_style( 'klb-buy-now',   plugins_url( 'css/buy-now.css', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'cosmetsy_buy_now_scripts' );

/*************************************************
## Buy Now Button For Single Product
*************************************************/
function cosmetsy_add_buy_now_button_single(){
	global $product;
    printf( '<button id="buynow" type="submit" name="cosmetsy-buy-now" value="%d" class="buy_now_button button light medium wide">%s</button>', $product->get_ID(), esc_html__( 'Buy Now', 'cosmetsy-core' ) );
}
add_action( 'woocommerce_after_add_to_cart_button', 'cosmetsy_add_buy_now_button_single' );

/*************************************************
## Handle for click on buy now
*************************************************/
function cosmetsy_handle_buy_now(){
	if ( !isset( $_REQUEST['cosmetsy-buy-now'] ) ){
		return false;
	}

	WC()->cart->empty_cart();

	$product_id = absint( $_REQUEST['cosmetsy-buy-now'] );
    $quantity = absint( $_REQUEST['quantity'] );

	if ( isset( $_REQUEST['variation_id'] ) ) {

		$variation_id = absint( $_REQUEST['variation_id'] );
		WC()->cart->add_to_cart( $product_id, 1, $variation_id );

	}else{
        WC()->cart->add_to_cart( $product_id, $quantity );
	}

	wp_safe_redirect( wc_get_checkout_url() );
	exit;
}
add_action( 'wp_loaded', 'cosmetsy_handle_buy_now' );