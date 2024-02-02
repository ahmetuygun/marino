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
						<h1 class="entry-title"><?php the_archive_title(); ?></h1>
					</div>

					<div class="shop-page-header--categories">
						<ul>
							
							<?php $term_children = get_term_children( get_queried_object()->term_id, 'product_cat' ); ?>
							<?php if($term_children){ ?>
								<?php foreach($term_children as $child){ ?>
									<?php $childterm = get_term_by( 'id', $child, 'product_cat' ); ?>
									<li><a href="<?php echo esc_url(get_term_link( $child )); ?>"><?php echo esc_html($childterm->name); ?></a></li>
								<?php } ?>
							<?php } ?>
								
						</ul>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>