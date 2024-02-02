<?php

namespace Elementor;

class Cosmetsy_Clients_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'cosmetsy-clients-box';
    }
    public function get_title() {
        return 'Clients Box (K)';
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


		$customimg = plugins_url( 'images/client.png', __DIR__ );
		$repeater = new Repeater();

        $repeater->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'cosmetsy' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $customimg],
            ]
        );
		
        $repeater->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Image Link', 'cosmetsy-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'cosmetsy-core' )
            ]
        );

        $this->add_control( 'client_items',
            [
                'label' => esc_html__( 'Client Items', 'cosmetsy' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => ['url' => $customimg],
                        'btn_link' => '#',
                    ],
                    [
                        'image' => ['url' => $customimg],
                        'btn_link' => '#',
                    ],
                    [
                        'image' => ['url' => $customimg],
                        'btn_link' => '#',
                    ],
                    [
                        'image' => ['url' => $customimg],
                        'btn_link' => '#',
                    ],
                    [
                        'image' => ['url' => $customimg],
                        'btn_link' => '#',
                    ],
                ]
            ]
        );

		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'cosmetsy' ),
				'type' => Controls_Manager::SELECT,
				'default' => '5',
				'options' => [
					'0' => esc_html__( 'Select Column', 'cosmetsy' ),
					'2' 	  => esc_html__( '2 Columns', 'cosmetsy' ),
					'3'		  => esc_html__( '3 Columns', 'cosmetsy' ),
					'4'		  => esc_html__( '4 Columns', 'cosmetsy' ),
					'5'		  => esc_html__( '5 Columns', 'cosmetsy' ),
					'6'		  => esc_html__( '5 Columns', 'cosmetsy' ),
				],
			]
		);
		
		$this->add_control( 'mobile_column',
			[
				'label' => esc_html__( 'Mobile Column', 'shopwise' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'0' => esc_html__( 'Select Column', 'shopwise' ),
					'1' 	  => esc_html__( '1 Column', 'shopwise' ),
					'2'		  => esc_html__( '2 Columns', 'shopwise' ),
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
                'label' => esc_html__( 'Auto Speed', 'cosmetsy' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1600',
                'pleaceholder' => esc_html__( 'Set auto speed.', 'cosmetsy' ),
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
				'default' => 'false',
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
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
		
		$this->start_controls_section('cosmetsy_styling',
            [
                'label' => esc_html__( ' Style', 'cosmetsy' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_control( 'clients_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'cosmetsy-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .module a img ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		echo '<div class="module module--logos column-5 style-2">';
		echo '<div class="slider-wrapper container">';
		echo '<div class="client-box module--inner site-slider slider" data-slideshow="'.esc_attr($settings['column']).'" data-mobile="'.esc_attr($settings['mobile_column']).'" data-speed="1200" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-dots="'.esc_attr($settings['dots']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-infinite="true">';
		
		if ( $settings['client_items'] ) {
			foreach ( $settings['client_items'] as $item ) {
				$target = $item['btn_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $item['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
				
				echo '<div class="logo-item opacity">';
				echo '<a href="'.esc_url($item['btn_link']['url']).'" '.esc_attr($target.$nofollow).'><img src="'.esc_url($item['image']['url']).'" alt="client"></a>';
				echo '</div>';

			}
		}
		echo '</div>';
		echo '</div>';
		echo '</div>';

		
	}

}
