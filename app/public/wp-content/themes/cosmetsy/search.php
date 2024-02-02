<?php
/**
 * search.php
 * @package WordPress
 * @subpackage Cosmetsy
 * @since Cosmetsy 1.0
 * 
 */
 ?>

<?php get_header(); ?>

	<div class="klb-blog-breadcrumb shop-page-header style-2">
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
	
	
	<div class="container">
		<?php if( get_theme_mod( 'cosmetsy_blog_layout' ) == 'right-sidebar') { ?>
			<div class="site-main-body blog with-sidebar">
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
				
				<div id="sidebar-primary" class="site-sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
					<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
						<?php dynamic_sidebar( 'blog-sidebar' ); ?>
					<?php } ?>
				</div>
			</div>
		<?php } elseif( get_theme_mod( 'cosmetsy_blog_layout' ) == 'full-width') { ?>
			<div class="site-main-body blog">
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
		<?php } else { ?>
			<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
				<div class="site-main-body blog with-sidebar left-sidebar">
					<div id="sidebar-primary" class="site-sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
						<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'blog-sidebar' ); ?>
						<?php } ?>
					</div>
					
					<div class="site-post-archive size-large algin-inherit">
						<div class="row">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<?php  get_template_part( 'post-format/content', get_post_format() ); ?>

							<?php endwhile; ?>
						
								<?php get_template_part( 'post-format/pagination' ); ?>
								
							<?php else : ?>

								<h2><?php esc_html_e('No Posts Found', 'cosmetsy') ?></h2>
								
								<?php get_search_form(); ?>
								
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="site-main-body blog">
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
			<?php } ?>
		<?php } ?>
	</div>

<?php get_footer(); ?>