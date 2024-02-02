<?php
/*************************************************
* Mobile Filter
*************************************************/
add_action('wp_footer', 'cosmetsy_mobile_filter'); 
function cosmetsy_mobile_filter() { 

	$mobilebottommenu = get_theme_mod('cosmetsy_mobile_bottom_menu','0');
	if($mobilebottommenu == '1'){
		
	wp_enqueue_style( 'klb-mobile-filter');
	wp_enqueue_script( 'klb-mobile-filter');
?>

	<?php $edittoggle = get_theme_mod('cosmetsy_mobile_bottom_menu_edit_toggle','0'); ?>
	<?php if($edittoggle == '1'){ ?>
		<div class="footer-fix-nav shadow">
			<div class="row mx-0">
				<?php $editrepeater = get_theme_mod('cosmetsy_mobile_bottom_menu_edit'); ?>
				
				<?php foreach($editrepeater as $e){ ?>		
				<?php if($e['mobile_menu_type'] == 'Home'){ ?>
						<div class="col">
							<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
							</a>
						</div>
					<?php } elseif($e['mobile_menu_type'] == 'Shop'){ ?>
						<div class="col">
							<a href="<?php echo wc_get_page_permalink( 'shop' ); ?>"><i class="klb-grid"></i></a>
						</div>
					<?php } elseif($e['mobile_menu_type'] == 'Cart'){ ?>
						<div class="col">
							<?php global $woocommerce; ?>
							<a href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="klb-shop-bag"></i><span class="count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'cosmetsy'), $woocommerce->cart->cart_contents_count);?></a>
						</div>
					<?php } elseif($e['mobile_menu_type'] == 'Myaccount'){ ?>
						<div class="col">
							<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>"><i class="klb-user-profile"></i></a>
						</div>
					<?php } else { ?>	
						<div class="col">
							<a href="<?php echo esc_url($e['mobile_menu_url']); ?>">
								<i class="klb-<?php echo esc_attr($e['mobile_menu_icon']); ?>"></i>
							</a>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
		<?php } else { ?>
			<div class="footer-fix-nav shadow">
				<div class="row mx-0">
					<div class="col">
						<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
						</a>
					</div>
					<div class="col">
						<a href="<?php echo wc_get_page_permalink( 'shop' ); ?>"><i class="klb-grid"></i></a>
					</div>
					<div class="col">
						<?php global $woocommerce; ?>
						<a href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="klb-shop-bag"></i><span class="count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'cosmetsy'), $woocommerce->cart->cart_contents_count);?></a>
					</div>
					<div class="col">
						<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>"><i class="klb-user-profile"></i></a>
					</div>
				</div>
			</div>
	<?php } ?>
	
<?php }

    
}