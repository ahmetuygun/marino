<?php

namespace Elementor;

class Cosmetsy_Image_Text_2_Widget extends Widget_Base {

    public function get_name() {
        return 'cosmetsy-image-text-2';
    }
    public function get_title() {
        return 'Image Text 2 (K)';
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

		$defaultimage = plugins_url( 'images/image-text2.jpg', __DIR__ );
		$defaultimage2 = plugins_url( 'images/second-image.jpg', __DIR__ );
		
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
                'default' => 'No science experiments. Just great skincare. Touch your beauty',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'cosmetsy' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'A simplified ritual of powerful antioxidants and naturally restorative elements, for a modern and healthy approach to skin. Advanced, transformative organic formulations that revitalize and regenerate below the surface for immediate results.',
                'description'=> 'Add a description.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'cosmetsy-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'cosmetsy-core' )
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'cosmetsy-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'cosmetsy-core' )
            ]
        );
		
        $this->add_control( 'review_desc',
            [
                'label' => esc_html__( 'Review Desc', 'cosmetsy' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'In love with the violet glow, love the fact it works its magic overnight.',
                'description'=> 'Add a description.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'reviewer_name',
            [
                'label' => esc_html__( 'Reviewer Name', 'cosmetsy' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Alice',
                'description'=> 'Add the name of the reviewer.',
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
				'selector' => '{{WRAPPER}} .spacing img',
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
                    '{{WRAPPER}}   .spacing img' => 'height: {{SIZE}}{{UNIT}}',
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
                    '{{WRAPPER}}  .spacing img' => 'width: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_responsive_control( 'image_text_right',
            [
                'label' => esc_html__( 'Right', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}   .spacing img' => 'margin-left: {{SIZE}}{{UNIT}}',
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
                        'min' => -500,
                        'max' => 500
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .spacing img' => 'margin-top: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}}  .spacing img',
				
			]
		);
		
		$this->add_responsive_control( 'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'cosmetsy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .spacing img ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;'],
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
				'selector' => '{{WRAPPER}} .extra-left img',
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
                    '{{WRAPPER}}  .extra-left img' => 'height: {{SIZE}}{{UNIT}}',
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
                    '{{WRAPPER}}  .extra-left img' => 'width: {{SIZE}}{{UNIT}}',
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
                    '{{WRAPPER}}   .extra-left img' => 'margin-left: {{SIZE}}{{UNIT}}',
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
                        'min' => -500,
                        'max' => 500
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .extra-left img' => 'margin-top: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_second_border',
				'selector' => '{{WRAPPER}}  .extra-left img',
				
			]
		);
		
		$this->add_responsive_control( 'second_image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'cosmetsy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .extra-left img ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;'],
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
               'selectors' => ['{{WRAPPER}} .module-block .entry-title' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .module-block .entry-title:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_responsive_control( 'title_top',
            [
                'label' => esc_html__( 'Top', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500
                    ],
                    'vh' => [
                        'min' => -50,
                        'max' => 50
                    ]
                ],
                'selectors' => [
                    ' {{WRAPPER}} .module-block .entry-title ' => 'margin-top: {{SIZE}}{{UNIT}}',
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
                'selectors' => ['{{WRAPPER}} .module-block .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .module-block .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => ' {{WRAPPER}} .module-block .entry-title',
				
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
               'selectors' => ['{{WRAPPER}} .module-block .klb-imagetext2-desc' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .module-block .klb-imagetext2-desc:hover' => 'color: {{VALUE}};'],
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
                        'max' => 500
                    ],
                    'vh' => [
                        'min' =>0,
                        'max' => 50
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .module-block .klb-imagetext2-desc' => 'padding-top: {{SIZE}}{{UNIT}}',
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
                'selectors' => ['{{WRAPPER}} .module-block .klb-imagetext2-desc' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .module-block .klb-imagetext2-desc',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .module-block .klb-imagetext2-desc',
            ]
        );
		
		$this->add_control( 'review_desc_heading',
            [
                'label' => esc_html__( 'REVIEW DESCRIPTION', 'cosmetsy' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_control( 'review_desc_color',
           [
               'label' => esc_html__( 'Review Description Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .comment-box--body p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'review_desc_hvrcolor',
           [
               'label' => esc_html__( 'Review Description Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .comment-box--body p:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'review_name_color',
           [
               'label' => esc_html__( 'Review Name Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .comment-box--body .entry-name' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'review_name_hvrcolor',
           [
               'label' => esc_html__( 'Review Name Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .comment-box--body .entry-name:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_responsive_control( 'review_desc_top',
            [
                'label' => esc_html__( 'Top', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500
                    ],
                    'vh' => [
                        'min' =>0,
                        'max' => 50
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .module-block.text .comment-box' => 'margin-top: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
		
		$this->add_control( 'review_desc_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'cosmetsy-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .comment-box--body p , {{WRAPPER}} .comment-box' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'review_desc_text_shadow',
				'selector' => '{{WRAPPER}} .comment-box--body p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'review_desc_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .comment-box--body p , {{WRAPPER}} .comment-box--body .entry-name',
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
                'selectors' => ['{{WRAPPER}} .module-block a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
  	    
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .module-block a '
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
                    '{{WRAPPER}}  .module-block a' => 'margin-left: {{SIZE}}{{UNIT}}',
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
                        'max' => 500
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .module-block a' => 'margin-top: {{SIZE}}{{UNIT}}',
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
                'selectors' => ['{{WRAPPER}} .module-block a' => 'opacity: {{VALUE}} ;'],
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
                'selectors' => ['{{WRAPPER}} .module-block a ' => 'color: {{VALUE}};']
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => esc_html__( 'Border', 'cosmetsy' ),
                'selector' => '{{WRAPPER}} .module-block a',
            ]
        );
        
		$this->add_responsive_control( 'btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'cosmetsy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .module-block a ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;'],
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_background',
                'label' => esc_html__( 'Background', 'cosmetsy' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .module-block a',
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
                'selectors' => ['{{WRAPPER}} .module-block a:hover ' => 'color: {{VALUE}};']
            ]
        );
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_hvr_background',
                'label' => esc_html__( 'Background', 'cosmetsy' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .module-block a:hover',
            ]
        );
		
		$this->end_controls_tab(); //btn_hover_tab
		
        $this->end_controls_tabs();	//btn_tabs
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
				
		echo '<div class="module image-text style-2 mt-40 d-mt-120">';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col col-12 col-lg-3">';
		echo '<div class="module-block text">';
		echo '<h2 class="entry-title f-size-26 df-size-56">'.esc_html($settings['title']).'</h2>';
		echo '<p class="klb-imagetext2-desc mt-20 d-mt-70 mb-20 d-mb-70 f-size-15">'.esc_html($settings['desc']).'</p>';
		echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="button light medium wide">'.esc_html($settings['btn_title']).'</a>';
		echo '</div>';
		echo '</div>';
		echo '<div class="col col-12 col-lg-7">';
		echo '<div class="module-block image spacing mt-30">';
		echo '<img src="'.esc_url($settings['image']['url']).'" alt="image-text">';
		echo '</div>';
		echo '</div>';
		echo '<div class="col col-12 col-lg-2">';
		echo '<div class="module-block image extra-left mt-30">';
		echo '<img src="'.esc_url($settings['second_image']['url']).'" alt="image-text">';
		echo '</div>';
		echo '<div class="module-block text">';
		echo '<div class="comment-box">';
		echo '<div class="comment-box--header">';
		echo '<div class="stars">';
		echo '<i class="klb-star"></i>';
		echo '<i class="klb-star"></i>';
		echo '<i class="klb-star"></i>';
		echo '<i class="klb-star"></i>';
		echo '<i class="klb-star"></i>';
		echo '</div>';
		echo '<div class="count">5/5</div>';
		echo '</div>';
		echo '<div class="comment-box--body">';
		echo '<p>'.esc_html($settings['review_desc']).'</p>';
		echo '<h4 class="entry-name">'.esc_html($settings['reviewer_name']).'</h4>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}

}
