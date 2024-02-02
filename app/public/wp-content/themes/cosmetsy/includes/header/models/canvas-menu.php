<div class="site-offcanvas">
	<div class="site-scroll">
		<div class="site-offcanvas--header">
			<div class="site-brand">
				<?php if (get_theme_mod( 'cosmetsy_logo' )) { ?>
					<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
						<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'cosmetsy_logo' )) ); ?>" alt="<?php bloginfo("name"); ?>">
					</a>
				<?php } elseif (get_theme_mod( 'cosmetsy_logo_text' )) { ?>
					<a class="navbar-brand text" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
						<span class="brand-text"><?php echo esc_html(get_theme_mod( 'cosmetsy_logo_text' )); ?></span>
					</a>
				<?php } else { ?>
					<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-dark.png" width="134" height="32" alt="<?php bloginfo("name"); ?>">
					</a>
				<?php } ?>
			</div>
			<div class="offcanvas-close"><i class="klb-x"></i></div>
		</div>
		<div class="site-offcanvas--main">
			<nav class="site-menu mobile-menu vertical-menu">
				<?php 
					 wp_nav_menu(array(
					 'theme_location' => 'main-menu',
					 'container' => '',
					 'fallback_cb' => 'show_top_menu',
					 'menu_id' => '',
					 'menu_class' => 'menu',
					 'echo' => true,
					"walker" => new cosmetsy_description_walker(),
					 'depth' => 0 
					)); 
				 ?>
			</nav>
			<div class="site-switcher">
				<?php 
					 wp_nav_menu(array(
					 'theme_location' => 'canvas-bottom',
					 'container' => '',
					 'fallback_cb' => 'show_top_menu',
					 'menu_id' => '',
					 'menu_class' => 'canvas-bottom',
					 'echo' => true,
					 'depth' => 0 
					)); 
				?>
			</div>
		</div>
		<div class="site-offcanvas--footer">
			<?php $footersocial = get_theme_mod('cosmetsy_footer_social'); ?>
			<?php if(!empty($footersocial)){ ?>
				<div class="site-social">
					<ul class="icon dark">
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
			<div class="site-copyright">
				<?php if(get_theme_mod( 'cosmetsy_copyright' )){ ?>
					<p><?php echo cosmetsy_sanitize_data(get_theme_mod( 'cosmetsy_copyright' )); ?></p>
				<?php } else { ?>
					<p><?php esc_html_e('Copyright 2021.KlbTheme . All rights reserved','cosmetsy'); ?></p>
				<?php } ?>
			</div>
		</div>
	</div>
</div>