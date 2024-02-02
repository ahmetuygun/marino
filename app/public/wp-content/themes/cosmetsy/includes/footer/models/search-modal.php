<?php $headersearch = get_theme_mod('cosmetsy_header_search','0'); ?>
<?php if($headersearch == 1){ ?>
	<div class="search-holder">
		<div class="search-holder--close">
			<i class="klb-x"></i>
		</div>
		<div class="container">
			<div class="row">
				<div class="col">
				

					<?php echo cosmetsy_header_product_search(); ?>

					
					<div class="search-message">
						<p><?php esc_html_e('Please type the word you want to search and press enter.','cosmetsy'); ?></p>
					</div>
					
					<?php if(get_theme_mod('cosmetsy_header_most_viewed_products',0) == '1'){ ?>
						<div class="most-viewed-products hide-mobile">
							<div class="most-viewed-title">
								<h3 class="entry-title klbtype-1"><?php esc_html_e('Most Viewed Products','cosmetsy'); ?></h3>
							</div>
							<?php
								$args = array(
									'post_type' => 'product',
									'posts_per_page' => 3,
									'order'          => 'DESC',
									'post_status'    => 'publish',

								);
								query_posts( $args );
							?>
							<ul class="product_list_widget products">
								<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php
									global $product;
									global $post;
									global $woocommerce;
									
									$allproduct = wc_get_product( get_the_ID() );
									
									if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
										$att=get_post_thumbnail_id();
										$image_src = wp_get_attachment_image_src( $att, 'full' );
										$image_src = $image_src[0];
										$image_output = cosmetsy_resize( $image_src, 150, 150, true, true, true );  
									} else {
										$image_output = wc_placeholder_img_src('');
									}
									
									$price = $allproduct->get_price_html();

								?>
								<li class="product">
									<div class="product-content">
										<div class="product-media">
											<figure class="entry-media">
												<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image_output); ?>" alt="Cosmetsy"></a>
											</figure>
										</div>
										<div class="product-detail">
											<div class="entry-category">
												<?php echo wc_get_product_category_list($product->get_id(), ''); ?>
											</div>
											<h3 class="entry-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<div class="entry-price">
												<span class="quantity">
												<?php echo cosmetsy_sanitize_data($price); ?>
												</span>
											</div>
										</div>
									</div>
								</li>
								<?php 
									endwhile;
									wp_reset_query();
									endif;
								?>
							</ul>
						</div>
					<?php } ?>
					
				</div>
			</div>
		</div>
	</div>
<?php } ?>