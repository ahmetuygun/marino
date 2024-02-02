<?php

namespace Elementor;

class Cosmetsy_Image_Text_3_Widget extends Widget_Base {

    public function get_name() {
        return 'cosmetsy-image-text-3';
    }
    public function get_title() {
        return 'Image Text 3 (K)';
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
				'label' => esc_html__( 'Content', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$defaultimage = plugins_url( 'images/image-text3.jpg', __DIR__ );
		$defaultimage2 = plugins_url( 'images/image-text4.jpg', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'cosmetsy' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
        $this->add_control( 'second_image',
            [
                'label' => esc_html__( 'Second Image', 'cosmetsy' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage2],
            ]
        );
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'cosmetsy' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Always Make Room for a Little Beauty in Your Life',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'cosmetsy' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'TRENDING MAKEUP',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'cosmetsy' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Our beauty box is a set of best full-size products that are top sellers in out online shop. We want you to be able to try everything at once and make sure that our selection of products is about quality.',
                'description'=> 'Add a description.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'second_title',
            [
                'label' => esc_html__( 'Second Title', 'cosmetsy' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Always Make Room for a Little Beauty in Your Life',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'second_subtitle',
            [
                'label' => esc_html__( 'Second Subtitle', 'cosmetsy' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'TRENDING MAKEUP',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'second_desc',
            [
                'label' => esc_html__( 'Second Description', 'cosmetsy' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Our beauty box is a set of best full-size products that are top sellers in out online shop. We want you to be able to try everything at once and make sure that our selection of products is about quality.',
                'description'=> 'Add a description.',
				'label_block' => true,
            ]
        );
		
		$this->end_controls_section();
		
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
		
		$this->start_controls_section('cosmetsy_styling',
            [
                'label' => esc_html__( ' Image', 'cosmetsy' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->start_controls_tabs('image_tabs');
        $this->start_controls_tab( 'image_one_tab',
            [ 'label' => esc_html__( 'Image', 'cosmetsy' ) ]
        );
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} .first img',
			]
		);
		
		$this->add_responsive_control( 'image_text_height',
            [
                'label' => esc_html__( 'Height', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}   .first img' => 'height: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_responsive_control( 'image_text_width',
            [
                'label' => esc_html__( 'Width', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .first img' => 'width: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_responsive_control( 'image_text_left',
            [
                'label' => esc_html__( 'Left', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}   .first img' => 'margin-left: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_responsive_control( 'image_text_top',
            [
                'label' => esc_html__( 'Top', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .first img' => 'margin-top: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}}  .first img',
				
			]
		);
		
		$this->add_responsive_control( 'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'cosmetsy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .first img ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;'],
            ]
        );
		
		$this->end_controls_tab(); //image_one_tab
        $this->start_controls_tab('second_image_tab',
            [ 'label' => esc_html__( 'Second Image', 'cosmetsy' ) ]
        );
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'second_css_filters',
				'selector' => '{{WRAPPER}} .second img',
			]
		);
		
		$this->add_responsive_control( 'second_image_text_height',
            [
                'label' => esc_html__( 'Height', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}   .second img' => 'height: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_responsive_control( 'second_image_text_width',
            [
                'label' => esc_html__( 'Width', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .second img' => 'width: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_responsive_control( 'second_image_text_right',
            [
                'label' => esc_html__( 'Right', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 0
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}   .second img' => 'margin-left: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_responsive_control( 'second_image_text_top',
            [
                'label' => esc_html__( 'Top', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .second img' => 'margin-top: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_second_border',
				'selector' => '{{WRAPPER}}  .second img ',
				
			]
		);
		
		$this->add_responsive_control( 'second_image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'cosmetsy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .second img ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;'],
            ]
        );
		
		$this->end_controls_tab(); //second_image_tab
		
        $this->end_controls_tabs(); //image_tabs
		
        $this->end_controls_section();
     	
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('text_styling',
            [
                'label' => esc_html__( ' Text', 'cosmetsy' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		
		$this->start_controls_tabs('text_tabs');
        $this->start_controls_tab( 'text_one_tab',
            [ 'label' => esc_html__( 'Text', 'cosmetsy' ) ]
        );
		
		$this->add_responsive_control( 'image_text_alignment',
            [
                'label' => esc_html__( 'Alignment', 'cosmetsy' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .klb-imagetext3  ' => 'text-align: {{VALUE}};'],
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
               'selectors' => ['{{WRAPPER}} .klb-imagetext3 .entry-title' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klb-imagetext3 .entry-title:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .klb-imagetext3 .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .klb-imagetext3 .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => ' {{WRAPPER}} .klb-imagetext3 .entry-title',
				
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
               'selectors' => ['{{WRAPPER}} .klb-imagetext3 .entry-subtitle' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klb-imagetext3 .entry-subtitle:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .klb-imagetext3 .entry-subtitle' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .klb-imagetext3 .entry-subtitle',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .klb-imagetext3 .entry-subtitle',
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
               'selectors' => ['{{WRAPPER}} .klb-imagetext3 p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klb-imagetext3 p:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .klb-imagetext3 p' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .klb-imagetext3 p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .klb-imagetext3 p',
            ]
        );
		
		$this->end_controls_tab(); //text_one_tab
        $this->start_controls_tab('second_text_tab',
            [ 'label' => esc_html__( 'Second Text', 'cosmetsy' ) ]
        );
		
		$this->add_responsive_control( 'second_image_text_alignment',
            [
                'label' => esc_html__( 'Alignment', 'cosmetsy' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .klb-secondimagetext3  ' => 'text-align: {{VALUE}};'],
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
		
		$this->add_control( 'second_title_heading',
            [
                'label' => esc_html__( 'TITLE', 'cosmetsy' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'second_title_color',
           [
               'label' => esc_html__( 'Title Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klb-secondimagetext3 .entry-title' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'second_title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klb-secondimagetext3 .entry-title:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'second_title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'cosmetsy-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .klb-secondimagetext3 .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'second_title_text_shadow',
				'selector' => '{{WRAPPER}} .klb-secondimagetext3 .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'second_title_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => ' {{WRAPPER}} .klb-secondimagetext3 .entry-title',
				
            ]
        );
		
		$this->add_control( 'second_subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'cosmetsy' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'second_subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klb-secondimagetext3 .entry-subtitle' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'second_subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klb-secondimagetext3 .entry-subtitle:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'second_subtitle_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'cosmetsy-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .klb-secondimagetext3 .entry-subtitle' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'second_subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .klb-secondimagetext3 .entry-subtitle',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'second_subtitle_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .klb-secondimagetext3 .entry-subtitle',
            ]
        );
		
		$this->add_control( 'second_desc_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'cosmetsy' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'second_desc_color',
           [
               'label' => esc_html__( 'Description Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klb-secondimagetext3 p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'second_desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klb-secondimagetext3 p:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'second_desc_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'cosmetsy-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .klb-secondimagetext3 p' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'second_desc_text_shadow',
				'selector' => '{{WRAPPER}} .klb-secondimagetext3 p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'second_desc_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .klb-secondimagetext3 p',
            ]
        );
		
		$this->end_controls_tab(); //second_text_tab
		
        $this->end_controls_tabs(); //text_tabs		
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
				
		echo '<div class="module image-text style-4 mt-40 d-mt-140">';
		echo '<div class="container">';
		echo '<div class="row align-items-center">';
		echo '<div class="col col-12 col-lg-6">';
		echo '<div class="klb-imagetext3 module-block text">';
		echo '<h6 class="entry-subtitle klb-type-1 f-size-11 mb-10 d-mb-24">'.esc_html($settings['subtitle']).'</h6>';
		echo '<h2 class="entry-title f-size-26 df-size-56 mb-20 d-mb-45">'.esc_html($settings['title']).'</h2>';
		echo '<p class="f-size-15 mb-30 d-mb-70">'.cosmetsy_sanitize_data($settings['desc']).'</p>';
		echo '</div>';
		echo '<div class="module-block image first mb-30 d-mb-0">';
		echo '<img src="'.esc_url($settings['image']['url']).'" alt="image-text">';
		echo '</div>';
		echo '</div>';
		echo '<div class="col col-12 col-lg-6">';
		echo '<div class="module-block image d-mb-70 second mb-30 d-mb-0">';
		echo '<img src="'.esc_url($settings['second_image']['url']).'" alt="image-text">';
		echo '</div>';
		echo '<div class="klb-secondimagetext3 module-block text">';
		echo '<h6 class="entry-subtitle klb-type-1 f-size-11 d-mb-24">'.esc_html($settings['second_subtitle']).'</h6>';
		echo '<h2 class="entry-title f-size-26 df-size-56 d-mb-45">'.esc_html($settings['second_title']).'</h2>';
		echo '<p class="f-size-15">'.cosmetsy_sanitize_data($settings['second_desc']).'</p>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';

	}

}
