<?php

/*************************************************
## Main Header Function
*************************************************/

add_action('cosmetsy_main_header','cosmetsy_main_header_function',10);

if ( ! function_exists( 'cosmetsy_main_header_function' ) ) {
	function cosmetsy_main_header_function(){

		if(cosmetsy_page_settings('page_header_type') == 'type4'){
		
		get_template_part( 'includes/header/header-type4' );
		
		} elseif(cosmetsy_page_settings('page_header_type') == 'type3') {
			
			get_template_part( 'includes/header/header-type3' );
			
		} elseif(cosmetsy_page_settings('page_header_type') == 'type2') {
			
			get_template_part( 'includes/header/header-type2' );
			
		} elseif(cosmetsy_page_settings('page_header_type') == 'type1') {
			
			get_template_part( 'includes/header/header-type1' );

		} elseif(get_theme_mod('cosmetsy_header_type') == 'type4'){
			
			get_template_part( 'includes/header/header-type4' );
			
		} elseif(get_theme_mod('cosmetsy_header_type') == 'type3'){
			
			get_template_part( 'includes/header/header-type3' );
			
		} elseif(get_theme_mod('cosmetsy_header_type') == 'type2'){
			
			get_template_part( 'includes/header/header-type2' );
			
		} else {
			
			get_template_part( 'includes/header/header-type1' );
			
		}
		
	}
}



?>
