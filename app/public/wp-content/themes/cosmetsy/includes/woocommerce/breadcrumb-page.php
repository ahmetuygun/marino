<?php if(get_theme_mod('cosmetsy_shop_breadcrumb_type') == 'type2'){ ?>
	<?php $breadcrumbtype = 'with-background'; ?>
<?php } else { ?>
	<?php $breadcrumbtype = ''; ?>
<?php } ?>

<div class="klb-shop-breadcrumb shop-page-header style-2">
	<div class="container">
		<div class="row">
			<div class="col">

				<?php woocommerce_breadcrumb(); ?>

				<div class="shop-page-header--inner">
					<div class="shop-page-header--title">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>