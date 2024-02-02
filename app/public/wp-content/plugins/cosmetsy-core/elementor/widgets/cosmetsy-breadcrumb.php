<?php

namespace Elementor;

class Cosmetsy_Breadcrumb_Widget extends Widget_Base {

    public function get_name() {
        return 'cosmetsy-breadcrumb';
    }
    public function get_title() {
        return 'Breadcrumb (K)';
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

		$this->add_control( 'breadcrumb_type',
			[
				'label' => esc_html__( 'Breadcrumb Type', 'cosmetsy-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'cosmetsy-core' ),
					'type1'	  => esc_html__( 'Type 1', 'cosmetsy-core' ),
					'type2'	  => esc_html__( 'Type 2', 'cosmetsy-core' ),
				],
			]
		);
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'cosmetsy-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'About Us',
                'pleaceholder' => esc_html__( 'Set a title.', 'cosmetsy-core' )
            ]
        );
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'cosmetsy-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut',
                'pleaceholder' => esc_html__( 'Set a description for the breadcrumb.', 'cosmetsy-core' )
            ]
        );
		
		$defaultimage = plugins_url( 'images/breadcrumb-bg.jpg', __DIR__ );
        $this->add_control( 'bg_image',
            [
                'label' => esc_html__( 'Background Image', 'cosmetsy-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
				'condition' => ['breadcrumb_type' => 'type2']
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
		
		$this->start_controls_section( 'bread_style',
            [
                'label' => esc_html__( 'Breadcrumbs', 'cosmetsy' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		
		$this->add_control( 'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'cosmetsy' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Core\Schemes\Color::get_type(),
					'value' => Core\Schemes\Color::COLOR_1,
				],
				'default' => '#f9f3f2',
				'selectors' => [
					'{{WRAPPER}} .shop-page-header .container' => 'background-color: {{value}};',
				],
				'condition' => ['breadcrumb_type' => array('type1','select-type')]
			]
		);
        
		$this->add_responsive_control( 'alignment',
            [
                'label' => esc_html__( 'Alignment', 'cosmetsy' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .shop-page-header--inner , {{WRAPPER}} .breadcrumb-menu' => 'text-align: {{VALUE}};'],
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
        
        $this->add_control( 'bread_color',
            [
                'label' => esc_html__( 'Page/Post Color', 'cosmetsy' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .breadcrumb-menu a ' => 'color:{{VALUE}} !important ;' ]
            ]
        );
		
        $this->add_control( 'bread_sepcolor',
            [
                'label' => esc_html__( 'Separator Color', 'cosmetsy' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} ul.breadcrumb-menu li a:after' => 'color:{{VALUE}} !important;' ]
            ]
        );
        $this->add_control( 'bread_hvrcolor',
            [
                'label' => esc_html__( 'Page/Post Hover Color', 'cosmetsy' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .breadcrumb-menu a:hover ' => 'color:{{VALUE}} !important;' ],
            ]
        );
        $this->add_control( 'bread_actvcolor',
            [
                'label' => esc_html__( 'Current Page/Post Color', 'cosmetsy' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}}  .breadcrumb-menu span' => 'color:{{VALUE}} !important ;' ],
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
               'selectors' => ['{{WRAPPER}} h1.entry-title' => 'color: {{VALUE}} !important;']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  h1.entry-title:hover' => 'color: {{VALUE}} !important;']
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
                'selectors' => ['{{WRAPPER}} h1.entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} h1.entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => ' {{WRAPPER}} h1.entry-title',
				
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
               'selectors' => ['{{WRAPPER}} .entry-description p' => 'color: {{VALUE}} !important;'],
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .entry-description p:hover' => 'color: {{VALUE}} !important;'],
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
			
		if($settings['breadcrumb_type'] == 'type2'){
			echo '<div class="shop-page-header style-2 with-background">';
			echo '<div class="container" style="background-image: url('.esc_url($settings['bg_image']['url']).');">';
			echo '<div class="row">';
			echo '<div class="col">';
			echo cosmetsy_breadcrubms();
			echo '<div class="shop-page-header--inner">';
			echo '<div class="shop-page-header--title">';
			echo '<h1 class="entry-title">'.esc_html($settings['title']).'</h1>';
			echo '<div class="entry-description">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		} else {
			echo '<div class="shop-page-header style-2">';
			echo '<div class="container">';
			echo '<div class="row">';
			echo '<div class="col">';
			echo cosmetsy_breadcrubms();
			echo '<div class="shop-page-header--inner">';
			echo '<div class="shop-page-header--title">';
			echo '<h1 class="entry-title">'.esc_html($settings['title']).'</h1>';
			echo '<div class="entry-description">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';

		}

		
	}

}
