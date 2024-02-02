<?php

namespace Elementor;

class Cosmetsy_Counter_Widget extends Widget_Base {

    public function get_name() {
        return 'cosmetsy-counter';
    }
    public function get_title() {
        return 'Counter (K)';
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
		
        $this->add_control( 'expiry_date',
            [
                'label' => esc_html__( 'Expiry Date', 'cosmetsy' ),
                'type' => Controls_Manager::TEXT,
                'default' => '2023-03-30',
                'description'=> 'Add a expiry date.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'cosmetsy' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Balance, purify, and heal your skin with Cosmetsy.',
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
               'selectors' => ['{{WRAPPER}} .counter-text p' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .counter-text p:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .counter-text p ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .counter-text p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => ' {{WRAPPER}} .counter-text p',
				
            ]
        );
		
		$this->add_control( 'date_heading',
            [
                'label' => esc_html__( 'DATE', 'cosmetsy' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'date_color',
           [
               'label' => esc_html__( 'Date Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .counter--item span , {{WRAPPER}} .count-label , {{WRAPPER}} .counter--separator ' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'date_hvrcolor',
           [
               'label' => esc_html__( 'Date Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .counter--item span:hover , {{WRAPPER}} .count-label:hover , {{WRAPPER}} .counter--separator:hover ' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'date_size',
            [
                'label' => esc_html__( 'Date Size', 'cosmetsy' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .counter--item span' => 'font-size: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_control( 'date_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'cosmetsy-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .counter ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'date_text_shadow',
				'selector' => '{{WRAPPER}} .counter',
			]
		);
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'counter_background',
                'label' => esc_html__( 'Date Background', 'cosmetsy' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .counter--column.time , {{WRAPPER}} .counter--column.sec ',
            ]
        );
		
		$this->add_control( 'date_border_color',
           [
               'label' => esc_html__( 'Date Border Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .counter--column.time , {{WRAPPER}} .counter--column.sec ' => 'border-color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'date_date_hvrcolor',
           [
               'label' => esc_html__( 'Date Border Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .counter--column.time:hover , {{WRAPPER}} .counter--column.sec:hover' => 'border-color: {{VALUE}};']
           ]
        );


		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';
		
		
		echo '<div class="module module--counter mt-30 mb-30">';
		echo '<div class="container">';
		echo '<div class="module--inner">';
		echo '<div class="counter-text">';
		echo '<p>'.$settings['desc'].'</p>';
		echo '</div>';
		echo '<div class="counter" data-date="'.esc_attr($settings['expiry_date']).'">';
		echo '<div class="counter--column time">';

		echo '<div class="counter--item">';
		echo '<span class="days">00</span>';
		echo '<div class="count-label">'.esc_html__('Days','cosmetsy-core').'</div>';
		echo '</div>';

		echo '<span class="counter--separator">:</span>';

		echo '<div class="counter--item">';
		echo '<span class="hours">00</span>';
		echo '<div class="count-label">'.esc_html__('Hours','cosmetsy-core').'</div>';
		echo '</div>';

		echo '<span class="counter--separator">:</span>';

		echo '<div class="counter--item">';
		echo '<span class="minutes">00</span>';
		echo '<div class="count-label">'.esc_html__('Minutes','cosmetsy-core').'</div>';
		echo '</div>';

		echo '</div>';
		echo '<div class="counter--column sec">';
		echo '<div class="counter--item">';
		echo '<span class="seconds">00</span>';
		echo '<div class="count-label">'.esc_html__('Seconds','cosmetsy-core').'</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';

	}

}
