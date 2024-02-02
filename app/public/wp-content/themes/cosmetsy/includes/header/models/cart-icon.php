<?php $headercart = get_theme_mod('cosmetsy_header_cart','0'); ?>
<?php if($headercart == '1'){ ?>
	<?php global $woocommerce; ?>
	<?php $carturl = wc_get_cart_url(); ?>
	
	<div class="quick-button mini-cart">
		<a href="<?php echo esc_url($carturl); ?>" class="cart-link">
			<i class="klb-shop-bag"></i>
			<span class="cart-count-icon"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'cosmetsy'), $woocommerce->cart->cart_contents_count);?></span>
		</a>
		<div class="woo-mini-cart">
			<div class="woo-mini-cart--body">
				<div class="fl-mini-cart-content">
					<?php woocommerce_mini_cart(); ?>
				</div>
			</div>
		</div>
	</div>
	
<?php } ?>
