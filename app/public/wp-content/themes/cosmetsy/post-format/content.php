<div class="col col-12 site-element">
	<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?> itemscope="itemscope" itemtype="http://schema.org/Article">
		
		<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
			<figure class="entry-media">
				<?php  
				$att=get_post_thumbnail_id();
				$image_src = wp_get_attachment_image_src( $att, 'full' );
				$image_src = $image_src[0]; 
				?>
				<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image_src); ?>" alt="<?php the_title_attribute(); ?>"></a>
			</figure>
		<?php } ?>
		
		<div class="content-align">
			<div class="entry-wrapper">

				<div class="entry-meta top">
					<span class="meta-item entry-published" itemprop="datePublished">
						<a href="<?php the_permalink(); ?>" itemprop="url"><?php echo get_the_date(); ?></a>
					</span>
					
					<?php if(has_category()){ ?>
						<span class="category"><?php the_category(', '); ?></span>
					<?php } ?>
					
					<?php the_tags( '<span class="tags">', ', ', ' </span>'); ?>
					
					<?php if ( is_sticky()) {
						printf( '<span class="sticky">%s</span>', esc_html__('Featured', 'cosmetsy' ) );
					} ?>
				</div>
				
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

				<div class="entry-content">
					<div class="klb-post">
						<?php the_excerpt(); ?>
						<?php wp_link_pages(array('before' => '<div class="klb-pagination">' . esc_html__( 'Pages:', 'cosmetsy' ),'after'  => '</div>', 'next_or_number' => 'number')); ?>
					</div>
				</div>

			</div>
		</div>
	</article>
</div>