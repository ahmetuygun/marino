<?php
if ( ! function_exists( 'cosmetsy_main_footer_function' ) ) {
	function cosmetsy_main_footer_function(){
		
	?>
		
		<?php 

			if(cosmetsy_page_settings('page_footer_type') == 'type2'){
				
				get_template_part( 'includes/footer/footer-type2' );
				
			} elseif(cosmetsy_page_settings('page_footer_type') == 'type1') {
				
				get_template_part( 'includes/footer/footer-type1' );

			} elseif(get_theme_mod('cosmetsy_footer_type') == 'type2'){
				
				get_template_part( 'includes/footer/footer-type2' );
				
			} else {
				
				get_template_part( 'includes/footer/footer-type1' );
				
			}
		?>
	
		</div><!-- site--inner -->
	</div><!-- site -->

	<?php get_template_part( 'includes/footer/models/search-modal' ); ?>
	
	<?php }
}

add_action('cosmetsy_main_footer','cosmetsy_main_footer_function', 10);