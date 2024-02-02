<?php

namespace Elementor;

class Cosmetsy_Icon_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'cosmetsy-icon-box';
    }
    public function get_title() {
        return 'Icon Box (K)';
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
		
		$this->add_control(
			'switcher_icon',
			[
				'label' => esc_html__( 'Use Custom Icon', 'cosmetsy-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'cosmetsy-core' ),
				'label_off' => esc_html__( 'No', 'cosmetsy-core' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		
		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'cosmetsy-core' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-brands',
				],
                'label_block' => true,
				'condition' => ['switcher_icon' => '']
			]
		);
		
        $this->add_control( 'custom_icon',
            [
                'label' => esc_html__( 'Custom Icon', 'cosmetsy-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'fal fa-ship',
                'description'=> 'You can add icon code. for example: fal fa-ship',
				'condition' => ['switcher_icon' => 'yes']
            ]
        );

       $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'cosmetsy-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'pleaceholder' => esc_html__( 'Enter title here', 'cosmetsy-core' ),
                'default' => 'Free Shipping',
            ]
        );
       $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'cosmetsy-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'pleaceholder' => esc_html__( 'Enter desc here', 'cosmetsy-core' ),
                'default' => 'Sed perspicia unde omnis iste nat error voluptate accus.',
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
		
		$this->add_control( 'icon_heading',
            [
                'label' => esc_html__( 'ICON', 'cosmetsy' ),
                'type' => Controls_Manager::HEADING,
            ]
        );
		
		$this->add_responsive_control( 'icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'cosmetsy' ),
                'type' => Controls_Manager::SLIDER,
                'min' => 0,
                'max' => 100,
                'selectors' => [ '{{WRAPPER}} .site-icon i' => 'font-size: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_control( 'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'sosso' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Core\Schemes\Color::get_type(),
					'value' => Core\Schemes\Color::COLOR_1,
				],
				'default' => '#eca497',
				'selectors' => [
					'{{WRAPPER}} svg' => 'fill: {{value}};',
					'{{WRAPPER}} i' => 'color: {{value}};',
				],
			]
		);
		
		$this->add_control( 'icon_hvrcolor',
           [
               'label' => esc_html__( 'Icon Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .site-icon i:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'icon_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'cosmetsy-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .site-icon i' => 'opacity: {{VALUE}};'],
				
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .site-icon i',
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
               'selectors' => ['{{WRAPPER}} .entry-text .entry-title ' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-text .entry-title:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .entry-text .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .entry-text .entry-title ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => ' {{WRAPPER}} .entry-text .entry-title',
				
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
               'selectors' => ['{{WRAPPER}} .entry-description p' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-description p:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .entry-description p' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .entry-description p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .entry-description p',
            ]
        );
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
		echo '<div class="module module--iconbox">';
		echo '<div class="module--inner">';
		echo '<div class="site-icon">';
		if($settings['switcher_icon'] == 'yes'){
			echo '<i class="'.esc_attr($settings['custom_icon']).'"></i>';
		} else {
			Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'false' ] );						
		}
		
		echo '</div>';
		echo '<div class="entry-text">';
		echo '<p class="entry-title">'.esc_html($settings['title']).'</p>';
		echo '<div class="entry-description">';
		echo '<p>'.esc_html($settings['desc']).'</p>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
	}

}
