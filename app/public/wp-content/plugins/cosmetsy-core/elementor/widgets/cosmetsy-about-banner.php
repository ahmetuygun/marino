<?php

namespace Elementor;

class Cosmetsy_About_Banner_Widget extends Widget_Base {

    public function get_name() {
        return 'cosmetsy-about-banner';
    }
    public function get_title() {
        return 'About Banner (K)';
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

		$defaultimage = plugins_url( 'images/about-banner.jpg', __DIR__ );
		
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
                'default' => 'About Cosmetsy',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'cosmetsy' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'From Dreamy Lip Hues to the ultimate Brow Saviours',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
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
                'selectors' => ['{{WRAPPER}} .module-block' => 'text-align: {{VALUE}};'],
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
               'selectors' => ['{{WRAPPER}} .module-block.text .entry-subtitle' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .module-block.text .entry-subtitle:hover' => 'color: {{VALUE}};']
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
                    '{{WRAPPER}} .module-block.text .entry-subtitle' => 'padding-left: {{SIZE}}{{UNIT}}',
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
                    ' {{WRAPPER}} .module-block.text .entry-subtitle ' => 'padding-top: {{SIZE}}{{UNIT}}',
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
                'selectors' => ['{{WRAPPER}} .module-block.text .entry-subtitle ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .module-block.text .entry-subtitle',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => ' {{WRAPPER}} .module-block.text .entry-subtitle',
				
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
               'selectors' => ['{{WRAPPER}} .module-block.text .entry-title' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .module-block.text .entry-title:hover' => 'color: {{VALUE}};'],
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
                    '{{WRAPPER}} .module-block.text .entry-title' => 'padding-left: {{SIZE}}{{UNIT}}',
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
                    '{{WRAPPER}} .module-block.text .entry-title' => 'padding-top: {{SIZE}}{{UNIT}}',
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
                'selectors' => ['{{WRAPPER}} .module-block.text .entry-title' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .module-block.text .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .module-block.text .entry-title',
            ]
        );
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';
		
			echo '<div class="module image-text style-12">';
			echo '<div class="container">';
			echo '<div class="module-wrapper">';
			echo '<div class="row align-items-center">';
			echo '<div class="col col-12 col-lg-7">';
			echo '<div class="module-block text">';
			echo '<h6 class="entry-subtitle f-size-10 mb-20 d-mb-35">'.esc_html($settings['title']).'</h6>';
			echo '<h1 class="entry-title f-size-34 df-size-80">'.esc_html($settings['subtitle']).'</h1>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="module-block image">';
			echo '<img src="'.esc_url($settings['image']['url']).'">';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="module space">';
			echo '<div class="container">';
			echo '<div class="inner"></div>';
			echo '</div>';
			echo '</div>';

	}

}
