<?php if(get_theme_mod('cosmetsy_shop_breadcrumb_type') == 'type2'){ ?>
	<?php $breadcrumbtype = 'with-background'; ?>
<?php } else { ?>
	<?php $breadcrumbtype = ''; ?>
<?php } ?>

<div class="klb-shop-breadcrumb shop-page-header style-2 <?php echo esc_attr($breadcrumbtype); ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="shop-page-header--inner">
					<div class="shop-page-header--title">
						<h1 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'cosmetsy' ), get_search_query() ); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>