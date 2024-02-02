<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! cosmetsy_is_pjax() ) {
    get_header( 'shop' );
}
?>

<?php $breadcrumb = get_theme_mod('cosmetsy_shop_breadcrumb','0'); ?>
<?php if($breadcrumb == '1'){ ?>
	<?php if(is_product_category()){ ?>
		<?php get_template_part( 'includes/woocommerce/breadcrumb-category' ); ?>
	<?php } elseif(is_search()){ ?>
		<?php get_template_part( 'includes/woocommerce/breadcrumb-search' ); ?>
	<?php } else { ?>
		<?php get_template_part( 'includes/woocommerce/breadcrumb' ); ?>
	<?php } ?>

<?php } else { ?>
	<div class="module-border hide-mobile">
		<div class="container">
			<div class="module-border--inner"></div>
		</div>
	</div>
	<div class="empty-klb"></div>
<?php } ?>

<div class="site-shop">
	<div class="container">
		
		<?php cosmetsy_do_action( 'cosmetsy_before_main_shop'); ?>
		
		<?php do_action( 'woocommerce_before_main_content' ); ?>

		<header class="woocommerce-products-header">
			<?php do_action( 'woocommerce_archive_description' ); ?>
		</header>
		
		<?php if( get_theme_mod( 'cosmetsy_shop_layout' ) == 'full-width' || cosmetsy_get_option() == 'full-width') { ?> 
			<div class="site-shop--inner">	
				<div class="site-shop--sidebar hide-desktop">
					<div class="site-scroll">
						<div class="site-shop--sidebar--header hide-desktop">
							<span><?php esc_html_e('Filter Products','cosmetsy'); ?></span>
							<div class="close-sidebar">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
							</div>
						</div>
						<div class="site-shop--sidebar--inner">
							<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
								<?php dynamic_sidebar( 'shop-sidebar' ); ?>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="site-shop--content">
					<?php
					if ( woocommerce_product_loop() ) {

						do_action( 'woocommerce_before_shop_loop' );

						woocommerce_product_loop_start();

						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();

								do_action( 'woocommerce_shop_loop' );

								wc_get_template_part( 'content', 'product' );
							}
						}

						woocommerce_product_loop_end();

						do_action( 'woocommerce_after_shop_loop' );
					} else {
						do_action( 'woocommerce_no_products_found' );
					}
					?>
				</div>
			</div>
		<?php } elseif( get_theme_mod( 'cosmetsy_shop_layout' ) == 'right-sidebar' || cosmetsy_get_option() == 'right-sidebar') { ?>
			<div class="site-shop--inner with-sidebar right-sidebar">	
				<div class="site-shop--sidebar">
					<div class="site-scroll">
						<div class="site-shop--sidebar--header hide-desktop">
							<span><?php esc_html_e('Filter Products','cosmetsy'); ?></span>
							<div class="close-sidebar">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
							</div>
						</div>
						<div class="site-shop--sidebar--inner">
							<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
								<?php dynamic_sidebar( 'shop-sidebar' ); ?>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="site-shop--content">
					<?php
					if ( woocommerce_product_loop() ) {

						do_action( 'woocommerce_before_shop_loop' );

						woocommerce_product_loop_start();

						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();

								do_action( 'woocommerce_shop_loop' );

								wc_get_template_part( 'content', 'product' );
							}
						}

						woocommerce_product_loop_end();

						do_action( 'woocommerce_after_shop_loop' );
					} else {
						do_action( 'woocommerce_no_products_found' );
					}
					?>
				</div>
			</div>
		<?php } else { ?>
			<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
				<div class="site-shop--inner with-sidebar">	
					<div class="site-shop--sidebar">
						<div class="site-scroll">
							<div class="site-shop--sidebar--header hide-desktop">
								<span><?php esc_html_e('Filter Products','cosmetsy'); ?></span>
								<div class="close-sidebar">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
								</div>
							</div>
							<div class="site-shop--sidebar--inner">
								<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
									<?php dynamic_sidebar( 'shop-sidebar' ); ?>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="site-shop--content">
						<?php
						if ( woocommerce_product_loop() ) {

							do_action( 'woocommerce_before_shop_loop' );

							woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}
							}

							woocommerce_product_loop_end();

							do_action( 'woocommerce_after_shop_loop' );
						} else {
							do_action( 'woocommerce_no_products_found' );
						}
						?>
					</div>
				</div>
			<?php } else { ?>
				<div class="site-shop--inner">	
					<div class="site-shop--sidebar hide-desktop">
						<div class="site-scroll">
							<div class="site-shop--sidebar--header hide-desktop">
								<span><?php esc_html_e('Filter Products','cosmetsy'); ?></span>
								<div class="close-sidebar">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
								</div>
							</div>
							<div class="site-shop--sidebar--inner">
								<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
									<?php dynamic_sidebar( 'shop-sidebar' ); ?>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="site-shop--content">
						<?php
						if ( woocommerce_product_loop() ) {

							do_action( 'woocommerce_before_shop_loop' );

							woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}
							}

							woocommerce_product_loop_end();

							do_action( 'woocommerce_after_shop_loop' );
						} else {
							do_action( 'woocommerce_no_products_found' );
						}
						?>
					</div>
				</div>
			<?php } ?>
		<?php } ?>

		<?php do_action( 'woocommerce_after_main_content' ); ?>
		
		<?php cosmetsy_do_action( 'cosmetsy_after_main_shop'); ?>

	</div>
</div>
<?php
if ( ! cosmetsy_is_pjax() ) {
	get_footer( 'shop' );
}
