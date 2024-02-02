<?php

function cosmetsy_add_elementor_page_settings_controls( $page ) {

	$page->add_control( 'cosmetsy_elementor_hide_page_header',
		[
			'label'          => esc_html__( 'Hide Header', 'cosmetsy' ),
            'type'           => \Elementor\Controls_Manager::SWITCHER,
			'label_on'       => esc_html__( 'Yes', 'cosmetsy' ),
			'label_off'      => esc_html__( 'No', 'cosmetsy' ),
			'return_value'   => 'yes',
			'default'        => 'no',
		]
	);
	
	$page->add_control( 'cosmetsy_elementor_page_header_type',
		[
			'label' => esc_html__( 'Header Type', 'cosmetsy' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => '',
			'options' => [
				'' => esc_html__( 'Select a type', 'cosmetsy' ),
				'type1' 	  => esc_html__( 'Type 1', 'cosmetsy' ),
				'type2'		  => esc_html__( 'Type 2', 'cosmetsy' ),
				'type3'		  => esc_html__( 'Type 3', 'cosmetsy' ),
				'type4'		  => esc_html__( 'Type 4', 'cosmetsy' ),
			],
		]
	);
	
	$page->add_control( 'cosmetsy_elementor_page_header_style',
		[
			'label' => esc_html__( 'Header Style', 'cosmetsy' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => '',
			'options' => [
				'' => esc_html__( 'Select a style', 'cosmetsy' ),
				'default' 	    => esc_html__( 'Default', 'cosmetsy' ),
				'transparent'	=> esc_html__( 'Transparent', 'cosmetsy' ),
			],
		]
	);
	
	$page->add_control( 'cosmetsy_elementor_page_top_header_bg',
		[
			'label' => esc_html__( 'Top Header BG', 'cosmetsy' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'scheme' => [
				'type' => \Elementor\Core\Schemes\Color::get_type(),
				'value' => \Elementor\Core\Schemes\Color::COLOR_1,
			],
			'default' => '#000',
			'selectors' => [
				'{{WRAPPER}} .site-header .site-topbar' => 'background-color: {{value}};',
				'{{WRAPPER}} .site-global-notification' => 'background-color: {{value}};',
			],
		]
	);
	
	$page->add_control( 'cosmetsy_elementor_page_top_header_color',
		[
			'label' => esc_html__( 'Top Header Color', 'cosmetsy' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'scheme' => [
				'type' => \Elementor\Core\Schemes\Color::get_type(),
				'value' => \Elementor\Core\Schemes\Color::COLOR_1,
			],
			'default' => '#fff',
			'selectors' => [
				'{{WRAPPER}} .site-header .site-topbar .site-menu .menu .menu-item a' => 'color: {{value}};',
				'{{WRAPPER}} .site-global-notification' => 'color: {{value}};',
			],
		]
	);

	$page->add_control( 'cosmetsy_elementor_hide_page_footer',
		[
			'label'          => esc_html__( 'Hide Footer', 'cosmetsy-core' ),
			'type'           => \Elementor\Controls_Manager::SWITCHER,
			'label_on'       => esc_html__( 'Yes', 'cosmetsy' ),
			'label_off'      => esc_html__( 'No', 'cosmetsy' ),
			'return_value'   => 'yes',
			'default'        => 'no',
		]
	);
	
	$page->add_control( 'cosmetsy_elementor_page_footer_type',
		[
			'label' => esc_html__( 'Footer Type', 'cosmetsy' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => '',
			'options' => [
				'' => esc_html__( 'Select a type', 'cosmetsy' ),
				'type1' 	  => esc_html__( 'Type 1', 'cosmetsy' ),
				'type2'		  => esc_html__( 'Type 2', 'cosmetsy' ),
			],
		]
	);
	
	$page->add_control( 'cosmetsy_elementor_page_footer_bg',
		[
			'label' => esc_html__( 'Footer BG', 'cosmetsy' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'scheme' => [
				'type' => \Elementor\Core\Schemes\Color::get_type(),
				'value' => \Elementor\Core\Schemes\Color::COLOR_1,
			],
			'default' => '#fff',
			'selectors' => [
				'{{WRAPPER}} .site-footer .footer-widgets' => 'background-color: {{value}};',
				'{{WRAPPER}} .site-footer .subfooter' => 'background-color: {{value}};',
			],
		]
	);

	
	$page->add_control( 'cosmetsy_elementor_footer_instagram',
		[
			'label'          => esc_html__( 'Footer Instagram', 'cosmetsy-core' ),
			'type'           => \Elementor\Controls_Manager::SWITCHER,
			'label_on'       => esc_html__( 'Yes', 'cosmetsy' ),
			'label_off'      => esc_html__( 'No', 'cosmetsy' ),
			'return_value'   => 'yes',
			'default'        => 'no',
			'condition' => ['cosmetsy_elementor_page_footer_type' => array('select-type','type1')]
		]
	);

	
	$page->add_control(
		'page_width',
		[
			'label' => __( 'Width', 'cosmetsy-core' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'devices' => [ 'desktop' ],
			'size_units' => [ 'px'],
			'range' => [
				'px' => [
					'min' => 1100,
					'max' => 1650,
					'step' => 5,
				],
			],
			'default' => [
				'unit' => 'px',
				'size' => 1200,
			],
			'selectors' => [
				'{{WRAPPER}} .container' => 'max-width: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .elementor-section.elementor-section-boxed>.elementor-container' => 'max-width: {{SIZE}}{{UNIT}};',
			],
			

			
		]
	);

	$page->add_control( 'cosmetsy_elementor_logo',
		[
			'label'          => esc_html__( 'Set Logo', 'cosmetsy' ),
            'type' 			 => \Elementor\Controls_Manager::MEDIA,
		]
	);

}

add_action( 'elementor/element/wp-page/document_settings/before_section_end', 'cosmetsy_add_elementor_page_settings_controls' );