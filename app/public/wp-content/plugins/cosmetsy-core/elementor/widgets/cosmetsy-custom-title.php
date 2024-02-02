<?php

namespace Elementor;

class Cosmetsy_Custom_Title_Widget extends Widget_Base {

    public function get_name() {
        return 'cosmetsy-custom-title';
    }
    public function get_title() {
        return 'Custom Title (K)';
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
				'label' => esc_html__( 'Content', 'cosmetsy-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control( 'title_type',
			[
				'label' => esc_html__( 'Title Type', 'cosmetsy-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'cosmetsy-core' ),
					'type1'	  => esc_html__( 'Type 1', 'cosmetsy-core' ),
					'type2'	  => esc_html__( 'Type 2', 'cosmetsy-core' ),
					'type3'	  => esc_html__( 'Type 3', 'cosmetsy-core' ),
				],
			]
		);
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'cosmetsy' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Popular Categories',
                'pleaceholder' => esc_html__( 'Set a title.', 'cosmetsy' )
            ]
        );

        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'cosmetsy' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Etiam eget faucibus turpis, sit amet viverra eros. Maecenas eget vehicula nisl. Quisque imperdiet iaculis dignissim. In hac habitasse platea dictumst.',
                'pleaceholder' => esc_html__( 'Set a subtitle.', 'cosmetsy' ),
				'condition' => ['title_type' => array('select-type','type1','type3')]
            ]
        );
		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'cosmetsy-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View All Posts',
                'pleaceholder' => esc_html__( 'Enter button title here', 'cosmetsy-core' ),
				'condition' => ['title_type' => 'type2']
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'cosmetsy-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'cosmetsy-core' ),
				'condition' => ['title_type' => 'type2']
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
               'selectors' => ['{{WRAPPER}} .custom-title .entry-title , {{WRAPPER}} .klb-custom-title h6.entry-subtitle  , {{WRAPPER}} .module--title .entry-title' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .custom-title .entry-title:hover , {{WRAPPER}} .klb-custom-title h6.entry-subtitle:hover  , {{WRAPPER}} .module--title .entry-title:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .custom-title .entry-title , {{WRAPPER}} .klb-custom-title h6.entry-subtitle  , {{WRAPPER}} .module--title .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .custom-title .entry-title , {{WRAPPER}} .klb-custom-title h6.entry-subtitle  , {{WRAPPER}} .module--title .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .custom-title .entry-title , {{WRAPPER}} .klb-custom-title h6.entry-subtitle  , {{WRAPPER}} .module--title .entry-title',
				
            ]
        );
		
		$this->add_control( 'subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'cosmetsy' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => ['title_type' => ['type1' , 'type3' , 'select-type']]
            ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .custom-title p , {{WRAPPER}} .klb-custom-title h2.entry-title' => 'color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type1' , 'type3' , 'select-type']]
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .custom-title p:hover , {{WRAPPER}} .klb-custom-title h2.entry-title:hover' => 'color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type1' , 'type3' , 'select-type']]
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
                'selectors' => ['{{WRAPPER}} .custom-title p , {{WRAPPER}} .klb-custom-title h2.entry-title' => 'opacity: {{VALUE}};'],
				'condition' => ['title_type' => ['type1' , 'type3' , 'select-type']]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .custom-title p , {{WRAPPER}} .klb-custom-title h2.entry-title',
				'condition' => ['title_type' => ['type1' , 'type3' , 'select-type']]
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .custom-title p , {{WRAPPER}} .klb-custom-title h2.entry-title',
				'condition' => ['title_type' => ['type1' , 'type3' , 'select-type']]
            ]
        );
		
        $this->end_controls_section();
     	
		/*****   END CONTROLS SECTION   ******/
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('btn_styling',
            [
                'label' => esc_html__( ' Button Style', 'cosmetsy' ),
                'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['title_type' => ['type2']]
            ]
        );

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .module--title--inner .button-text '
            ]
        );
		
		$this->add_control( 'btn_size',
            [
                'label' => esc_html__( 'Button Size', 'cosmetsy' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}}  .module--title--inner .button-text' => 'font-size: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_responsive_control( 'btn_right',
            [
                'label' => esc_html__( 'Right', 'cosmetsy' ),
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
                    '{{WRAPPER}}  .module--title--inner .button-text' => 'margin-right: {{SIZE}}{{UNIT}}',
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
                    '{{WRAPPER}} .module--title--inner .button-text' => 'margin-top: {{SIZE}}{{UNIT}}',
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
                'selectors' => ['{{WRAPPER}} .module--title--inner .button-text' => 'opacity: {{VALUE}} ;'],
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
                'selectors' => ['{{WRAPPER}} .module--title--inner .button-text' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .module--title--inner .button-text:hover ' => 'color: {{VALUE}};']
            ]
        );
		
		$this->end_controls_tab(); //btn_hover_tab
        $this->end_controls_tabs(); //btn_tabs
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';
		
		if($settings['title_type'] == 'type2'){
			$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
			echo '<div class="module">';
			echo '<div class="module--title style-2 bordered">';
			echo '<div class="module--title--inner">';
			echo '<h2 class="entry-title">'.esc_html($settings['title']).'</h2>';
			echo '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="button-text hide-mobile">';
			echo '<span>'.esc_html($settings['btn_title']).'</span>';
			echo '<i class="klb-right"></i> ';                        
			echo '</a>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		} elseif($settings['title_type'] == 'type3'){
			echo '<div class="module image-text style-7">';
			echo '<div class="container">';
			echo '<div class="klb-custom-title module-block">';
			echo '<h6 class="entry-subtitle">'.esc_html($settings['title']).'</h6>';
			echo '<h2 class="entry-title">'.esc_html($settings['subtitle']).'</h2>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		} else {
			echo '<div class="custom-title module-block text text-center">';
			echo '<h2 class="entry-title f-size-26 df-size-42">'.esc_html($settings['title']).'</h2>';
			echo '<p class="f-size-14">'.esc_html($settings['subtitle']).'</p>';
			echo '</div>';
		}

	}

}
