<?php

namespace Elementor;

class Cosmetsy_Home_Slider_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'cosmetsy-home-slider';
    }
    public function get_title() {
        return 'Home Slider (K)';
    }
    public function get_icon() {
        return 'eicon-slider-push';
    }
    public function get_categories() {
        return [ 'cosmetsy' ];
    }

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'cosmetsy' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control( 'slider_type',
			[
				'label' => esc_html__( 'Slider Type', 'cosmetsy' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'cosmetsy' ),
					'type1'	  => esc_html__( 'Type 1', 'cosmetsy' ),
					'type2'	  => esc_html__( 'Type 2', 'cosmetsy' ),
				],
			]
		);

		$this->add_control( 'auto_play',
			[
				'label' => esc_html__( 'Auto Play', 'cosmetsy' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'cosmetsy' ),
				'label_off' => esc_html__( 'False', 'cosmetsy' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);

        $this->add_control( 'auto_speed',
            [
                'label' => esc_html__( 'Auto Speed', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1600',
                'pleaceholder' => esc_html__( 'Set auto speed.', 'chakta' ),
				'condition' => ['auto_play' => 'true']
            ]
        );
		
		$this->add_control( 'dots',
			[
				'label' => esc_html__( 'Dots', 'cosmetsy' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'cosmetsy' ),
				'label_off' => esc_html__( 'False', 'cosmetsy' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		
		$this->add_control( 'arrows',
			[
				'label' => esc_html__( 'Arrows', 'cosmetsy' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'cosmetsy' ),
				'label_off' => esc_html__( 'False', 'cosmetsy' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$defaultbg = plugins_url( 'images/slider01.jpg', __DIR__ );
		
		$repeater = new Repeater();
        $repeater->add_control( 'slider_image',
            [
                'label' => esc_html__( 'Image', 'cosmetsy' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control( 'slider_title',
            [
                'label' => esc_html__( 'Item Title', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '25% Off For Auto Car Services',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'chakta' )
            ]
        );
		
        $repeater->add_control( 'slider_subtitle',
            [
                'label' => esc_html__( 'Item Subtitle', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'great offer for every auto & cars',
                'pleaceholder' => esc_html__( 'Enter item subtitle here.', 'chakta' )
            ]
        );
		
        $repeater->add_control( 'slider_desc',
            [
                'label' => esc_html__( 'Item Desc', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium remque laudantium totam aperiam eaque ipsa quae abillo inventore veritatis',
                'pleaceholder' => esc_html__( 'Enter item description here.', 'chakta' )
            ]
        );

        $repeater->add_control( 'slider_btn_title',
            [
                'label' => esc_html__( 'Button Title', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'chakta' )
            ]
        );
        $repeater->add_control( 'slider_btn_link',
            [
                'label' => esc_html__( 'Button Link', 'chakta' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'chakta' )
            ]
        );
		
        $this->add_control( 'slider_items',
            [
                'label' => esc_html__( 'Slide Items', 'cosmetsy' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => 'Skincare made with the world’s finest plant oils and absolutes.',
                        'slider_subtitle' => 'Skincare',
                        'slider_desc' => 'We all have skincare concerns: it\'s not always \'simple\'. Glowbar makes it easy with 30-minute expert sessions targeting your top skincare concerns.',
                        'slider_btn_title' => 'Shop Skincare',
                        'slider_btn_link' => '#',
                    ],
                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => 'Skincare made with the world’s finest plant oils and absolutes.',
                        'slider_subtitle' => 'Skincare',
                        'slider_desc' => 'We all have skincare concerns: it\'s not always \'simple\'. Glowbar makes it easy with 30-minute expert sessions targeting your top skincare concerns.',
                        'slider_btn_title' => 'Shop Skincare',
                        'slider_btn_link' => '#',
                    ],

                ]
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
		
		$this->start_controls_section('cosmetsy_styling',
            [
                'label' => esc_html__( ' Style', 'cosmetsy' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'home_slider_alignment',
            [
                'label' => esc_html__( 'Alignment', 'cosmetsy' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .slider-content , {{WRAPPER}} .module-purchase-banner a' => 'text-align: {{VALUE}};'],
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'cosmetsy' ),
                        'icon' => 'fa fa-align-left'
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'cosmetsy' ),
                        'icon' => 'fa fa-align-center'
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'cosmetsy' ),
                        'icon' => 'fa fa-align-right'
                    ]
                ],
                'toggle' => true,
                
            ]
        );
		
		$this->add_control( 'title_heading',
            [
                'label' => esc_html__( 'TITLE', 'cosmetsy' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'title_color',
           [
               'label' => esc_html__( 'Title Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .slider-content .entry-title' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .slider-content .entry-title:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_responsive_control( 'title_left',
            [
                'label' => esc_html__( 'Left', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-content .entry-title' => 'padding-left: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_responsive_control( 'title_top',
            [
                'label' => esc_html__( 'Top', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100
                    ]
                ],
                'selectors' => [
                    ' {{WRAPPER}} .slider-content .entry-title ' => 'padding-top: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_control( 'title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'cosmetsy-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .slider-content .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .slider-content .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .slider-content .entry-title',
				
            ]
        );
		
		$this->add_control( 'subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'cosmetsy' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .slider-content .entry-subtitle' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .slider-content .entry-subtitle:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_responsive_control( 'subtitle_left',
            [
                'label' => esc_html__( 'Left', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-content .entry-subtitle' => 'padding-left: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
		
		$this->add_responsive_control( 'subtitle_top',
            [
                'label' => esc_html__( 'Top', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-content .entry-subtitle' => 'padding-top: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
		
		$this->add_control( 'subtitle_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'cosmetsy-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .slider-content .entry-subtitle' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .slider-content .entry-subtitle',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .slider-content .entry-subtitle',
            ]
        );
		
		$this->add_control( 'desc_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'cosmetsy' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'desc_color',
           [
               'label' => esc_html__( 'Description Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .slider-content .entry-description' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .slider-content .entry-description:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_responsive_control( 'desc_left',
            [
                'label' => esc_html__( 'Left', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-content .entry-description' => 'padding-left: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
		
		$this->add_responsive_control( 'desc_top',
            [
                'label' => esc_html__( 'Top', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-content .entry-description' => 'padding-top: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
		
		$this->add_control( 'desc_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'cosmetsy-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .slider-content .entry-description' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .slider-content .entry-description',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .slider-content .entry-description',
            ]
        );
		
        $this->end_controls_section();
     	
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('btn_styling',
            [
                'label' => esc_html__( ' Button Style', 'cosmetsy' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'btn_padding',
            [
                'label' => esc_html__( 'Padding', 'cosmetsy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}}  .slider-content .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
  	    
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .slider-content .button '
            ]
        );
		
		$this->add_responsive_control( 'btn_left',
            [
                'label' => esc_html__( 'Left', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}}  .slider-content .button' => 'margin-left: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_responsive_control( 'btn_top',
            [
                'label' => esc_html__( 'Top', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-content .button' => 'margin-top: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_control( 'btn_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'cosmetsy-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .slider-content .button' => 'opacity: {{VALUE}} ;'],
            ]
        );

		$this->start_controls_tabs('btn_tabs');
        $this->start_controls_tab( 'btn_normal_tab',
            [ 'label' => esc_html__( 'Normal', 'cosmetsy' ) ]
        );
		
		$this->add_control( 'btn_color',
            [
                'label' => esc_html__( 'Color', 'cosmetsy' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .slider-content .button ' => 'color: {{VALUE}};']
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => esc_html__( 'Border', 'cosmetsy' ),
                'selector' => '{{WRAPPER}} .slider-content .button ',
            ]
        );
        
		$this->add_responsive_control( 'btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'cosmetsy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .slider-content .button ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_background',
                'label' => esc_html__( 'Background', 'cosmetsy' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .slider-content .button',
            ]
        );
       
		$this->end_controls_tab(); //btn_normal_tab
		
        $this->start_controls_tab('btn_hover_tab',
            [ 'label' => esc_html__( 'Hover', 'cosmetsy' ) ]
        );
       
	    $this->add_control( 'btn_hvrcolor',
            [
                'label' => esc_html__( 'Color', 'cosmetsy' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .slider-content .button:hover ' => 'color: {{VALUE}};']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_hvr_background',
                'label' => esc_html__( 'Background', 'cosmetsy' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .slider-content .button:hover',
            ]
        );
		
		
		$this->end_controls_tab(); //btn_hover_tab
		
        $this->end_controls_tabs(); //btn_tabs
		
        $this->end_controls_section();
     	
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('cosmetsy_nav_styling',
            [
                'label' => esc_html__( ' Nav Style', 'cosmetsy' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
       
	    $this->start_controls_tabs( 'slider_nav_tabs');
        $this->start_controls_tab( 'slider_nav_normal_tab',
            [ 'label'  => esc_html__( 'Normal', 'cosmetsy' ) ]
        );
        
		$this->add_control( 'nav_clr',
           [
               'label' => esc_html__( 'Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .site-slider .slick-arrow svg' => 'color: {{VALUE}};']
           ]
        );
		
		 $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'nav_background',
                'label' => esc_html__( 'Background', 'cosmetsy' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .site-slider .slick-arrow svg',
                'separator' => 'before'
            ]
        );
				
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'nav_border',
                'label' => esc_html__( 'Border', 'cosmetsy' ),
                'selector' => '{{WRAPPER}} .site-slider .slick-arrow svg ',
            ]
        );
        
		$this->add_responsive_control( 'nav_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'cosmetsy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}}  .site-slider .slick-arrow svg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
            ]
        );
		
		$this->add_control( 'nav_size',
            [
                'label' => esc_html__( ' Size', 'cosmetsy' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .site-slider .slick-arrow svg' => 'height: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_control( 'home_slider_prev_heading',
            [
                'label' => __( 'PREV POSITION', 'cosmetsy' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
       
	   $this->add_responsive_control( 'home_slider_prev_horizontal',
            [
                'label' => esc_html__( 'Horizontal Position ( % )', 'cosmetsy' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .module--slider.style-1 > .container .slider-wrapper .site-slider .slick-prev' => 'left:{{SIZE}}%;' ],
            ]
        );
       
	   $this->add_responsive_control( 'home_slider_prev_vertical',
            [
                'label' => esc_html__( 'Vertical Position ( % )', 'cosmetsy' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .site-slider .slick-prev' => 'top:{{SIZE}}%;' ],
            ]
        );
        
		$this->add_control( 'home_slider_next_heading',
            [
                'label' => __( 'NEXT POSITION', 'cosmetsy' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        
		$this->add_responsive_control( 'home_slider_next_horizontal',
            [
                'label' => esc_html__( 'Horizontal Position ( % )', 'cosmetsy' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .site-slider .slick-next' => 'left:{{SIZE}}%;' ],
            ]
        );
        
		$this->add_responsive_control( 'home_slider_next_vertical',
            [
                'label' => esc_html__( 'Vertical Position ( % )', 'cosmetsy' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .site-slider .slick-next' => 'top:{{SIZE}}%;' ],
            ]
        );
       
	    $this->end_controls_tab(); //slider_nav_normal_tab
		
        $this->start_controls_tab( 'slider_nav_hover_tab',
            [ 'label' => esc_html__( 'Hover', 'cosmetsy' ) ]
        );
       
	    $this->add_control( 'nav_hvrclr',
            [
               'label' => esc_html__( 'Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
                   '{{WRAPPER}} .site-slider .slick-arrow svg:hover' => 'color: {{VALUE}};'
               ]
            ]
        );
       
	    $this->add_control( 'nav_hvrbgclr',
            [
               'label' => esc_html__( 'Background Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
                   '{{WRAPPER}} .site-slider .slick-arrow svg:hover' => 'background-color: {{VALUE}};'
               ]
            ]
        );
		
		$this->end_controls_tab(); //slider_nav_hover_tab
		
        $this->end_controls_tabs(); //slider_nav_tabs
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( $settings['slider_items'] ) {
			if($settings['slider_type'] == 'type2'){
				$slidertype = 'style-2';
			} else {
				$slidertype = 'style-1 hero-style';
			}
			echo '<div class="module module--slider '.esc_attr($slidertype).'">';
			echo '<div class="container">';
			echo '<div class="module--inner">';
			echo '<div class="slider-wrapper">';
			echo '<svg class="preloader" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg>';
			echo '<div class="site-slider slider" data-slideshow="1" data-speed="1200" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-dots="'.esc_attr($settings['dots']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-infinite="false">';
			
			foreach ( $settings['slider_items'] as $item ) {
				$target = $item['slider_btn_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $item['slider_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
				
				echo '<div class="slider-item">';
				echo '<div class="slider-item--inner">';
				echo '<div class="slider-content">';
				echo '<h5 class="entry-subtitle klb-type-1">'.esc_html($item['slider_subtitle']).'</h5>';
				echo '<h2 class="entry-title">'.esc_html($item['slider_title']).'</h2>';
				echo '<div class="entry-description">';
				echo '<p>'.esc_html($item['slider_desc']).'</p>';
				echo '</div>';
				if($item['slider_btn_title']){
				echo '<a href="'.esc_url($item['slider_btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="button light medium">'.esc_html($item['slider_btn_title']).'</a>';
				}
				echo '</div>';
				echo '<div class="slider-image">';
				echo '<img src="'.esc_url($item['slider_image']['url']).'" alt="Cosmetsy">';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				
			}

			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	}

}

