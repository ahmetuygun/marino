<?php

namespace Elementor;

class Cosmetsy_Image_Text_4_Widget extends Widget_Base {

    public function get_name() {
        return 'cosmetsy-image-text-4';
    }
    public function get_title() {
        return 'Image Text 4 (K)';
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

		$defaultimage = plugins_url( 'images/image-text5.jpg', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'cosmetsy' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
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
		
        $this->add_control( 'second_review_desc',
            [
                'label' => esc_html__( 'Second Review Desc', 'cosmetsy' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'In love with the violet glow, love the fact it works its magic overnight.',
                'description'=> 'Add a description.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'second_reviewer_name',
            [
                'label' => esc_html__( 'Second Reviewer Name', 'cosmetsy' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Daisy',
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
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} .module-block img',
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
                    '{{WRAPPER}}   .module-block img' => 'height: {{SIZE}}{{UNIT}}',
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
                    '{{WRAPPER}}  .module-block img' => 'width: {{SIZE}}{{UNIT}}',
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
                    '{{WRAPPER}}   .module-block img' => 'margin-left: {{SIZE}}{{UNIT}}',
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
                    '{{WRAPPER}}  .module-block img' => 'margin-top: {{SIZE}}{{UNIT}}',
                ]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}}  .module-block img ',
				
			]
		);
		
		$this->add_responsive_control( 'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'cosmetsy' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .module-block img ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;'],
            ]
        );
		
        $this->end_controls_section();
     	
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('text_styling',
            [
                'label' => esc_html__( ' Text', 'cosmetsy' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'image_text_alignment',
            [
                'label' => esc_html__( 'Alignment', 'cosmetsy' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .module-block  ' => 'text-align: {{VALUE}};'],
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
               'selectors' => ['{{WRAPPER}} .module-block .entry-subtitle' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .module-block .entry-subtitle:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .module-block .entry-subtitle' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .module-block .entry-subtitle',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .module-block .entry-subtitle',
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
               'selectors' => ['{{WRAPPER}} .module-block p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .module-block p:hover' => 'color: {{VALUE}};'],
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
                'selectors' => ['{{WRAPPER}} .module-block p' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .module-block p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .module-block p',
            ]
        );
		
		$this->start_controls_tabs('review_tabs');
        $this->start_controls_tab( 'review_desc_tab',
            [ 'label' => esc_html__( 'Review Desc', 'cosmetsy' ) ]
        );
		
		
		$this->add_control( 'review_desc_color',
           [
               'label' => esc_html__( 'Review Description Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klb-imagetext4-comment p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'review_desc_hvrcolor',
           [
               'label' => esc_html__( 'Review Description Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klb-imagetext4-comment p:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'review_name_color',
           [
               'label' => esc_html__( 'Review Name Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klb-imagetext4-comment .entry-name' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'review_name_hvrcolor',
           [
               'label' => esc_html__( 'Review Name Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klb-imagetext4-comment .entry-name:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'review_desc_text_shadow',
				'selector' => '{{WRAPPER}} .klb-imagetext4-comment p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'review_desc_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .klb-imagetext4-comment p , .klb-imagetext4-comment .entry-name',
            ]
        );
		
		$this->end_controls_tab(); //review_desc_tab
        $this->start_controls_tab('second_review_tab',
            [ 'label' => esc_html__( 'Second Review Desc', 'cosmetsy' ) ]
        );

		
		$this->add_control( 'second_review_desc_color',
           [
               'label' => esc_html__( 'Review Description Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klb-imagetext4-secondcomment p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'second_review_desc_hvrcolor',
           [
               'label' => esc_html__( 'Review Description Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klb-imagetext4-secondcomment p:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'second_review_name_color',
           [
               'label' => esc_html__( 'Review Name Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klb-imagetext4-secondcomment .entry-name' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'second_review_name_hvrcolor',
           [
               'label' => esc_html__( 'Review Name Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klb-imagetext4-secondcomment .entry-name:hover' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'second_review_desc_text_shadow',
				'selector' => '{{WRAPPER}} .klb-imagetext4-secondcomment p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'second_review_desc_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .klb-imagetext4-secondcomment p , {{WRAPPER}} .klb-imagetext4-secondcomment .entry-name',
            ]
        );
		
		$this->end_controls_tab(); //second_review_tab
		
        $this->end_controls_tabs(); //review_tabs
		
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
		
        $this->end_controls_tabs(); //btn_tabs
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
			
		echo '<div class="module image-text style-5 mt-30 d-mt-80">';
		echo '<div class="container">';
		echo '<div class="row align-items-center">';
		echo '<div class="col col-12 col-lg-4">';
		echo '<div class="module-block text">';
		echo '<h6 class="entry-subtitle klb-type-1 f-size-11 d-mb-24">'.esc_html($settings['subtitle']).'</h6>';
		echo '<h2 class="entry-title f-size-26 df-size-56 d-mb-45">'.esc_html($settings['title']).'</h2>';
		echo '<p class="f-size-15 d-mb-70">'.esc_html($settings['desc']).'</p>';
		echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="button light medium wide">'.esc_html($settings['btn_title']).'</a>';
		echo '</div>';
		echo '</div>';
		echo '<div class="col col-12 col-lg-6">';
		echo '<div class="module-block image mt-30 d-mt-0 mb-30 d-mb-0">';
		echo '<img src="'.esc_url($settings['image']['url']).'" alt="image-text">';
		echo '</div>';
		echo '</div>';
		echo '<div class="col col-12 col-lg-2">';

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
		echo '<div class="klb-imagetext4-comment comment-box--body">';
		echo '<p>'.esc_html($settings['review_desc']).'</p>';
		echo '<h4 class="entry-name">'.esc_html($settings['reviewer_name']).'</h4>';
		echo '</div>';
		echo '</div>';

		echo '<div class="comment-box mt-20 d-mt-100">';
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
		echo '<div class="klb-imagetext4-secondcomment comment-box--body">';
		echo '<p>'.esc_html($settings['second_review_desc']).'</p>';
		echo '<h4 class="entry-name">'.esc_html($settings['second_reviewer_name']).'</h4>';
		echo '</div>';
		echo '</div>';

		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}

}
