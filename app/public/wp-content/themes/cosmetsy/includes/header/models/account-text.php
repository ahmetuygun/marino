<?php $headeraccounticon  = get_theme_mod('cosmetsy_header_account','0'); ?>
<?php if($headeraccounticon){ ?>
	<div class="quick-button user-login text">
		<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>">
			<span class="quick-label"><?php esc_html_e('Login/Sign Up','cosmetsy'); ?></span>
		</a>
	</div>
<?php } ?>