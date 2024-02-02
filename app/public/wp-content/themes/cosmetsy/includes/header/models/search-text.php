<?php $headersearch = get_theme_mod('cosmetsy_header_search','0'); ?>
<?php if($headersearch == 1){ ?>
	<div class="quick-button search-button text">
		<span class="quick-label"><?php esc_html_e('Search','cosmetsy'); ?></span><i class="klb-search"></i>
	</div>
<?php } ?>