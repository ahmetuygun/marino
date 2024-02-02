<?php if(get_theme_mod('cosmetsy_shop_breadcrumb_type') == 'type2'){ ?>
	<?php $breadcrumbtype = 'with-background'; ?>
<?php } else { ?>
	<?php $breadcrumbtype = ''; ?>
<?php } ?>

<div class="klb-shop-breadcrumb shop-page-header style-2 <?php echo esc_attr($breadcrumbtype); ?>">
	<div class="container">
		<div class="row">
			<div class="col">

				<?php woocommerce_breadcrumb(); ?>

				<div class="shop-page-header--inner">
					<div class="shop-page-header--title">
						<?php $breadcrumb_title = get_theme_mod('cosmetsy_shop_breadcrumb_title'); ?>
						<?php if($breadcrumb_title){ ?>
							<h1 class="entry-title"><?php echo esc_html($breadcrumb_title); ?></h1>
						<?php } else { ?>
							<h1 class="entry-title"><?php echo esc_html_e('Shop','cosmetsy'); ?></h1>
						<?php } ?>
						<div class="entry-description">
							<p><?php echo cosmetsy_sanitize_data(get_theme_mod('cosmetsy_shop_breadcrumb_desc')); ?></p>
						</div>
					</div>

					<?php 
						$terms = get_terms( array(
							'taxonomy' => 'product_cat',
							'hide_empty' => true,
							'parent'    => 0,
						) );
					?>
					
					<?php if($terms){ ?>
						<div class="shop-page-header--categories">
							<ul>
								<?php foreach ( $terms as $term ) { ?>
									<li><a href="<?php echo esc_url(get_term_link( $term )); ?>"><?php echo esc_html($term->name); ?></a></li>
								<?php } ?>
							</ul>
						</div>
					<?php } ?>
				</div>

			</div>
		</div>
	</div>
</div>