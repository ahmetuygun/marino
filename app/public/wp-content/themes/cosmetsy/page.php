<?php
/**
 * page.php
 * @package WordPress
 * @subpackage Cosmetsy
 * @since Cosmetsy 1.0
 */
?>

<?php get_header(); ?>

	<?php $elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true ); ?> 

	<?php if ( class_exists( 'woocommerce' ) ) { ?>

		<?php if (is_cart()) { ?>
		
			<?php $breadcrumb = get_theme_mod('cosmetsy_shop_breadcrumb','0'); ?>
			<?php if($breadcrumb == '1'){ ?>
			
				<?php get_template_part( 'includes/woocommerce/breadcrumb-page' ); ?>
				
			<?php } else { ?>
				<div class="module-border hide-mobile">
					<div class="container">
						<div class="module-border--inner"></div>
					</div>
				</div>
			<?php } ?>
			
			<div class="container">
				<div class="cart-page-wrapper">
					<?php while(have_posts()) : the_post(); ?>
						<?php the_content (); ?>
						<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'cosmetsy' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
					<?php endwhile; ?>
				</div>
			</div>

		<?php } elseif (is_checkout()) { ?>
			<?php $breadcrumb = get_theme_mod('cosmetsy_shop_breadcrumb','0'); ?>
			<?php if($breadcrumb == '1'){ ?>
			
				<?php get_template_part( 'includes/woocommerce/breadcrumb-page' ); ?>
				
			<?php } else { ?>
				<div class="module-border hide-mobile">
					<div class="container">
						<div class="module-border--inner"></div>
					</div>
				</div>
			<?php } ?>
		
			<div class="container">
				<div class="cart-page-wrapper checkout-page-wrapper">
					<?php while(have_posts()) : the_post(); ?>
						<?php the_content (); ?>
						<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'cosmetsy' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
					<?php endwhile; ?>
				</div>
			</div>
	   <?php } elseif (is_account_page()) { ?>
			<?php $breadcrumb = get_theme_mod('cosmetsy_shop_breadcrumb','0'); ?>
			<?php if($breadcrumb == '1'){ ?>
			
				<?php get_template_part( 'includes/woocommerce/breadcrumb-page' ); ?>
				
			<?php } else { ?>
				<div class="module-border hide-mobile">
					<div class="container">
						<div class="module-border--inner"></div>
					</div>
				</div>
			<?php } ?>
	   
			<div class="container">
				<div class="my-account-page">
					<?php while(have_posts()) : the_post(); ?>
						<?php the_content (); ?>
						<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'cosmetsy' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
					<?php endwhile; ?>
				</div>
			</div>
	   <?php } elseif ($elementor_page ) { ?>
		  
			<?php while(have_posts()) : the_post(); ?>
				<?php the_content (); ?>
				<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'cosmetsy' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
			<?php endwhile; ?>
			
		<?php } else { ?>
			<div class="module-border hide-mobile">
				<div class="container">
					<div class="module-border--inner"></div>
				</div>
			</div>
			<div class="empty-klb"></div>
			<div class="klb-page section">
				<div class="container">
					<div class="row ">
						<div class="col-12 col-lg-10 offset-lg-1">
							<?php while(have_posts()) : the_post(); ?>
								<h1 class="klb-page-title"><?php the_title(); ?></h1>
								<div class="klb-post">
									<?php the_content (); ?>
									<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'cosmetsy' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
								</div>
							<?php endwhile; ?>
							<?php comments_template(); ?>
						</div>
					</div>         
				</div>
			</div>
		<?php } ?>
	<?php } else { ?>

	   <?php if ($elementor_page ) { ?>
		  
			<?php while(have_posts()) : the_post(); ?>
				<?php the_content (); ?>
				<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'cosmetsy' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
			<?php endwhile; ?>
			
		<?php } else { ?>
			<div class="module-border hide-mobile">
				<div class="container">
					<div class="module-border--inner"></div>
				</div>
			</div>
			<div class="empty-klb"></div>
			<div class="klb-page section">
				<div class="container">
					<div class="row ">
						<div class="col-12 col-lg-10 offset-lg-1">
							<?php while(have_posts()) : the_post(); ?>
								<h1 class="klb-page-title"><?php the_title(); ?></h1>
								<div class="klb-post">
									<?php the_content (); ?>
									<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'cosmetsy' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
								</div>
							<?php endwhile; ?>
							<?php comments_template(); ?>
						</div>
					</div>         
				</div>
			</div>
		<?php } ?>
	<?php } ?>
<?php get_footer(); ?>