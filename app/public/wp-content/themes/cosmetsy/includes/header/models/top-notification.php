<?php $topheadertext = get_theme_mod('cosmetsy_top_header','0'); ?>
<?php if($topheadertext == '1'){ ?>
	<aside class="site-global-notification klbtype-1">
		<div class="container">
			<div class="row">
				<div class="col">
					<p><?php echo cosmetsy_sanitize_data(get_theme_mod('cosmetsy_top_header_text')); ?></p>
				</div>
			</div>
		</div>
	</aside>
<?php } ?>