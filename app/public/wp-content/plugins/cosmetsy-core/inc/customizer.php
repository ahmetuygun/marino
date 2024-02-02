<?php
/*======
*
* Kirki Settings
*
======*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_config(
	'cosmetsy_customizer', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);

/*======
*
* Sections
*
======*/
$sections = array(
	'shop_settings' => array (
		esc_attr__( 'Shop Settings', 'cosmetsy' ),
		esc_attr__( 'You can customize the shop settings.', 'cosmetsy' ),
	),
	
	'blog_settings' => array (
		esc_attr__( 'Blog Settings', 'cosmetsy' ),
		esc_attr__( 'You can customize the blog settings.', 'cosmetsy' ),
	),

	'header_settings' => array (
		esc_attr__( 'Header Settings', 'cosmetsy' ),
		esc_attr__( 'You can customize the header settings.', 'cosmetsy' ),
	),

	'main_color' => array (
		esc_attr__( 'Main Color', 'cosmetsy' ),
		esc_attr__( 'You can customize the main color.', 'cosmetsy' ),
	),
	
	'elementor_templates' => array (
		esc_attr__( 'Elementor Templates', 'cosmetsy-core' ),
		esc_attr__( 'You can customize the elementor templates.', 'cosmetsy-core' ),
	),
	
	'map_settings' => array (
		esc_attr__( 'Map Settings', 'cosmetsy' ),
		esc_attr__( 'You can customize the map settings.', 'cosmetsy' ),
	),

	'footer_settings' => array (
		esc_attr__( 'Footer Settings', 'cosmetsy' ),
		esc_attr__( 'You can customize the footer settings.', 'cosmetsy' ),
	),
	
	'cosmetsy_widgets' => array (
		esc_attr__( 'Cosmetsy Widgets', 'cosmetsy' ),
		esc_attr__( 'You can customize the cosmetsy widgets.', 'cosmetsy' ),
	),
	
	'newsletter_settings' => array (
		esc_attr__( 'Newsletter Settings', 'cosmetsy-core' ),
		esc_attr__( 'You can customize the Newsletter Popup settings.', 'cosmetsy-core' ),
	),
	
	'gdpr_settings' => array (
		esc_attr__( 'GDPR Settings', 'cosmetsy-core' ),
		esc_attr__( 'You can customize the GDPR settings.', 'cosmetsy-core' ),
	),
	
	'maintenance_settings' => array (
		esc_attr__( 'Maintenance Settings', 'cosmetsy-core' ),
		esc_attr__( 'You can customize the Maintenance settings.', 'cosmetsy-core' ),
	),
	
);

