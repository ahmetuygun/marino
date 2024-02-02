<?php

namespace Elementor;

class Cosmetsy_Product_Carousel_2_Widget extends Widget_Base {
    use Cosmetsy_Helper;

    public function get_name() {
        return 'cosmetsy-product-carousel-2';
    }
    public function get_title() {
        return 'Product Carousel 2 (K)';
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
		
		$this->add_control( 'title_type',
			[
				'label' => esc_html__( 'Title Type', 'cosmetsy-core' ),
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
                'label' => esc_html__( 'Title', 'cosmetsy' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Best Seller Products',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'cosmetsy-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View All Products',
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
		
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'shopwise' ),
				'type' => Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'0' => esc_html__( 'Select Column', 'shopwise' ),
					'2' 	  => esc_html__( '2 Columns', 'shopwise' ),
					'3'		  => esc_html__( '3 Columns', 'shopwise' ),
					'4'		  => esc_html__( '4 Columns', 'shopwise' ),
					'5'		  => esc_html__( '5 Columns', 'shopwise' ),
					'6'		  => esc_html__( '6 Columns', 'shopwise' ),
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

        // Posts Per Page
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'cosmetsy' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 8
            ]
        );
		
        $this->start_controls_tabs('cat_exclude_include_tabs');
        $this->start_controls_tab( 'cat_exclude_tab',
            [ 'label' => esc_html__( 'Exclude Category', 'cosmetsy-core' ) ]
        );
		
        $this->add_control( 'cat_filter',
            [
                'label' => esc_html__( 'Exclude Category', 'cosmetsy-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->cosmetsy_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => '',
                'label_block' => true,
            ]
        );
       
		$this->end_controls_tab(); // cat_exclude_tab
		
        $this->start_controls_tab('cat_include_tab',
            [ 'label' => esc_html__( 'Include Category', 'cosmetsy-core' ) ]
        );
       
        $this->add_control( 'include_category',
            [
                'label' => esc_html__( 'Include Category', 'cosmetsy-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->cosmetsy_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => '',
                'label_block' => true,
            ]
        );
		
		$this->end_controls_tab(); // cat_include_tab 

		$this->end_controls_tabs(); // cat_exclude_include_tabs
		
        $this->add_control( 'post_include_filter',
            [
                'label' => esc_html__( 'Include Post', 'cosmetsy' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->cosmetsy_cpt_get_post_title('product'),
                'description' => 'Select Post(s) to Include',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'order',
            [
                'label' => esc_html__( 'Select Order', 'cosmetsy' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => esc_html__( 'Ascending', 'cosmetsy' ),
                    'DESC' => esc_html__( 'Descending', 'cosmetsy' )
                ],
                'default' => 'DESC'
            ]
        );
		
        $this->add_control( 'orderby',
            [
                'label' => esc_html__( 'Order By', 'cosmetsy' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'id' => esc_html__( 'Post ID', 'cosmetsy' ),
                    'menu_order' => esc_html__( 'Menu Order', 'cosmetsy' ),
                    'rand' => esc_html__( 'Random', 'cosmetsy' ),
                    'date' => esc_html__( 'Date', 'cosmetsy' ),
                    'title' => esc_html__( 'Title', 'cosmetsy' ),
                ],
                'default' => 'date',
            ]
        );

		$this->add_control( 'on_sale',
			[
				'label' => esc_html__( 'On Sale Products?', 'cosmetsy' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'cosmetsy' ),
				'label_off' => esc_html__( 'False', 'cosmetsy' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'hide_out_of_stock_items',
			[
				'label' => esc_html__( 'Hide Out of Stock?', 'cosmetsy-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'cosmetsy-core' ),
				'label_off' => esc_html__( 'False', 'cosmetsy-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'featured',
			[
				'label' => esc_html__( 'Featured Products?', 'cosmetsy' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'cosmetsy' ),
				'label_off' => esc_html__( 'False', 'cosmetsy' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'best_selling',
			[
				'label' => esc_html__( 'Best Selling Products?', 'cosmetsy' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'cosmetsy' ),
				'label_off' => esc_html__( 'False', 'cosmetsy' ),
				'return_value' => 'true',
				'default' => 'false',
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
               'selectors' => ['{{WRAPPER}} .module--title--inner .entry-title' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'cosmetsy' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .module--title--inner .entry-title:hover' => 'color: {{VALUE}};']
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
                    '{{WRAPPER}} .module--title--inner .entry-title' => 'margin-left: {{SIZE}}{{UNIT}}',
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
                        'max' => 500
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 50
                    ]
                ],
                'selectors' => [
                    ' {{WRAPPER}} .module--title--inner .entry-title ' => 'margin-top: {{SIZE}}{{UNIT}}',
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
                'selectors' => ['{{WRAPPER}} .module--title--inner .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .module--title--inner .entry-title ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => ' {{WRAPPER}} .module--title--inner .entry-title ',
				
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

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'cosmetsy' ),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .module--title--inner a '
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
                    '{{WRAPPER}}  .module--title--inner a ' => 'margin-right: {{SIZE}}{{UNIT}}',
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
                    '{{WRAPPER}} .module--title--inner a ' => 'margin-top: {{SIZE}}{{UNIT}}',
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
                'selectors' => ['{{WRAPPER}} .module--title--inner a ' => 'opacity: {{VALUE}} ;'],
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
                'selectors' => ['{{WRAPPER}} .module--title--inner span , {{WRAPPER}} .module--title--inner a i ' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .module--title--inner span:hover , {{WRAPPER}} .module--title--inner a i:hover' => 'color: {{VALUE}};']
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
		
		$output = '';

		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
	
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => $settings['post_count'],
			'order'          => 'DESC',
			'post_status'    => 'publish',
			'paged' 			=> $paged,
            'post__in'       => $settings['post_include_filter'],
            'order'          => $settings['order'],
			'orderby'        => $settings['orderby']
		);
		
		if($settings['hide_out_of_stock_items']== 'true'){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'outofstock',
					'operator' => 'NOT IN',
				),
			); // WPCS: slow query ok.
		}
	
		if($settings['include_category']){
			$args['tax_query'][] = array(
				'taxonomy' 	=> 'product_cat',
				'field' 	=> 'term_id',
				'terms' 	=> $settings['include_category'],
				
			);
		}elseif($settings['cat_filter']){
			$args['tax_query'][] = array(
				'taxonomy' 	=> 'product_cat',
				'field' 	=> 'term_id',
				'terms' 	=> $settings['cat_filter'],
				'operator' => 'NOT IN',
			);
		}

		if($settings['best_selling']== 'true'){
			$args['meta_key'] = 'total_sales';
			$args['orderby'] = 'meta_value_num';
		}

		if($settings['featured'] == 'true'){
			$args['tax_query'] = array( array(
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => array( 'featured' ),
					'operator' => 'IN',
			) );
		}
		
		if($settings['on_sale'] == 'true'){
			$args['meta_key'] = '_sale_price';
			$args['meta_value'] = array('');
			$args['meta_compare'] = 'NOT IN';
		}
	
		?>
		
		<?php
		
		if($settings['title_type'] == 'type2'){
			$titletype = '';
		} else {
			$titletype = 'bordered';
		}
		
		$output .= '<div class="module module--carousel">';
		$output .= '<div class="container">';
		$output .= '<div class="module--inner">';
		$output .= '<div class="module--title style-2 '.esc_attr($titletype).'">';
		$output .= '<div class="module--title--inner">';
		$output .= '<h2 class="entry-title">'.esc_html($settings['title']).'</h2>';
		$output .= '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="button-text">';
		$output .= '<span>'.esc_html($settings['btn_title']).'</span>';
		$output .= '<i class="klb-right"></i>';
		$output .= '</a>';
		$output .= '</div>';
		$output .= '</div>';

		$output .= '<div class="slider-wrapper">';
		$output .= '<svg class="preloader" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg>';
		$output .= '<ul class="site-slider carousel products style-2" data-slideshow="'.esc_attr($settings['column']).'" data-mobile="'.esc_attr($settings['mobile_column']).'" data-speed="1200" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-dots="'.esc_attr($settings['dots']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-infinite="true">';


		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;

			$output .= '<li class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
			$output .= cosmetsy_product_type1();
			$output .= '</li>';
			
			endwhile;
		}
		wp_reset_postdata();

		$output .= '</ul>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';


		echo $output;
	}

}
