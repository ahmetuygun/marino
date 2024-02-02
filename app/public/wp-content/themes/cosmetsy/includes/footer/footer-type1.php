<footer class="site-footer">
	<?php if(get_theme_mod('cosmetsy_top_footer_title') || get_theme_mod('cosmetsy_top_footer_text')){ ?>
		<?php if(cosmetsy_page_settings('footer_instagram') == 'yes'){ ?>
		<div class="footer-instagram klbtype-2">
			<div class="container">
				<div class="site-footer--wrapper klbtype-2">
					<div class="site-instagram klbtype-2">
						<span><?php echo esc_html(get_theme_mod('cosmetsy_top_footer_title')); ?></span>
						<h3 class="entry-title klbtype-2"><?php echo esc_html(get_theme_mod('cosmetsy_top_footer_subtitle')); ?></h3>
						<?php echo do_shortcode('['.get_theme_mod('cosmetsy_top_footer_text').']'); ?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	<?php } ?>
	<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) || is_active_sidebar( 'footer-4' )) { ?>
		<div class="footer-widgets">
			<div class="container">
				<div class="site-footer--wrapper">
					<div class="row">


					<?php if(get_theme_mod('cosmetsy_footer_column') == '3columns'){ ?>
						<div class="col col-12 col-lg-4">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>

						<div class="col col-12 col-lg-4">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>

						<div class="col col-12 col-lg-4">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
					<?php }elseif(get_theme_mod('cosmetsy_footer_column') == '4columns'){ ?>
						<div class="col col-12 col-lg-3">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>

						<div class="col col-12 col-lg-3">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>

						<div class="col col-12 col-lg-3">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>

						<div class="col col-12 col-lg-3">
							<?php dynamic_sidebar( 'footer-4' ); ?>
						</div>
					<?php } else { ?>
					
						<div class="col col-12 col-lg-2">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>

						<div class="col col-12 col-lg-2">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>

						<div class="col col-12 col-lg-2">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>

						<div class="col col-12 col-lg-2">
							<?php dynamic_sidebar( 'footer-4' ); ?>
						</div>

						<div class="col col-12 col-lg-4">
							<?php dynamic_sidebar( 'footer-5' ); ?>
						</div>
						
					<?php } ?>


					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	
	<div class="subfooter">
		<div class="container">
			<div class="site-footer--wrapper">
				<div class="site-copyright">
					<?php if(get_theme_mod( 'cosmetsy_copyright' )){ ?>
						<p><?php echo cosmetsy_sanitize_data(get_theme_mod( 'cosmetsy_copyright' )); ?></p>
					<?php } else { ?>
						<p><?php esc_html_e('Copyright 2021.KlbTheme . All rights reserved','cosmetsy'); ?></p>
					<?php } ?>
				</div>
				<?php $footersocial = get_theme_mod('cosmetsy_footer_social'); ?>
				<?php if(!empty($footersocial)){ ?>
					<div class="site-social">
						<ul class="text dark">
							<?php foreach($footersocial as $f){ ?>
								<li>
									<a href="<?php echo esc_url($f['social_url']); ?>" target="_blank" class="<?php echo esc_attr($f['social_icon']); ?>">
										<span class="social-icon"><i class="klb-<?php echo esc_attr($f['social_icon']); ?>"></i></span>
										<span class="social-text"><?php echo esc_html($f['social_icon']); ?></span>
										<span class="social-label"><?php esc_html_e('Follow','cosmetsy'); ?></span>
									</a>
								</li>
						<?php } ?>
						</ul>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</footer>