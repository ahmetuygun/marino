<?php $wishlistheader = get_theme_mod('cosmetsy_header_wishlist',0); ?>
<?php if($wishlistheader == 1){ ?>
	<?php if ( function_exists( 'tinv_url_wishlist_default' ) ) { ?>
		<div class="quick-button wishlist">
			<a href="<?php echo tinv_url_wishlist_default(); ?>">
				<i class="klb-heart-1"></i>
			</a>
		</div>
	<?php } ?>
<?php } ?>