foreach ( $sections as $section_id => $section ) {
	$section_args = array(
		'title' => $section[0],
		'description' => $section[1],
	);

	if ( isset( $section[2] ) ) {
		$section_args['type'] = $section[2];
	}

	if( $section_id == "colors" ) {
		Kirki::add_section( str_replace( '-', '_', $section_id ), $section_args );
	} else {
		Kirki::add_section( 'cosmetsy_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
	}
}


/*======
*
* Fields
*
======*/
function cosmetsy_customizer_add_field ( $args ) {
	Kirki::add_field(
		'cosmetsy_customizer',
		$args
	);
}

	/*====== Header ==================================================================================*/
		/*====== Header Panels ======*/
		Kirki::add_panel (
			'cosmetsy_header_panel',
			array(
				'title' => esc_html__( 'Header Settings', 'cosmetsy' ),
				'description' => esc_html__( 'You can customize the header from this panel.', 'cosmetsy' ),
			)
		);

		$sections = array (
			'header_logo' => array(
				esc_attr__( 'Logo', 'cosmetsy' ),
				esc_attr__( 'You can customize the logo which is on header..', 'cosmetsy' )
			),
		
			'header_general' => array(
				esc_attr__( 'Header General', 'cosmetsy' ),
				esc_attr__( 'You can customize the header.', 'cosmetsy' )
			),

			'header_preloader' => array(
				esc_attr__( 'Preloader', 'cosmetsy' ),
				esc_attr__( 'You can customize the loader.', 'cosmetsy' )
			),
			
			'header_sidebar_menu' => array(
				esc_attr__( 'Sidebar Menu Style', 'cosmetsy' ),
				esc_attr__( 'You can customize the Sidebar menu.', 'cosmetsy' )
			),
			
			'header_type1' => array(
				esc_attr__( 'Header Type1 Style', 'cosmetsy' ),
				esc_attr__( 'You can customize the header type1.', 'cosmetsy' )
			),
			
			'header_type2' => array(
				esc_attr__( 'Header Type2 Style', 'cosmetsy' ),
				esc_attr__( 'You can customize the header type2.', 'cosmetsy' )
			),
			
			'header_type3' => array(
				esc_attr__( 'Header Type3 Style', 'cosmetsy' ),
				esc_attr__( 'You can customize the header type3.', 'cosmetsy' )
			),
			
			'header_type4' => array(
				esc_attr__( 'Header Type4 Style', 'cosmetsy' ),
				esc_attr__( 'You can customize the header type4.', 'cosmetsy' )
			),
			
			'top_header' => array(
				esc_attr__( 'Top Header Style', 'cosmetsy' ),
				esc_attr__( 'You can customize the top header .', 'cosmetsy' )
			),

		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'cosmetsy_header_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'cosmetsy_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Logo ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'cosmetsy_logo',
				'label' => esc_attr__( 'Logo', 'cosmetsy' ),
				'description' => esc_attr__( 'You can upload a logo.', 'cosmetsy' ),
				'section' => 'cosmetsy_header_logo_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Logo ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'cosmetsy_logo_white',
				'label' => esc_attr__( 'Logo White', 'cosmetsy' ),
				'description' => esc_attr__( 'You can upload a logo.', 'cosmetsy' ),
				'section' => 'cosmetsy_header_logo_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Logo Text ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_logo_text',
				'label' => esc_attr__( 'Set Logo Text', 'cosmetsy' ),
				'description' => esc_attr__( 'You can set logo as text.', 'cosmetsy' ),
				'section' => 'cosmetsy_header_logo_section',
				'default' => 'Cosmetsy',
			)
		);
		
		/*====== Logo Size ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'cosmetsy_logo_size',
				'label'       => esc_html__( 'Logo Size', 'cosmetsy' ),
				'description' => esc_attr__( 'You can set size of the logo.', 'cosmetsy' ),
				'section'     => 'cosmetsy_header_logo_section',
				'default'     => 168,
				'priority'    => 30,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 300,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.site-header--content .site-brand img',
					'property'    => 'max-width',
					'units' => 'px',
				], ],
			)
		);
		
		/*====== Mobil Logo Size ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'cosmetsy_mobil_logo_size',
				'label'       => esc_html__( 'Mobile Logo Size', 'cosmetsy' ),
				'description' => esc_attr__( 'You can set size of the mobil logo.', 'cosmetsy' ),
				'section'     => 'cosmetsy_header_logo_section',
				'default'     => 135,
				'priority'    => 30,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 200,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.site-header--mobile .site-brand img',
					'property'    => 'width',
					'units' => 'px',
				], ],
			)
		);
		
		/*====== Sidebar Logo Size ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'cosmetsy_sidebar_logo_size',
				'label'       => esc_html__( 'Sidebar Logo Size', 'cosmetsy' ),
				'description' => esc_attr__( 'You can set size of the sidebar logo.', 'cosmetsy' ),
				'section'     => 'cosmetsy_header_logo_section',
				'default'     => 134,
				'priority'    => 30,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 200,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.site-offcanvas--header .site-brand a img',
					'property'    => 'width',
					'units' => 'px',
				], ],
			)
		);
		
		cosmetsy_customizer_add_field(
			array (
			'type'        => 'select',
			'settings'    => 'cosmetsy_header_type',
			'label'       => esc_html__( 'Header Type', 'cosmetsy' ),
			'section'     => 'cosmetsy_header_general_section',
			'default'     => 'type-1',
			'priority'    => 10,
			'choices'     => array(
				'type1' => esc_attr__( 'Type 1', 'cosmetsy' ),
				'type2' => esc_attr__( 'Type 2', 'cosmetsy' ),
				'type3' => esc_attr__( 'Type 3', 'cosmetsy' ),
				'type4' => esc_attr__( 'Type 4', 'cosmetsy' ),
			),
			) 
		);
		
		/*====== Middle Sticky Header Toggle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_middle_sticky_header',
				'label' => esc_attr__( 'Middle Sticky Header', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can choose status of the header on the mobile.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_general_section',
				'default' => '0',
			)
		);

		/*====== Mobile Sticky Header Toggle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_mobile_sticky_header',
				'label' => esc_attr__( 'Mobile Sticky Header', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can choose status of the header on the mobile.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Search Toggle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_header_search',
				'label' => esc_attr__( 'Header Search', 'cosmetsy' ),
				'description' => esc_attr__( 'You can choose status of the search on the header.', 'cosmetsy' ),
				'section' => 'cosmetsy_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Ajax Search Form ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_ajax_search_form',
				'label' => esc_attr__( 'Ajax Search Form', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Enable ajax search form for the header search.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_header_search',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Most Viewed Products ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_header_most_viewed_products',
				'label' => esc_attr__( 'Header Most Viewed Products', 'cosmetsy' ),
				'description' => esc_attr__( 'You can choose status of the most viewed products on the header.', 'cosmetsy' ),
				'section' => 'cosmetsy_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Cart Toggle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_header_cart',
				'label' => esc_attr__( 'Header Cart', 'cosmetsy' ),
				'description' => esc_attr__( 'You can choose status of the mini cart on the header.', 'cosmetsy' ),
				'section' => 'cosmetsy_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Wishlist  ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_header_wishlist',
				'label' => esc_attr__( 'Wishlist', 'cosmetsy' ),
				'description' => esc_attr__( 'Disable or Enable wishlist on the header.', 'cosmetsy' ),
				'section' => 'cosmetsy_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Account Icon ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_header_account',
				'label' => esc_attr__( 'Account Icon / Login', 'cosmetsy' ),
				'description' => esc_attr__( 'Disable or Enable User Login/Signup on the header.', 'cosmetsy' ),
				'section' => 'cosmetsy_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Sidebar ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_header_sidebar',
				'label' => esc_attr__( 'Sidebar Menu', 'cosmetsy' ),
				'description' => esc_attr__( 'Disable or Enable Sidebar Menu', 'cosmetsy' ),
				'section' => 'cosmetsy_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Top Header Toggle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_top_header',
				'label' => esc_attr__( 'Top Header Text', 'cosmetsy' ),
				'description' => esc_attr__( 'Disable or Enable the top header for the headet type 4.', 'cosmetsy' ),
				'section' => 'cosmetsy_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Top Header Text ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'cosmetsy_top_header_text',
				'label' => esc_attr__( 'Header Top Label', 'cosmetsy' ),
				'description' => esc_attr__( 'You can add a text for the top header.', 'cosmetsy' ),
				'section' => 'cosmetsy_header_general_section',
				'default' => 'Free set of 8 reusable makeup remover pads with orders <strong>over 100€.</strong>',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_top_header',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Type1 Button ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'cosmetsy_header_type1_button',
				'label' => esc_attr__( 'Header Type1 Button', 'cosmetsy' ),
				'description' => esc_attr__( 'You can add a button for header type1.', 'cosmetsy' ),
				'section' => 'cosmetsy_header_general_section',
				'default' => '<a href="#">PURCHASE TODAY $59<i class="klb-zap"></i></a>',
			)
		);

		/*====== PreLoader Toggle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_preloader',
				'label' => esc_attr__( 'Disable Loader', 'cosmetsy' ),
				'description' => esc_attr__( 'Disable or Enable the loader.', 'cosmetsy' ),
				'section' => 'cosmetsy_header_preloader_section',
				'default' => '0',
			)
		);

		/*====== Loader Image ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'cosmetsy_preloader_image',
				'label' => esc_attr__( 'Image', 'cosmetsy' ),
				'description' => esc_attr__( 'You can upload an image.', 'cosmetsy' ),
				'section' => 'cosmetsy_header_preloader_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_preloader',
					  'operator' => '==',
					  'value'    => '0',
					),
				),
			)
		);
		
		/*====== Header Sidebar Menu Style ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'cosmetsy_header_sidebar_menu_typography',
				'label'       => esc_attr__( 'Sidebar Menu Featured Typography', 'cosmetsy' ),
				'section'     => 'cosmetsy_header_sidebar_menu_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '14px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.site-scroll .site-offcanvas--main .mobile-menu .menu .menu-item a',
					],
				],		
			)
		);
		
		/*====== Header Sidebar Menu Background Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'cosmetsy_header_sidebar_menu_bg',
				'label' => esc_attr__( 'Sidebar Menu Background', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a background color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_sidebar_menu_section',
			)
		);
		
		/*====== Header Sidebar Menu Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#111',
				'settings' => 'cosmetsy_header_sidebar_menu_color',
				'label' => esc_attr__( 'Sidebar Menu Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color .', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_sidebar_menu_section',
			)
		);
		
		/*====== Header Sidebar Menu Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#111',
				'settings' => 'cosmetsy_header_sidebar_menu_hvrcolor',
				'label' => esc_attr__( 'Sidebar Menu Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a hover color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_sidebar_menu_section',
			)
		);
		
		/*====== Header Sidebar Menu Border Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#eee',
				'settings' => 'cosmetsy_header_sidebar_menu_border_color',
				'label' => esc_attr__( 'Sidebar Menu Border Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a border color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_sidebar_menu_section',
			)
		);
		
		/*====== Header Sidebar Menu Social List Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_header_sidebar_menu_icon_color',
				'label' => esc_attr__( 'Sidebar Menu Social List Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a social list color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_sidebar_menu_section',
			)
		);
		
		/*====== Header Sidebar Menu Copyright Style ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'cosmetsy_header_sidebar_menu_cpy_typography',
				'label'       => esc_attr__( 'Sidebar Menu Copyright Featured Typography', 'cosmetsy' ),
				'section'     => 'cosmetsy_header_sidebar_menu_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '12px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.site-scroll  .site-offcanvas--footer .site-copyright p',
					],
				],		
			)
		);
		
		/*====== Header Sidebar Menu Copyright Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_header_sidebar_menu_cpy_color',
				'label' => esc_attr__( 'Sidebar Menu Copyright Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_sidebar_menu_section',
			)
		);
		
		/*====== Header Sidebar Menu Copyright Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_header_sidebar_menu_cpy_hvrcolor',
				'label' => esc_attr__( 'Sidebar Menu Copyright Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a hover color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_sidebar_menu_section',
			)
		);

		/*====== Header Type1 Style ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'cosmetsy_header_type1_typography',
				'label'       => esc_attr__( 'Header Featured Typography', 'cosmetsy' ),
				'section'     => 'cosmetsy_header_type1_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '14px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.style-5.site-header.header-default .primary-menu.horizontal-menu .menu > .menu-item a',
					],
				],		
			)
		);
		
		/*====== Header Type1 Background Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'cosmetsy_header_type1_bg',
				'label' => esc_attr__( 'Header Background', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a background color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type1_section',
			)
		);
		
		/*====== Header Type1 Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_header_type1_color',
				'label' => esc_attr__( 'Header Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type1_section',
			)
		);
		
		/*====== Header Type1 Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef4626',
				'settings' => 'cosmetsy_header_type1_hvrcolor',
				'label' => esc_attr__( 'Header Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a hover color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type1_section',
			)
		);
		
		/*====== Header Type1 Icon Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_header_type1_icon_color',
				'label' => esc_attr__( 'Header Icon Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type1_section',
			)
		);
		
		/*====== Header Type2 Style ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'cosmetsy_header_type2_typography',
				'label'       => esc_attr__( 'Header Featured Typography', 'cosmetsy' ),
				'section'     => 'cosmetsy_header_type2_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '14px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.site-header .primary-menu.horizontal-menu .menu > .menu-item a , 
						.site-header .primary-menu.horizontal-menu .menu .sub-menu .menu-item a',
					],
				],		
			)
		);
		
		/*====== Header Type2 Background Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'cosmetsy_header_type2_bg',
				'label' => esc_attr__( 'Header Background', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color background color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type2_section',
			)
		);
		
		/*====== Header Type2 Border Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#e5e5e5',
				'settings' => 'cosmetsy_header_type2_border_color',
				'label' => esc_attr__( 'Header Border Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color border color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type2_section',
			)
		);
		
		/*====== Header Type2 Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_header_type2_color',
				'label' => esc_attr__( 'Header Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type2_section',
			)
		);
		
		/*====== Header Type2 Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef4626',
				'settings' => 'cosmetsy_header_type2_hvrcolor',
				'label' => esc_attr__( 'Header Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a hover color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type2_section',
			)
		);
		
		/*====== Header Type2 Icon Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_header_type2_icon_color',
				'label' => esc_attr__( 'Header Icon Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type2_section',
			)
		);

		/*====== Header Type3 Style ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'cosmetsy_header_type3_typography',
				'label'       => esc_attr__( 'Header Featured Typography', 'cosmetsy' ),
				'section'     => 'cosmetsy_header_type3_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '14px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.style-1 .site-header--nav .primary-menu.horizontal-menu .menu > .menu-item > a ,
						.style-1.site-header .primary-menu.horizontal-menu .menu > .menu-item a',
					],
				],		
			)
		);
		
		/*====== Header Type3 Background Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'cosmetsy_header_type3_bg',
				'label' => esc_attr__( 'Header Background', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a background color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type3_section',
			)
		);
		
		/*====== Header Type3 Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_header_type3_color',
				'label' => esc_attr__( 'Header Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type3_section',
			)
		);
		
		/*====== Header Type3 Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef4626',
				'settings' => 'cosmetsy_header_type3_hvrcolor',
				'label' => esc_attr__( 'Header Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a hover color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type3_section',
			)
		);
		
		/*====== Header Type3 Purchase  Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef4626',
				'settings' => 'cosmetsy_header_type3_purchase_color',
				'label' => esc_attr__( 'Header Purchase  Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type3_section',
			)
		);
		
		/*====== Header Type3 Purchase  Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef4626',
				'settings' => 'cosmetsy_header_type3_purchase_hvrcolor',
				'label' => esc_attr__( 'Header Purchase Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a hover color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type3_section',
			)
		);
		
		/*====== Header Type3 Icon Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_header_type3_icon_color',
				'label' => esc_attr__( 'Header Icon Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type3_section',
			)
		);
		
		/*====== Header Type4 Style ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'cosmetsy_header_type4_typography',
				'label'       => esc_attr__( 'Header Featured Typography', 'cosmetsy' ),
				'section'     => 'cosmetsy_header_type4_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '14px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.site-header.header-transparent.style-4 .primary-menu.horizontal-menu .menu > .menu-item > a ,
						.site-header.style-4 .primary-menu.horizontal-menu .menu .sub-menu .menu-item a ,
						.site-header.style-4 .quick-button.text .quick-label',
					],
				],		
			)
		);
		
		
		/*====== Header Type4 Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'cosmetsy_header_type4_color',
				'label' => esc_attr__( 'Header Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type4_section',
			)
		);
		
		/*====== Header Type4 Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'cosmetsy_header_type4_hvrcolor',
				'label' => esc_attr__( 'Header Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a hover color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type4_section',
			)
		);
		
		/*====== Header Type4 Submenu Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_header_type4_submenu_color',
				'label' => esc_attr__( 'Header Submenu Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type4_section',
			)
		);
		
		/*====== Header Type4 Submenu Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef4626',
				'settings' => 'cosmetsy_header_type4_submenu_hvrcolor',
				'label' => esc_attr__( 'Header Submenu Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a hover color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type4_section',
			)
		);
		
		/*====== Header Type4 Icon Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'cosmetsy_header_type4_icon_color',
				'label' => esc_attr__( 'Header Icon Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_header_type4_section',
			)
		);
		
				
		/*====== Top Header Style ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'cosmetsy_top_header_typography',
				'label'       => esc_attr__( 'Top Header Featured Typography', 'cosmetsy' ),
				'section'     => 'cosmetsy_top_header_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '13px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .site-global-notification.klbtype-1 p , .site-header .site-topbar ',
					],
				],		
			)
		);
		
		/*====== Top Header Background Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '',
				'settings' => 'cosmetsy_top_header_bg',
				'label' => esc_attr__( 'Top Header Background', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a background color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_top_header_section',
			)
		);
		
		/*====== Top Header Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '',
				'settings' => 'cosmetsy_top_header_color',
				'label' => esc_attr__( 'Top Header Font Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_top_header_section',
			)
		);
		
		/*====== Top Header Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '',
				'settings' => 'cosmetsy_top_header_hvrcolor',
				'label' => esc_attr__( 'Top Header Font Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a hover color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_top_header_section',
			)
		);
		


	/*====== SHOP ====================================================================================*/
		/*====== Shop Panels ======*/
		Kirki::add_panel (
			'cosmetsy_shop_panel',
			array(
				'title' => esc_html__( 'Shop Settings', 'cosmetsy' ),
				'description' => esc_html__( 'You can customize the shop from this panel.', 'cosmetsy' ),
			)
		);

		$sections = array (
			'shop_general' => array(
				esc_attr__( 'General', 'cosmetsy' ),
				esc_attr__( 'You can customize shop settings.', 'cosmetsy' )
			),
			
			'shop_single' => array(
				esc_attr__( 'Product Detail', 'cosmetsy-core' ),
				esc_attr__( 'You can customize the product single settings.', 'cosmetsy-core' )
			),
			
			'shop_breadcrumb' => array(
				esc_attr__( 'Breadcrumb', 'cosmetsy' ),
				esc_attr__( 'You can customize breadcrumb settings.', 'cosmetsy' )
			),
			
			'my_account' => array(
				esc_attr__( 'My Account', 'cosmetsy-core' ),
				esc_attr__( 'You can customize the my account page.', 'cosmetsy-core' )
			),
			
			'mobile_menu_style' => array(
				esc_attr__( 'Mobile Bottom Menu Style ', 'cosmetsy-core' ),
				esc_attr__( 'You can customize the mobile menu.', 'cosmetsy-core' )
			),
			
			'free_shipping_bar' => array(
				esc_attr__( 'Free Shipping Bar ', 'cosmetsy-core' ),
				esc_attr__( 'You can customize the free shipping bar settings.', 'cosmetsy-core' )
			),
			
			'shop_single_style' => array(
				esc_attr__( 'Product Detail Style', 'cosmetsy-core' ),
				esc_attr__( 'You can customize the product single style settings.', 'cosmetsy-core' )
			),
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'cosmetsy_shop_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'cosmetsy_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Shop Layouts ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'cosmetsy_shop_layout',
				'label' => esc_attr__( 'Layout', 'cosmetsy' ),
				'description' => esc_attr__( 'You can choose a layout for the shop.', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => 'left-sidebar',
				'choices' => array(
					'left-sidebar' => esc_attr__( 'Left Sidebar', 'cosmetsy' ),
					'full-width' => esc_attr__( 'Full Width', 'cosmetsy' ),
					'right-sidebar' => esc_attr__( 'Right Sidebar', 'cosmetsy' ),
				),
			)
		);

		/*====== Shop Width ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'cosmetsy_shop_width',
				'label' => esc_attr__( 'Shop Page Width', 'cosmetsy' ),
				'description' => esc_attr__( 'You can choose a layout for the shop page.', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => 'boxed',
				'choices' => array(
					'boxed' => esc_attr__( 'Boxed', 'cosmetsy' ),
					'wide' => esc_attr__( 'Wide', 'cosmetsy' ),
				),
			)
		);

		cosmetsy_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'cosmetsy_paginate_type',
			'label'       => esc_html__( 'Pagination Type', 'cosmetsy' ),
			'section'     => 'cosmetsy_shop_general_section',
			'default'     => 'default',
			'priority'    => 10,
			'choices'     => array(
				'default' => esc_attr__( 'Default', 'cosmetsy' ),
				'loadmore' => esc_attr__( 'Load More', 'cosmetsy' ),
				'infinite' => esc_attr__( 'Infinite', 'cosmetsy' ),
			),
			) 
		);

		/*====== Ajax on Shop Page ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_ajax_on_shop',
				'label' => esc_attr__( 'Ajax on Shop Page', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Disable or Enable Ajax for the shop page.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Recently Viewed Products ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_recently_viewed_products',
				'label' => esc_attr__( 'Recently Viewed Products', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Disable or Enable Recently Viewed Products.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Recently Viewed Products Coulmn ======*/
		cosmetsy_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'cosmetsy_recently_viewed_products_column',
				'label'       => esc_html__( 'Recently Viewed Products Column', 'cosmetsy-core' ),
				'section'     => 'cosmetsy_shop_general_section',
				'default'     => '4',
				'priority'    => 10,
				'choices'     => array(
					'5' => esc_attr__( '5', 'cosmetsy-core' ),
					'4' => esc_attr__( '4', 'cosmetsy-core' ),
					'3' => esc_attr__( '3', 'cosmetsy-core' ),
					'2' => esc_attr__( '2', 'cosmetsy-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_recently_viewed_products',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			) 
		);
		
		/*====== Grid-List Toggle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_grid_list_view',
				'label' => esc_attr__( 'Grid List View', 'cosmetsy' ),
				'description' => esc_attr__( 'Disable or Enable grid list view on shop page.', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Atrribute Swatches ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_attribute_swatches',
				'label' => esc_attr__( 'Attribute Swatches', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Disable or Enable the attribute types (Color - Button - Images).', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Quick View Toggle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_quick_view_button',
				'label' => esc_attr__( 'Quick View Button', 'cosmetsy' ),
				'description' => esc_attr__( 'You can choose status of the quick view button.', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Wishlist Toggle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_wishlist_button',
				'label' => esc_attr__( 'Custom Wishlist Button', 'cosmetsy' ),
				'description' => esc_attr__( 'You can choose status of the wishlist button.', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Product Stock Quantity ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_stock_quantity',
				'label' => esc_attr__( 'Stock Quantity', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Show stock quantity on the label.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Ajax Notice Shop ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_shop_notice_ajax_addtocart',
				'label' => esc_attr__( 'Ajax Notice', 'cosmetsy' ),
				'description' => esc_attr__( 'You can choose status of the ajax notice feature.', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Product Badge Tab ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_product_badge_tab',
				'label' => esc_attr__( 'Product Badge Tab', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can choose status of the product badge tab.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Remove All Button ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_remove_all_button',
				'label' => esc_attr__( 'Remove All Button in cart page', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can choose status of the remove all button.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Product Min/Max Quantity ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_min_max_quantity',
				'label' => esc_attr__( 'Min/Max Quantity', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Enable the additional quantity setting fields in product detail page.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Category Description ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_category_description_after_content',
				'label' => esc_attr__( 'Category Desc After Content', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Add the category description after the products.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Catalog Mode - Disable Add to Cart ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_catalog_mode',
				'label' => esc_attr__( 'Catalog Mode', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Disable Add to Cart button on the shop page.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Min Order Amount ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_min_order_amount_toggle',
				'label' => esc_attr__( 'Min Order Amount', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Enable Min Order Amount.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Min Order Amount Value ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_min_order_amount_value',
				'label' => esc_attr__( 'Min Order Value', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Set amount to specify a minimum order value.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_min_order_amount_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_mobile_bottom_menu',
				'label' => esc_attr__( 'Mobile Bottom Menu', 'cosmetsy' ),
				'description' => esc_attr__( 'Disable or Enable the bottom menu on mobile.', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Mobile Bottom Menu Edit Toggle======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_mobile_bottom_menu_edit_toggle',
				'label' => esc_attr__( 'Mobile Bottom Menu Edit', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Edit the mobile bottom menu.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_mobile_bottom_menu',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				
			)
			
		);
		
		/*====== Mobile Menu Repeater ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'cosmetsy_mobile_bottom_menu_edit',
				'label' => esc_attr__( 'Mobile Bottom Menu Items', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_general_section',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_mobile_bottom_menu_edit_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				'fields' => array(
					'mobile_menu_type' => array(
						'type' => 'select',
						'label' => esc_attr__( 'Select Type', 'cosmetsy-core' ),
						'description' => esc_attr__( 'You can select a type', 'cosmetsy-core' ),
						'default' => 'default',
						'choices' => array(
							'default' 	=> esc_attr__( 'Default', 'cosmetsy-core' ),
							'Home'		=> esc_attr__( 'Home', 'cosmetsy-core' ),
							'Shop' 		=> esc_attr__( 'Shop', 'cosmetsy-core' ),
							'Cart' 		=> esc_attr__( 'Cart', 'cosmetsy-core' ),
							'Myaccount' => esc_attr__( 'Myaccount', 'cosmetsy-core' ),
						),
					),
				
					'mobile_menu_icon' => array(
						'type' 			=> 'text',
						'label' 		=> esc_attr__( 'Icon', 'cosmetsy-core' ),
						'description' 	=> esc_attr__( 'You can set an icon. for example; "grid"', 'cosmetsy-core' ),
					),

					'mobile_menu_url' => array(
						'type'			=> 'text',
						'label' 		=> esc_attr__( 'URL', 'cosmetsy-core' ),
						'description' 	=> esc_attr__( 'You can set url for the item.', 'cosmetsy-core' ),
					),
				),
				
			)
		);

		/*====== Product Image Size ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'cosmetsy_product_image_size',
				'label' => esc_attr__( 'Product Image Size', 'klb-shortcode' ),
				'description' => esc_attr__( 'You can set size of the product image for the shop page.', 'klb-shortcode' ),
				'section' => 'cosmetsy_shop_general_section',
				'default' => array(
					'width' => '',
					'height' => '',
				),
			)
		);
		
		/*====== Shop Gallery Type  ======*/
		cosmetsy_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'cosmetsy_single_gallery_type',
			'label'       => esc_html__( 'Gallery Type (Product Detail)', 'cosmetsy' ),
			'section'     => 'cosmetsy_shop_single_section',
			'default'     => 'default',
			'priority'    => 10,
			'choices'     => array(
				'horizontal' => esc_attr__( 'Horizontal', 'cosmetsy' ),
				'vertical' => esc_attr__( 'Vertical', 'cosmetsy' ),
			),
			) 
		);
		
		/*====== Shop Products Navigation  ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_products_navigation',
				'label' => esc_attr__( 'Products Navigation', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Image Zoom  ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_single_image_zoom',
				'label' => esc_attr__( 'Image Zoom', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can choose status of the zoom feature.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Product360 View ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_shop_single_product360',
				'label' => esc_attr__( 'Product360 View', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Ajax Add To Cart ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_shop_single_ajax_addtocart',
				'label' => esc_attr__( 'Ajax Add to Cart', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Disable or Enable ajax add to cart button.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_section',
				'default' => '0',
			)
		);
		
		/*======  Sticky Single Cart ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_single_sticky_cart',
				'label' => esc_attr__( 'Sticky Add to Cart', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Disable or Enable sticky cart button.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Single Sticky Titles ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_single_sticky_titles',
				'label' => esc_attr__( 'Sticky Titles', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Disable or Enable the sticky titles for desktop.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Mobile Sticky Single Cart ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_mobile_single_sticky_cart',
				'label' => esc_attr__( 'Mobile Sticky Add to Cart', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Disable or Enable sticky cart button on mobile.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Move Review Tab ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_shop_single_review_tab_move',
				'label' => esc_attr__( 'Move Review Tab', 'cosmetsy' ),
				'description' => esc_attr__( 'Move the review tab out of tabs', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Buy Now Single ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_shop_single_buy_now',
				'label' => esc_attr__( 'Buy Now Button', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Disable or Enable Buy Now button.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Order on WhatsApp ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_shop_single_orderonwhatsapp',
				'label' => esc_attr__( 'Order on WhatsApp', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Order on WhatsApp Number======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_shop_single_whatsapp_number',
				'label' => esc_attr__( 'WhatsApp Number', 'cosmetsy' ),
				'description' => esc_attr__( 'You can add a phone number for order on WhatsApp.', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_single_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_shop_single_orderonwhatsapp',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Cosmetsy Accordion Tabs ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_accordion_tabs',
				'label' => esc_attr__( 'Accordion Tabs', 'cosmetsy' ),
				'description' => esc_attr__( 'Disable or Enable Accordion Tabs buttons.', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Accordion in content ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_accordion_content_tabs',
				'label' => esc_attr__( 'Accordion in content', 'cosmetsy' ),
				'description' => esc_attr__( 'Disable or Enable Accordion in content buttons.', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_single_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_accordion_tabs',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Single Social Share ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_shop_social_share',
				'label' => esc_attr__( 'Social Share (Product Detail)', 'cosmetsy' ),
				'description' => esc_attr__( 'Disable or Enable social share buttons.', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Social Share ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'multicheck',
				'settings'    => 'cosmetsy_shop_single_share',
				'section'     => 'cosmetsy_shop_single_section',
				'default'     => array('title', 'facebook','twitter', 'pinterest', 'linkedin'  ),
				'priority'    => 10,
				'choices'     => [
					'title'  => esc_html__( 'Title', 	'cosmetsy-core' ),
					'facebook'  => esc_html__( 'Facebook', 	'cosmetsy-core' ),
					'twitter' 	=> esc_html__( 'Twitter', 	'cosmetsy-core' ),
					'pinterest' => esc_html__( 'Pinterest', 'cosmetsy-core' ),
					'linkedin'  => esc_html__( 'Linkedin', 	'cosmetsy-core' ),

				],
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_shop_social_share',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Related By Tags ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_related_by_tags',
				'label' => esc_attr__( 'Related Products with Tags', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Display the related products by tags.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Product Related Post Column ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'cosmetsy_shop_related_post_column',
				'label' => esc_attr__( 'Related Post Column', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can control related post column with this option.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_section',
				'default' => '5',
				'choices' => array(
					'5' => esc_attr__( '5 Columns', 'cosmetsy-core' ),
					'4' => esc_attr__( '4 Columns', 'cosmetsy-core' ),
					'3' => esc_attr__( '3 Columns', 'cosmetsy-core' ),
					'2' => esc_attr__( '2 Columns', 'cosmetsy-core' ),
				),
			)
		);
		
		/*====== Re-Order Product Detail ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'sortable',
				'settings' => 'cosmetsy_shop_single_reorder',
				'label' => esc_attr__( 'Re-order Product Summary', 'cosmetsy' ),
				'description' => esc_attr__( 'Please save the changes and refresh the page once. Live preview is not available for the option.', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_single_section',
				'default'     => [
					'woocommerce_template_single_title',
					'woocommerce_template_single_rating',
					'woocommerce_template_single_price',
					'woocommerce_template_single_excerpt',
					'woocommerce_template_single_add_to_cart',
					'woocommerce_template_single_meta',
					'cosmetsy_social_share',
				],
				'choices'     => [
					'woocommerce_template_single_title' => esc_html__( 'Title', 'cosmetsy' ),
					'woocommerce_template_single_rating' => esc_html__( 'Rating', 'cosmetsy' ),
					'woocommerce_template_single_price' => esc_html__( 'Price', 'cosmetsy' ),
					'woocommerce_template_single_excerpt' => esc_html__( 'Excerpt', 'cosmetsy' ),
					'woocommerce_template_single_add_to_cart' => esc_html__( 'Add to Cart', 'cosmetsy' ),
					'woocommerce_template_single_meta' => esc_html__( 'Meta', 'cosmetsy' ),
					'cosmetsy_social_share' => esc_html__( 'Share', 'cosmetsy' ),
					'cosmetsy_product_stock_progress_bar' => esc_html__( 'Progress Bar', 'cosmetsy-core' ),
					'cosmetsy_product_time_countdown' => esc_html__( 'Time Countdown', 'cosmetsy-core' ),
				],
			)
		);
		
		/*====== Breadcrumb Toggle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_shop_breadcrumb',
				'label' => esc_attr__( 'Breadcrumb', 'cosmetsy' ),
				'description' => esc_attr__( 'Disable or Enable breadcrumb on shop pages.', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_breadcrumb_section',
				'default' => '0',
			)
		);
		
		/*====== Breadcrumb Type ======*/
		cosmetsy_customizer_add_field(
			array (
				'type'        => 'select',
				'settings'    => 'cosmetsy_shop_breadcrumb_type',
				'label'       => esc_html__( 'Breadcrumb Type', 'cosmetsy' ),
				'section'     => 'cosmetsy_shop_breadcrumb_section',
				'default'     => 'type-1',
				'priority'    => 10,
				'choices'     => array(
					'type1' => esc_attr__( 'Type 1', 'cosmetsy' ),
					'type2' => esc_attr__( 'Type 2', 'cosmetsy' ),
				),
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_shop_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			) 
		);
		
		/*====== Breadcrumb Image ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'cosmetsy_shop_breadcrumb_bg',
				'label' => esc_attr__( 'Breadcrumb Background', 'cosmetsy' ),
				'description' => esc_attr__( 'You can upload a background image for the breadcrumb.', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_breadcrumb_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_shop_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
					array(
					  'setting'  => 'cosmetsy_shop_breadcrumb_type',
					  'operator' => '==',
					  'value'    => 'type2',
					),
				),
			)
		);
		
		/*====== Breadcrumb Text ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_shop_breadcrumb_title',
				'label' => esc_attr__( 'Breadcrumb Title', 'cosmetsy' ),
				'description' => esc_attr__( 'You can set a title for the breadcrumb..', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_breadcrumb_section',
				'default' => 'Shop',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_shop_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Breadcrumb Desc ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'cosmetsy_shop_breadcrumb_desc',
				'label' => esc_attr__( 'Breadcrumb Desc', 'cosmetsy' ),
				'description' => esc_attr__( 'You can set a description for the breadcrumb..', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_breadcrumb_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_shop_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Breadcrumb Background Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f9f3f2',
				'settings' => 'cosmetsy_shop_breadcrumb_bg_color',
				'label' => esc_attr__( 'Background Color', 'cosmetsy' ),
				'description' => esc_attr__( 'You can customize the breadcrumb background color.', 'cosmetsy' ),
				'section' => 'cosmetsy_shop_breadcrumb_section',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_shop_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
					array(
					  'setting'  => 'cosmetsy_shop_breadcrumb_type',
					  'operator' => '==',
					  'value'    => 'type1',
					),
				),
			)
		);

		/*====== Image Repeater For each category ======*/
		add_action( 'init', function() {
			cosmetsy_customizer_add_field (
				array(
					'type' => 'repeater',
					'settings' => 'cosmetsy_image_each_category',
					'label' => esc_attr__( 'Image For Categories', 'cosmetsy-core' ),
					'description' => esc_attr__( 'You can set an image for each category.', 'cosmetsy-core' ),
					'section' => 'cosmetsy_shop_breadcrumb_section',
					'fields' => array(
						
						'category_id' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Select Category', 'cosmetsy-core' ),
							'description' => esc_html__( 'Set a category', 'cosmetsy-core' ),
							'priority'    => 10,
							'choices'     => Kirki_Helper::get_terms( array('taxonomy' => 'product_cat') )
						),
						
						'category_image' =>  array(
							'type' => 'image',
							'label' => esc_attr__( 'Image', 'cosmetsy-core' ),
							'description' => esc_attr__( 'You can upload an image.', 'cosmetsy-core' ),
						),
					),
				)
			);
		} );
		
		/*====== My Account Layouts ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'cosmetsy_my_account_layout',
				'label' => esc_attr__( 'Layout', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can choose a layout for the login form.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_my_account_section',
				'default' => 'default',
				'choices' => array(
					'default' => esc_attr__( 'Default', 'cosmetsy-core' ),
					'logintab' => esc_attr__( 'Login Tab', 'cosmetsy-core' ),
				),
			)
		);

		/*====== Registration Form First Name ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'cosmetsy_registration_first_name',
				'label' => esc_attr__( 'Register - First Name', 'cosmetsy-core' ),
				'section' => 'cosmetsy_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'cosmetsy-core' ),
					'visible' => esc_attr__( 'Visible', 'cosmetsy-core' ),
				),
			)
		);
		
		/*====== Registration Form Last Name ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'cosmetsy_registration_last_name',
				'label' => esc_attr__( 'Register - Last Name', 'cosmetsy-core' ),
				'section' => 'cosmetsy_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'cosmetsy-core' ),
					'visible' => esc_attr__( 'Visible', 'cosmetsy-core' ),
				),
			)
		);
		
		/*====== Registration Form Billing Company ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'cosmetsy_registration_billing_company',
				'label' => esc_attr__( 'Register - Billing Company', 'cosmetsy-core' ),
				'section' => 'cosmetsy_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'cosmetsy-core' ),
					'visible' => esc_attr__( 'Visible', 'cosmetsy-core' ),
				),
			)
		);
		
		/*====== Registration Form Billing Phone ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'cosmetsy_registration_billing_phone',
				'label' => esc_attr__( 'Register - Billing Phone', 'cosmetsy-core' ),
				'section' => 'cosmetsy_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'cosmetsy-core' ),
					'visible' => esc_attr__( 'Visible', 'cosmetsy-core' ),
				),
			)
		);
		
		/*====== Ajax Login-Register ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_ajax_login_form',
				'label' => esc_attr__( 'Activate Ajax for Login Form', 'cosmetsy-core' ),
				'section' => 'cosmetsy_my_account_section',
				'default' => '0',
			)
		);

		/*====== Redirect URL After Login ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'url',
				'settings' => 'cosmetsy_redirect_url_after_login',
				'label' => esc_attr__( 'Redirect URL After Login', 'cosmetsy-core' ),
				'section' => 'cosmetsy_my_account_section',
				'default' => '',
			)
		);
		
		/*======  Mobile Menu Background Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'cosmetsy_mobile_menu_bg_color',
				'label' => esc_attr__( 'Mobile Menu Background Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a background color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_mobile_menu_style_section',
			)
		);
		
		/*======  Mobile Menu Border Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#edf1f4',
				'settings' => 'cosmetsy_mobile_menu_border_color',
				'label' => esc_attr__( 'Mobile Menu Border Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a border color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_mobile_menu_style_section',
			)
		);
		
		/*======  Mobile Menu Icon Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'cosmetsy_mobile_menu_icon_color',
				'label' => esc_attr__( 'Mobile Menu Icon Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_mobile_menu_style_section',
			)
		);
		
		/*======  Mobile Menu Icon Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#9b9b9b',
				'settings' => 'cosmetsy_mobile_menu_icon_hvrcolor',
				'label' => esc_attr__( 'Mobile Menu Icon Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_mobile_menu_style_section',
			)
		);
		
		
	/*====== Free Shipping Settings =======================================================*/
	
		/*====== Free Shipping ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_free_shipping',
				'label' => esc_attr__( 'Free shipping bar', 'cosmetsy-core' ),
				'section' => 'cosmetsy_free_shipping_bar_section',
				'default' => '0',
			)
		);
		
		/*====== Free Shipping Goal Amount ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shipping_progress_bar_amount',
				'label' => esc_attr__( 'Goal Amount', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Amount to reach 100% defined in your currency absolute value. For example: 300', 'cosmetsy-core' ),
				'section' => 'cosmetsy_free_shipping_bar_section',
				'default' => '100',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Location Cart Page ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shipping_progress_bar_location_card_page',
				'label' => esc_attr__( 'Cart page', 'cosmetsy-core' ),
				'section' => 'cosmetsy_free_shipping_bar_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Location Mini cart ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shipping_progress_bar_location_mini_cart',
				'label' => esc_attr__( 'Mini cart', 'cosmetsy-core' ),
				'section' => 'cosmetsy_free_shipping_bar_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Location Checkout page ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shipping_progress_bar_location_checkout',
				'label' => esc_attr__( 'Checkout page', 'cosmetsy-core' ),
				'section' => 'cosmetsy_free_shipping_bar_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Message Initial ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'shipping_progress_bar_message_initial',
				'label' => esc_attr__( 'Initial Message', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Message to show before reaching the goal. Use shortcode [remainder] to display the amount left to reach the minimum.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_free_shipping_bar_section',
				'default' => 'Add [remainder] to cart and get free shipping!',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Message Success ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'shipping_progress_bar_message_success',
				'label' => esc_attr__( 'Success message', 'cosmetsy-core' ),
				'description' => esc_attr__( 'Message to show after reaching 100%.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_free_shipping_bar_section',
				'default' => 'Your order qualifies for free shipping!',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
	/*====== Shop Single Style Settings =======================================================*/
		
		/*====== Shop Single Background Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'cosmetsy_shop_single_bg_color',
				'label' => esc_attr__( 'Shop Single Background Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Image Border Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_shop_single_image_border_color',
				'label' => esc_attr__( 'Shop Single Image Border Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Title Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_shop_single_title_color',
				'label' => esc_attr__( 'Shop Single Title Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Stock Background Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'cosmetsy_shop_single_stock_bg_color',
				'label' => esc_attr__( 'Shop Single Stock Background Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Stock Text Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#4bb633',
				'settings' => 'cosmetsy_shop_single_stock_text_color',
				'label' => esc_attr__( 'Shop Single Stock Text Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Out Of Stock Background Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'cosmetsy_shop_single_out_of_stock_bg_color',
				'label' => esc_attr__( 'Shop Single Out Of Stock Background Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Stock Text Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#4bb633',
				'settings' => 'cosmetsy_shop_single_out_of_stock_text_color',
				'label' => esc_attr__( 'Shop Single Out Of Stock Text Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Regular Price Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_shop_single_regular_price_color',
				'label' => esc_attr__( 'Shop Single Regular Price Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Sale Price Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_shop_single_sale_price_color',
				'label' => esc_attr__( 'Shop Single Sale Price Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Description Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_shop_single_desc_color',
				'label' => esc_attr__( 'Shop Single Description Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Background Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef4626',
				'settings' => 'cosmetsy_shop_single_button_bg_color',
				'label' => esc_attr__( 'Shop Single Button Background Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Background Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_shop_single_button_bg_hvrcolor',
				'label' => esc_attr__( 'Shop Single Button Background Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Text Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'cosmetsy_shop_single_button_text_color',
				'label' => esc_attr__( 'Shop Single Button Text Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Text Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'cosmetsy_shop_single_button_text_hvrcolor',
				'label' => esc_attr__( 'Shop Single Button Text Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Meta Title Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#6c757d',
				'settings' => 'cosmetsy_shop_single_meta_title_color',
				'label' => esc_attr__( 'Shop Single Meta Title Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Meta Subtitle Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_shop_single_meta_subtitle_color',
				'label' => esc_attr__( 'Shop Single Meta Subtitle Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Wishlist Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_shop_single_wishlist_color',
				'label' => esc_attr__( 'Shop Single Wishlist Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);	
		
		/*====== Shop Single Wishlist Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef4626',
				'settings' => 'cosmetsy_shop_single_wishlist_hvrcolor',
				'label' => esc_attr__( 'Shop Single Wishlist Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);	
		
		/*====== Shop Single Wishlist Border Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#dee2e6',
				'settings' => 'cosmetsy_shop_single_wishlist_border_color',
				'label' => esc_attr__( 'Shop Single Wishlist Border Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Share Title Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_shop_single_share_title_color',
				'label' => esc_attr__( 'Shop Single Share Title Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);	
		
		/*====== Shop Single Tab Module Title Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_shop_single_tab_module_title_color',
				'label' => esc_attr__( 'Shop Single Tab Module Title Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Tab Module Title Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef4626',
				'settings' => 'cosmetsy_shop_single_tab_module_title_hvrcolor',
				'label' => esc_attr__( 'Shop Single Tab Module Title Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Tab Module Border Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#e8e8e8',
				'settings' => 'cosmetsy_shop_single_tab_module_border_color',
				'label' => esc_attr__( 'Shop Single Tab Module Border Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Module Title Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_shop_single_module_title_color',
				'label' => esc_attr__( 'Shop Single Module Title Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Module Border Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#dee2e6',
				'settings' => 'cosmetsy_shop_single_module_border_color',
				'label' => esc_attr__( 'Shop Single Module Border Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_shop_single_style_section',
			)
		);
	
	/*====== Blog Settings =======================================================*/
		/*====== Layouts ======*/
		
		cosmetsy_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'cosmetsy_blog_layout',
				'label' => esc_attr__( 'Layout', 'cosmetsy' ),
				'description' => esc_attr__( 'You can choose a layout.', 'cosmetsy' ),
				'section' => 'cosmetsy_blog_settings_section',
				'default' => 'right-sidebar',
				'choices' => array(
					'left-sidebar' => esc_attr__( 'Left Sidebar', 'cosmetsy' ),
					'full-width' => esc_attr__( 'Full Width', 'cosmetsy' ),
					'right-sidebar' => esc_attr__( 'Right Sidebar', 'cosmetsy' ),
				),
			)
		);
		
		/*====== Blog Breadcrumb Toggle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_blog_breadcrumb',
				'label' => esc_attr__( 'Breadcrumb', 'cosmetsy' ),
				'description' => esc_attr__( 'Disable or Enable breadcrumb on blog pages.', 'cosmetsy' ),
				'section' => 'cosmetsy_blog_settings_section',
				'default' => '1',
			)
		);
		
		/*====== Blog Breadcrumb Text ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_blog_breadcrumb_title',
				'label' => esc_attr__( 'Breadcrumb Title', 'cosmetsy' ),
				'description' => esc_attr__( 'You can set a title for the breadcrumb..', 'cosmetsy' ),
				'section' => 'cosmetsy_blog_settings_section',
				'default' => 'Blog Posts',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_blog_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Blog Breadcrumb Desc ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'cosmetsy_blog_breadcrumb_desc',
				'label' => esc_attr__( 'Breadcrumb Description', 'cosmetsy' ),
				'description' => esc_attr__( 'You can set a description for the breadcrumb..', 'cosmetsy' ),
				'section' => 'cosmetsy_blog_settings_section',
				'default' => 'Vivamus nisi sapien, elementum sit amet eros sit amet, ultricies cursus ipsum',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_blog_breadcrumb',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Main color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef4626',
				'settings' => 'cosmetsy_main_color',
				'label' => esc_attr__( 'Main Color', 'cosmetsy' ),
				'description' => esc_attr__( 'You can customize the main color.', 'cosmetsy' ),
				'section' => 'cosmetsy_main_color_section',
			)
		);
		
		/*====== Button Active color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_button_active_color',
				'label' => esc_attr__( 'Button Active Color', 'cosmetsy' ),
				'description' => esc_attr__( 'You can customize the button active color.', 'cosmetsy' ),
				'section' => 'cosmetsy_main_color_section',
			)
		);
		
	/*====== Elementor Templates =======================================================*/
		/*====== Before Shop Elementor Templates ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'cosmetsy_before_main_shop_elementor_template',
				'label'       => esc_html__( 'Before Shop Elementor Template', 'cosmetsy-core' ),
				'section'     => 'cosmetsy_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'cosmetsy-core' ),
				'choices'     => cosmetsy_get_elementorTemplates('section'),
			)
		);
		
		/*====== After Shop Elementor Templates ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'cosmetsy_after_main_shop_elementor_template',
				'label'       => esc_html__( 'After Shop Elementor Template', 'cosmetsy-core' ),
				'section'     => 'cosmetsy_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'cosmetsy-core' ),
				'choices'     => cosmetsy_get_elementorTemplates('section'),
			)
		);
		
		/*====== Before Header Elementor Templates ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'cosmetsy_before_main_header_elementor_template',
				'label'       => esc_html__( 'Before Header Elementor Template', 'cosmetsy-core' ),
				'section'     => 'cosmetsy_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'cosmetsy-core' ),
				'choices'     => cosmetsy_get_elementorTemplates('section'),
			)
		);
	
		/*====== After Header Elementor Templates ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'cosmetsy_after_main_header_elementor_template',
				'label'       => esc_html__( 'After Header Elementor Template', 'cosmetsy-core' ),
				'section'     => 'cosmetsy_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'cosmetsy-core' ),
				'choices'     => cosmetsy_get_elementorTemplates('section'),
			)
		);
		
		/*====== Before Footer Elementor Template ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'cosmetsy_before_main_footer_elementor_template',
				'label'       => esc_html__( 'Before Footer Elementor Template', 'cosmetsy-core' ),
				'section'     => 'cosmetsy_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'cosmetsy-core' ),
				'choices'     => cosmetsy_get_elementorTemplates('section'),
			)
		);
		
		/*====== After Footer Elementor  Template ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'cosmetsy_after_main_footer_elementor_template',
				'label'       => esc_html__( 'After Footer Elementor Templates', 'cosmetsy-core' ),
				'section'     => 'cosmetsy_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'cosmetsy-core' ),
				'choices'     => cosmetsy_get_elementorTemplates('section'),
			)
		);

		/*====== Templates Repeater For each category ======*/
		add_action( 'init', function() {
			cosmetsy_customizer_add_field (
				array(
					'type' => 'repeater',
					'settings' => 'cosmetsy_elementor_template_each_shop_category',
					'label' => esc_attr__( 'Template For Categories', 'cosmetsy-core' ),
					'description' => esc_attr__( 'You can set template for each category.', 'cosmetsy-core' ),
					'section' => 'cosmetsy_elementor_templates_section',
					'fields' => array(
						
						'category_id' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Select Category', 'cosmetsy-core' ),
							'description' => esc_html__( 'Set a category', 'cosmetsy-core' ),
							'priority'    => 10,
							'default'     => '',
							'choices'     => Kirki_Helper::get_terms( array('taxonomy' => 'product_cat') )
						),
						
						'cosmetsy_before_main_shop_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Shop Elementor Template', 'cosmetsy-core' ),
							'choices'     => cosmetsy_get_elementorTemplates('section'),
							'default'     => '',
							'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'cosmetsy-core' ),
						),
						
						'cosmetsy_after_main_shop_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Shop Elementor Template', 'cosmetsy-core' ),
							'choices'     => cosmetsy_get_elementorTemplates('section'),
						),
						
						'cosmetsy_before_main_header_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Header Elementor Template', 'cosmetsy-core' ),
							'choices'     => cosmetsy_get_elementorTemplates('section'),
						),
						
						'cosmetsy_after_main_header_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Header Elementor Template', 'cosmetsy-core' ),
							'choices'     => cosmetsy_get_elementorTemplates('section'),
						),
						
						'cosmetsy_before_main_footer_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Footer Elementor Template', 'cosmetsy-core' ),
							'choices'     => cosmetsy_get_elementorTemplates('section'),
						),
						
						'cosmetsy_after_main_footer_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Footer Elementor Template', 'cosmetsy-core' ),
							'choices'     => cosmetsy_get_elementorTemplates('section'),
						),
						

					),
				)
			);
		} );

		/*====== Map Settings ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_mapapi',
				'label' => esc_attr__( 'Google Map Api key', 'cosmetsy' ),
				'description' => esc_attr__( 'Add your google map api key', 'cosmetsy' ),
				'section' => 'cosmetsy_map_settings_section',
				'default' => '',
			)
		);
		
	/*====== Cosmetsy Widgets ======*/
		/*====== Widgets Panels ======*/
		Kirki::add_panel (
			'cosmetsy_widgets_panel',
			array(
				'title' => esc_html__( 'Cosmetsy Widgets', 'cosmetsy' ),
				'description' => esc_html__( 'You can customize the cosmetsy widgets.', 'cosmetsy' ),
			)
		);

		$sections = array (
			
			'footer_about' => array(
				esc_attr__( 'Footer About', 'cosmetsy' ),
				esc_attr__( 'You can customize the footer about widget.', 'cosmetsy' )
			),
			
			'social_list' => array(
				esc_attr__( 'Social List', 'cosmetsy-core' ),
				esc_attr__( 'You can customize the social list widget.', 'cosmetsy-core' )
			),
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'cosmetsy_widgets_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'cosmetsy_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		
		/*====== Footer About Widget Logo ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'cosmetsy_footer_about_logo',
				'label' => esc_attr__( 'Logo', 'cosmetsy' ),
				'description' => esc_attr__( 'You can upload a logo.', 'cosmetsy' ),
				'section' => 'cosmetsy_footer_about_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Footer About Widget Textarea ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'cosmetsy_footer_about_text',
				'label' => esc_attr__( 'Content', 'cosmetsy' ),
				'description' => esc_attr__( 'You can set text for the about widget.', 'cosmetsy' ),
				'section' => 'cosmetsy_footer_about_section',
				'default' => '',
			)
		);

		/*====== Social List Widget ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'cosmetsy_social_list_widget',
				'label' => esc_attr__( 'Social List Widget', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set social icons.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_social_list_section',
				'fields' => array(
					'social_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'cosmetsy-core' ),
						'description' => esc_attr__( 'You can set an icon. for example; "facebook"', 'cosmetsy-core' ),
					),

					'social_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'cosmetsy-core' ),
						'description' => esc_attr__( 'You can set url for the item.', 'cosmetsy-core' ),
					),

				),
			)
		);
		
	/*====== Footer ======*/
		/*====== Footer Panels ======*/
		Kirki::add_panel (
			'cosmetsy_footer_panel',
			array(
				'title' => esc_html__( 'Footer Settings', 'cosmetsy' ),
				'description' => esc_html__( 'You can customize the footer from this panel.', 'cosmetsy' ),
			)
		);

		$sections = array (
			'top_footer' => array(
				esc_attr__( 'Top Footer', 'cosmetsy-core' ),
				esc_attr__( 'You can customize the top footer settings for FOOTER TYPE 2.', 'cosmetsy-core' )
			),
			
			'footer_subscribe' => array(
				esc_attr__( 'Subscribe', 'cosmetsy' ),
				esc_attr__( 'You can customize the subscribe area..', 'cosmetsy' )
			),
			
			'footer_general' => array(
				esc_attr__( 'Footer General', 'cosmetsy' ),
				esc_attr__( 'You can customize the footer settings.', 'cosmetsy-core' )
			),
			
			'footer_style' => array(
				esc_attr__( 'Footer Style', 'cosmetsy' ),
				esc_attr__( 'You can customize the footer style settings.', 'cosmetsy-core' )
			),
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'cosmetsy_footer_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'cosmetsy_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Top Footer Title ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_top_footer_title',
				'label' => esc_attr__( 'Text', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can add a title', 'cosmetsy-core' ),
				'section' => 'cosmetsy_top_footer_section',
				'default' => 'Follow Us on Instagram',
			)
		);
		
		/*====== Top Footer Subtitle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_top_footer_subtitle',
				'label' => esc_attr__( 'Text', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can add a subtitle.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_top_footer_section',
				'default' => '#cosmetsy',
			)
		);
		
		/*====== Top Footer Shortcode Text ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'cosmetsy_top_footer_text',
				'label' => esc_attr__( 'Text', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can add the instagram shortcode. for example: [instagram-feed]', 'cosmetsy-core' ),
				'section' => 'cosmetsy_top_footer_section',
				'default' => 'instagram-feed',
			)
		);

		
		/*====== Top Footer  Title Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_top_footer_title_color',
				'label' => esc_attr__( 'Top Footer Title Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_top_footer_section',
			)
		);
		
		/*====== Top Footer Title Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_top_footer_title_hvrcolor',
				'label' => esc_attr__( 'Top Footer Title Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_top_footer_section',
			)
		);
		
		/*====== Top Footer  Subtitle Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef4626',
				'settings' => 'cosmetsy_top_footer_subtitle_color',
				'label' => esc_attr__( 'Top Footer Subtitle Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_top_footer_section',
			)
		);
		
		/*====== Top Footer Subtitle Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef4626',
				'settings' => 'cosmetsy_top_footer_subtitle_hvrcolor',
				'label' => esc_attr__( 'Top Footer Subtitle Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_top_footer_section',
			)
		);
		
		/*====== Subcribe Toggle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_footer_subscribe_area',
				'label' => esc_attr__( 'Subcribe', 'cosmetsy' ),
				'description' => esc_attr__( 'Disable or Enable subscribe section for footer TYPE 2.', 'cosmetsy' ),
				'section' => 'cosmetsy_footer_subscribe_section',
				'default' => '0',
			)
		);
		
		/*====== Subscribe Title ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_footer_subscribe_title',
				'label' => esc_attr__( 'Title', 'cosmetsy' ),
				'description' => esc_attr__( 'You can set text for subscribe section.', 'cosmetsy' ),
				'section' => 'cosmetsy_footer_subscribe_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Subtitle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'cosmetsy_footer_subscribe_subtitle',
				'label' => esc_attr__( 'Title', 'cosmetsy' ),
				'description' => esc_attr__( 'You can set text for subscribe section.', 'cosmetsy' ),
				'section' => 'cosmetsy_footer_subscribe_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subcribe FORM ID======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_footer_subscribe_formid',
				'label' => esc_attr__( 'Subscribe Form Id.', 'cosmetsy' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'cosmetsy' ),
				'section' => 'cosmetsy_footer_subscribe_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe  Background Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff5f2',
				'settings' => 'cosmetsy_subscribe_bg_color',
				'label' => esc_attr__( 'Subscribe Background Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a background.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe  Title Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef4626',
				'settings' => 'cosmetsy_subscribe_title_color',
				'label' => esc_attr__( 'Subscribe Title Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe Title Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef4626',
				'settings' => 'cosmetsy_subscribe_title_hvrcolor',
				'label' => esc_attr__( 'Subscribe Title Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe  Subtitle Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_subscribe_subtitle_color',
				'label' => esc_attr__( 'Subscribe Subtitle Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe Subtitle Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_subscribe_subtitle_hvrcolor',
				'label' => esc_attr__( 'Subscribe Subtitle Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe Title Style ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'cosmetsy_Subscribe_title_typography',
				'label'       => esc_attr__( 'Subscribe Title Featured Typography', 'cosmetsy' ),
				'section'     => 'cosmetsy_footer_subscribe_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '11px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.site-footer .footer-newsletter.klbtype-1 .site-footer--wrapper .entry-subtitle.klbtype-1',
					],
				],
			)
		);
		
		/*====== Footer Subscribe Subtitle Style ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'cosmetsy_Subscribe_subtitle_typography',
				'label'       => esc_attr__( 'Subscribe Subtitle Featured Typography', 'cosmetsy' ),
				'section'     => 'cosmetsy_footer_subscribe_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '28px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.site-footer .footer-newsletter.klbtype-1 .site-footer--wrapper .entry-title.klbtype-1',
					],
				],		
			)
		);
		
		cosmetsy_customizer_add_field(
			array (
			'type'        => 'select',
			'settings'    => 'cosmetsy_footer_type',
			'label'       => esc_html__( 'Footer Type', 'cosmetsy' ),
			'section'     => 'cosmetsy_footer_general_section',
			'default'     => 'type-1',
			'priority'    => 10,
			'choices'     => array(
				'type1' => esc_attr__( 'Type 1', 'cosmetsy' ),
				'type2' => esc_attr__( 'Type 2', 'cosmetsy' ),
			),
			) 
		);
		
		/*====== Copyright ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'cosmetsy_copyright',
				'label' => esc_attr__( 'Copyright', 'cosmetsy' ),
				'description' => esc_attr__( 'You can set a copyright text for the footer.', 'cosmetsy' ),
				'section' => 'cosmetsy_footer_general_section',
				'default' => '',
			)
		);
		
		/*====== Social Icons ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'repeater',
				'settings' => 'cosmetsy_footer_social',
				'label' => esc_attr__( 'Social List', 'cosmetsy' ),
				'description' => esc_attr__( 'You can create social icon list.', 'cosmetsy' ),
				'section' => 'cosmetsy_footer_general_section',
				'fields' => array(
					'social_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Url', 'cosmetsy' ),
						'description' => esc_attr__( 'Set an url for the icon.', 'cosmetsy' ),
					),
					
					'social_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'cosmetsy' ),
						'description' => esc_attr__( 'Set an icon.', 'cosmetsy' ),
					),
				),
			)
		);

		/*====== Footer Column ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'cosmetsy_footer_column',
				'label' => esc_attr__( 'Footer Column', 'cosmetsy' ),
				'description' => esc_attr__( 'You can set footer column.', 'cosmetsy' ),
				'section' => 'cosmetsy_footer_general_section',
				'default' => '4columns',
				'choices' => array(
					'3columns' => esc_attr__( '3 Columns', 'cosmetsy' ),
					'4columns' => esc_attr__( '4 Columns', 'cosmetsy' ),
					'5columns' => esc_attr__( '5 Columns', 'cosmetsy' ),
				),
			)
		);
		
		/*====== Back to top  ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_scroll_to_top',
				'label' => esc_attr__( 'Back To Top', 'cosmetsy' ),
				'section' => 'cosmetsy_footer_general_section',
				'default' => '0',
			)
		);
		
		/*====== Footer Background Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'cosmetsy_footer_bg_color',
				'label' => esc_attr__( 'Footer Background Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a background.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_footer_style_section',
			)
		);
		
		/*====== Footer Header Style ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'cosmetsy_footer_header_size',
				'label'       => esc_attr__( 'Footer Header Featured Typography', 'cosmetsy' ),
				'section'     => 'cosmetsy_footer_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '12px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
					
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.site-footer .footer-widgets .site-footer--wrapper .widget .widget-title',
					],
				],
			)
		);
		
		/*====== Footer Header Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_footer_header_color',
				'label' => esc_attr__( 'Footer Header Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_footer_style_section',
			)
		);
		
		/*====== Footer Header Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_footer_header_hvrcolor',
				'label' => esc_attr__( 'Footer Header Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_footer_style_section',
			)
		);
		
		/*====== Footer Style ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'cosmetsy_footer_size',
				'label'       => esc_attr__( 'Footer Featured Typography', 'cosmetsy' ),
				'section'     => 'cosmetsy_footer_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '14px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
					
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.site-footer .footer-widgets .site-footer--wrapper a , 
						.site-footer .footer-widgets .site-footer--wrapper .widget.widget_text .textwidget p',
					],
				],
			)
		);
		
		/*====== Footer Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_footer_color',
				'label' => esc_attr__( 'Footer Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_footer_style_section',
			)
		);
		
		/*====== Footer Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_footer_hvrcolor',
				'label' => esc_attr__( 'Footer Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_footer_style_section',
			)
		);
		
		/*====== Footer Copyright Style ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'cosmetsy_footer_cpy_typography',
				'label'       => esc_attr__( 'Footer Copyright Featured Typography', 'cosmetsy' ),
				'section'     => 'cosmetsy_footer_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '14px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.site-footer--wrapper .site-copyright p',
					],
				],		
			)
		);
		
		/*====== Footer Copyright Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#111',
				'settings' => 'cosmetsy_footer_cpy_color',
				'label' => esc_attr__( 'Footer Copyright Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_footer_style_section',
			)
		);
		
		/*====== Footer Copyright Hover Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#111',
				'settings' => 'cosmetsy_footer_cpy_hvrcolor',
				'label' => esc_attr__( 'Footer Copyright Hover Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a hover color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_footer_style_section',
			)
		);
		
		/*====== Footer Social List Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'cosmetsy_footer_social_list_color',
				'label' => esc_attr__( 'Footer Social List Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a social list color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_footer_style_section',
			)
		);
		
		/*====== Newsletter Toggle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_newsletter_popup_toggle',
				'label' => esc_attr__( 'Enable Newsletter', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can choose status of Newsletter Popup.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_newsletter_settings_section',
				'default' => '0',
			)
		);
		
		/*====== Newsletter Type ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'cosmetsy_newsletter_type',
				'label' => esc_attr__( 'Newsletter Type', 'cosmetsy-core' ),
				'section' => 'cosmetsy_newsletter_settings_section',
				'default' => 'type1',
				'choices' => array(
					'type1' => esc_attr__( 'Type 1', 'cosmetsy-core' ),
					'type2' => esc_attr__( 'Type 2', 'cosmetsy-core' ),
					'type3' => esc_attr__( 'Type 3', 'cosmetsy-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Newsletter Image ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'cosmetsy_newsletter_image',
				'label' => esc_attr__( 'Image', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_newsletter_settings_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'input_attrs' => array( 'class' => 'my_custom_class' ),

				'active_callback' => [
					[
					  'setting'  => 'cosmetsy_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					],
					[
					  'setting'  => 'cosmetsy_newsletter_type',
					  'operator' => '!=',
					  'value'    => 'type1',
					]
				],

			)
		);
		
		
		/*====== Newsletter Title ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_newsletter_popup_title',
				'label' => esc_attr__( 'Newsletter Title', 'cosmetsy-core' ),
				'section' => 'cosmetsy_newsletter_settings_section',
				'default' => 'Subscribe To Newsletter',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Newsletter Subtitle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'cosmetsy_newsletter_popup_subtitle',
				'label' => esc_attr__( 'Newsletter Subtitle', 'cosmetsy-core' ),
				'section' => 'cosmetsy_newsletter_settings_section',
				'default' => 'Subscribe to the Cosmetsy mailing list to receive updates on new arrivals, special offers and our promotions.',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subcribe Popup FORM ID======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_newsletter_popup_formid',
				'label' => esc_attr__( 'Newsletter Form Id.', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_newsletter_settings_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subcribe Popup Expire Date ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_newsletter_popup_expire_date',
				'label' => esc_attr__( 'Newsletter Expire Date', 'cosmetsy-core' ),
				'section' => 'cosmetsy_newsletter_settings_section',
				'default' => '15',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== GDPR Toggle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_gdpr_toggle',
				'label' => esc_attr__( 'Enable GDPR', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can choose status of GDPR.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_gdpr_settings_section',
				'default' => '0',
			)
		);
		
		/*====== GDPR Type ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'cosmetsy_gdpr_type',
				'label' => esc_attr__( 'GDPR Type', 'cosmetsy-core' ),
				'section' => 'cosmetsy_gdpr_settings_section',
				'default' => 'type1',
				'choices' => array(
					'type1' => esc_attr__( 'Type 1', 'cosmetsy-core' ),
					'type2' => esc_attr__( 'Type 2', 'cosmetsy-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== GDPR Image======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'cosmetsy_gdpr_image',
				'label' => esc_attr__( 'Image', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_gdpr_settings_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'active_callback' => [
					[
					  'setting'  => 'cosmetsy_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					],
					[
					  'setting'  => 'cosmetsy_gdpr_type',
					  'operator' => '!=',
					  'value'    => 'type2',
					]
				],
			)
		);
		
		/*====== GDPR Text ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'cosmetsy_gdpr_text',
				'label' => esc_attr__( 'GDPR Text', 'cosmetsy-core' ),
				'section' => 'cosmetsy_gdpr_settings_section',
				'default' => 'In order to provide you a personalized shopping experience, our site uses cookies. <br><a href="#">cookie policy</a>.',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== GDPR Expire Date ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_gdpr_expire_date',
				'label' => esc_attr__( 'GDPR Expire Date', 'cosmetsy-core' ),
				'section' => 'cosmetsy_gdpr_settings_section',
				'default' => '15',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== GDPR Button Text ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_gdpr_button_text',
				'label' => esc_attr__( 'GDPR Button Text', 'cosmetsy-core' ),
				'section' => 'cosmetsy_gdpr_settings_section',
				'default' => 'Accept Cookies',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Maintenance Toggle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'cosmetsy_maintenance_toggle',
				'label' => esc_attr__( 'Enable Maintenance Mode', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can choose status of Maintenance.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_maintenance_settings_section',
				'default' => '0',
			)
		);
		
		/*====== Maintenance Title ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_maintenance_title',
				'label' => esc_attr__( 'Title', 'cosmetsy-core' ),
				'section' => 'cosmetsy_maintenance_settings_section',
				'default' => 'Coming',
				'active_callback' => [
					[
					  'setting'  => 'cosmetsy_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);

		/*====== Maintenance Second Title ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_maintenance_second_title',
				'label' => esc_attr__( 'Second Title', 'cosmetsy-core' ),
				'section' => 'cosmetsy_maintenance_settings_section',
				'default' => 'Soon',
				'active_callback' => [
					[
					  'setting'  => 'cosmetsy_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Subtitle ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'cosmetsy_maintenance_subtitle',
				'label' => esc_attr__( 'Subtitle', 'cosmetsy-core' ),
				'section' => 'cosmetsy_maintenance_settings_section',
				'default' => 'Get ready! Something really cool is coming!',
				'active_callback' => [
					[
					  'setting'  => 'cosmetsy_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Mailchimp FORM ID======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'cosmetsy_maintenance_mailchimp_formid',
				'label' => esc_attr__( 'Mailchimp Form Id.', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_maintenance_settings_section',
				'default' => '',
				'active_callback' => [
					[
					  'setting'  => 'cosmetsy_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Image ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'cosmetsy_maintenance_image',
				'label' => esc_attr__( 'Background Image', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_maintenance_settings_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'input_attrs' => array( 'class' => 'my_custom_class' ),
				'active_callback' => [
					[
					  'setting'  => 'cosmetsy_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Title Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#a0463a',
				'settings' => 'cosmetsy_maintenance_title_color',
				'label' => esc_attr__( 'Maintenance Title Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_maintenance_settings_section',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Maintenance Second Title Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f28c2f',
				'settings' => 'cosmetsy_maintenance_second_title_color',
				'label' => esc_attr__( 'Maintenance Second Title Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_maintenance_settings_section',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Maintenance Subtitle Color ======*/
		cosmetsy_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#8b8396',
				'settings' => 'cosmetsy_maintenance_subtitle_color',
				'label' => esc_attr__( 'Maintenance Subtitle Color', 'cosmetsy-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'cosmetsy-core' ),
				'section' => 'cosmetsy_maintenance_settings_section',
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Maintenance Title Typography ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'cosmetsy_maintenance_title_size',
				'label'       => esc_attr__( 'Maintenance Title Typography', 'cosmetsy-core' ),
				'section'     => 'cosmetsy_maintenance_settings_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '76px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.maintenance-mode-wrapper h2.entry-title ',
					],
				],
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Maintenance Second Title Typography ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'cosmetsy_maintenance_second_title_size',
				'label'       => esc_attr__( 'Maintenance Second Title Typography', 'cosmetsy-core' ),
				'section'     => 'cosmetsy_maintenance_settings_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '109px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.maintenance-mode-wrapper h1.entry-sub',
					],
				],
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Maintenance Subtitle Typography ======*/
		cosmetsy_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'cosmetsy_maintenance_subtitle_size',
				'label'       => esc_attr__( 'Maintenance Subtitle Typography', 'cosmetsy-core' ),
				'section'     => 'cosmetsy_maintenance_settings_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '25px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => 'body#error-page .maintenance-content .entry-description ',
					],
				],
				'required' => array(
					array(
					  'setting'  => 'cosmetsy_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
