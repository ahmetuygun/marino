<?php

namespace Elementor;

class Cosmetsy_Product_Categories_Widget extends Widget_Base {
    use Cosmetsy_Helper;
	
    public function get_name() {
        return 'cosmetsy-product-categories';
    }
    public function get_title() {
        return 'Product Categories (K)';
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
		
		$this->add_control( 'type',
			[
				'label' => esc_html__( 'Box Type', 'cosmetsy' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'cosmetsy' ),
					'type1'	  => esc_html__( 'Type 1', 'cosmetsy' ),
					'type2'	  => esc_html__( 'Type 2', 'cosmetsy' ),
				],
			]
		);
		
        $this->start_controls_tabs('cat_exclude_include_tabs');
        $this->start_controls_tab('cat_exclude_tab',
            [ 'label' => esc_html__( 'Exclude Category', 'cosmetsy-core' ) ]
        );
		
        $this->add_control( 'cat_filter',
            [
                'label' => esc_html__( 'Exclude Category', 'cosmetsy' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->cosmetsy_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => '',
                'label_block' => true,
            ]
        );
		
		$this->end_controls_tab(); // cat_exclude_tab 
		
		$this->start_controls_tab( 'cat_include_tab',
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
				],
				'condition' => ['type' => array('type1','select-type')]
			]
		);

		$this->add_control( 'disable_subcategory',
			[
				'label' => esc_html__( 'Disable Subcategory?', 'cosmetsy' ),
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

		if($settings['cat_filter'] || $settings['include_category']){
			$terms = get_terms( array(
				'taxonomy' => 'product_cat',
				'hide_empty' => true,
				'parent'    => 0,
				'exclude'   => $settings['cat_filter'],
				'include'   => $settings['include_category']
				
			) );
		} else {
			$terms = get_terms( array(
				'taxonomy' => 'product_cat',
				'hide_empty' => true,
				'parent'    => 0,
			) );
		}
	

		echo '<div class="module module--category">';
		echo '<div class="container">';
		echo '<div class="module--inner">';
		if($settings['type'] == 'type2'){
		echo '<ul class="category-list column-4 style-1">';
		} else {
		echo '<ul class="category-list column-'.$settings['column'].' style-2">';
		}    
		foreach ( $terms as $term ) {
			$term_data = get_option('taxonomy_'.$term->term_id);
			$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id );
			$term_children = get_term_children( $term->term_id, 'product_cat' );
			
			echo '<li class="category-item">';
			echo '<a href="'.esc_url(get_term_link( $term )).'">';
			echo '<div class="category-detail">';
			echo '<h4 class="entry-category">'.esc_html($term->name).'</h4>';
			if($settings['type'] == 'type2'){
			echo '<span class="button-text">'.esc_html__('Shop Now','cosmetsy-core').'</span>';
			}
			echo '</div>';
			if($image){
			echo '<div class="category-image"><img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'"></div>';
			}
			echo '</a>';
			echo '</li>';
			

			if($settings['disable_subcategory'] != 'true'){
				if($term_children){
					foreach($term_children as $child){
						$childterm = get_term_by( 'id', $child, 'product_cat' );
						$childthumbnail_id = get_term_meta( $childterm->term_id, 'thumbnail_id', true );
						$childimage = wp_get_attachment_url( $childthumbnail_id );
						
						if(!in_array($childterm->term_id, $settings['cat_filter'])){
							echo '<li class="category-item">';
							echo '<a href="'.esc_url(get_term_link( $child )).'">';
							echo '<div class="category-detail">';
							echo '<h4 class="entry-category">'.esc_html($childterm->name).'</h4>';
							if($settings['type'] == 'type2'){
							echo '<span class="button-text">'.esc_html__('Shop Now','cosmetsy-core').'</span>';
							}
							echo '</div>';
							if($image){
							echo '<div class="category-image"><img src="'.esc_url($childimage).'" alt="'.esc_attr($childterm->name).'"></div>';
							}
							echo '</a>';
							echo '</li>';
						}
					}
				}
			}

		}
		
		echo '</ul>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
	}

}
