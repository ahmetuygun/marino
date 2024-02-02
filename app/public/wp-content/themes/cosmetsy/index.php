<?php
/**
 * index.php
 * @package WordPress
 * @subpackage Cosmetsy
 * @since Cosmetsy 1.0
 * 
 */
 ?>

<?php get_header(); ?>

	<?php $breadcrumb = get_theme_mod('cosmetsy_blog_breadcrumb','0'); ?>
	<?php if($breadcrumb == '1'){ ?>
		<div class="klb-blog-breadcrumb shop-page-header style-2">
			<div class="container">
				<div class="row">
					<div class="col">
						<?php echo cosmetsy_breadcrubms(); ?>

						<div class="shop-page-header--inner">
							<div class="shop-page-header--title">
								<?php $breadcrumb_title = get_theme_mod('cosmetsy_blog_breadcrumb_title'); ?>
								<?php if($breadcrumb_title){ ?>
									<h1 class="entry-title"><?php echo esc_html($breadcrumb_title); ?></h1>
								<?php } else { ?>
									<h1 class="entry-title"><?php esc_html_e('Our News','cosmetsy'); ?></h1>
								<?php } ?>
								<div class="entry-description">
									<p><?php echo esc_html(get_theme_mod('cosmetsy_blog_breadcrumb_desc')); ?></p>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<div class="module-border hide-mobile">
			<div class="container">
				<div class="module-border--inner"></div>
			</div>
		</div>
	<?php } ?>
	
	
	<div class="container">
		<?php if( get_theme_mod( 'cosmetsy_blog_layout' ) == 'right-sidebar') { ?>
			<div class="site-main-body blog">
				<div class="row">
					<div class="col-12 col-lg-9">
						<div class="site-post-archive size-large algin-inherit">
							<div class="row">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

									<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

								<?php endwhile; ?>
							
									<?php get_template_part( 'post-format/pagination' ); ?>
									
								<?php else : ?>

									<h2><?php esc_html_e('No Posts Found', 'cosmetsy') ?></h2>

								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-3">
						<div id="sidebar-primary" class="site-sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
							<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
								<?php dynamic_sidebar( 'blog-sidebar' ); ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php } elseif( get_theme_mod( 'cosmetsy_blog_layout' ) == 'full-width') { ?>
			<div class="site-main-body blog">
				<div class="row">
					<div class="col-12 col-lg-10 offset-lg-1">
						<div class="site-post-archive size-large algin-inherit">
							<div class="row">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

									<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

								<?php endwhile; ?>
							
									<?php get_template_part( 'post-format/pagination' ); ?>
									
								<?php else : ?>

									<h2><?php esc_html_e('No Posts Found', 'cosmetsy') ?></h2>

								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
				<div class="site-main-body blog">
					<div class="row">
						<div class="col-12 col-lg-3 order-xs-2">
							<div id="sidebar-primary" class="site-sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
								<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
									<?php dynamic_sidebar( 'blog-sidebar' ); ?>
								<?php } ?>
							</div>
						</div>
						<div class="col-12 col-lg-9 order-xs-1">
							<div class="site-post-archive size-large algin-inherit">
								<div class="row">
									<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

										<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

									<?php endwhile; ?>
								
										<?php get_template_part( 'post-format/pagination' ); ?>
										
									<?php else : ?>

										<h2><?php esc_html_e('No Posts Found', 'cosmetsy') ?></h2>

									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="site-main-body blog">
					<div class="row">
						<div class="col-12 col-lg-10 offset-lg-1">
							<div class="site-post-archive size-large algin-inherit">
								<div class="row">
									<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

										<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

									<?php endwhile; ?>
								
										<?php get_template_part( 'post-format/pagination' ); ?>
										
									<?php else : ?>

										<h2><?php esc_html_e('No Posts Found', 'cosmetsy') ?></h2>

									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
	</div>

<?php get_footer(); ?>