<?php $wishlistheader = get_theme_mod('cosmetsy_header_wishlist',0); ?>
<?php if($wishlistheader == 1){ ?>
	<?php if ( function_exists( 'tinv_url_wishlist_default' ) ) { ?>
		<div class="quick-button wishlist text">
			<a href="<?php echo tinv_url_wishlist_default(); ?>">
				<span class="quick-label"><?php esc_html_e('Wishlist','cosmetsy'); ?></span>
			</a>
		</div>
	<?php } ?>
<?php } ?>