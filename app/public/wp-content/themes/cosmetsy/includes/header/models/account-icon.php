<?php $headeraccounticon  = get_theme_mod('cosmetsy_header_account','0'); ?>
<?php if($headeraccounticon){ ?>
	<div class="quick-button user-login">
		<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>">
			<i class="klb-user-profile"></i>
		</a>
	</div>
<?php } ?>