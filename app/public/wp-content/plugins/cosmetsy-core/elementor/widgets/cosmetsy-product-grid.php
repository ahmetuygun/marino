<?php

namespace Elementor;

class Cosmetsy_Product_Grid_Widget extends Widget_Base {
    use Cosmetsy_Helper;

    public function get_name() {
        return 'cosmetsy-product-grid';
    }
    public function get_title() {
        return 'Product Grid (K)';
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
		
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'cosmetsy' ),
				'type' => Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'0' => esc_html__( 'Select Column', 'cosmetsy' ),
					'2' 	  => esc_html__( '2 Columns', 'cosmetsy' ),
					'3'		  => esc_html__( '3 Columns', 'cosmetsy' ),
					'4'		  => esc_html__( '4 Columns', 'cosmetsy' ),
					'5'		  => esc_html__( '5 Columns', 'cosmetsy' ),
				],
			]
		);
		
		$this->add_control( 'mobile_column',
			[
				'label' => esc_html__( 'Mobile Column', 'cosmetsy' ),
				'type' => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'0' => esc_html__( 'Select Column', 'cosmetsy' ),
					'1' 	  => esc_html__( '1 Column', 'cosmetsy' ),
					'2'		  => esc_html__( '2 Columns', 'cosmetsy' ),
				],
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
		

		$output .= '<div class="container">';
		$output .= '<ul class="products columns-'.esc_attr($settings['column']).' mobile-column-'.esc_attr($settings['mobile_column']).' style-1 align-center">';

		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;

			$output .= '<li class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
			$output .= cosmetsy_product_type3();
			$output .= '</li>';
			
			endwhile;
		}
		wp_reset_postdata();

		$output .= '</ul>';
		$output .= '</div>';
		
		if($settings['btn_title']){
		$output .= '<div class="module-button text-center mt-30 d-mt-100">';
		$output .= '<a href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="button light medium wide">'.esc_html($settings['btn_title']).'</a>';
		$output .= '</div>';
		}
		
		echo $output;
	}

}
