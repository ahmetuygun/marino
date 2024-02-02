<?php get_template_part( 'includes/header/models/top-notification' ); ?>

<div id="page" class="site">
	<div class="site--inner">

		<header id="masthead" class="site-header header-transparent style-4" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
			<div class="site-header--desktop hide-mobile">

				<div class="site-header--content">
					<div class="container">
						<div class="row align-items-center">
							<div class="col col-left">
								<nav class="site-menu primary-menu horizontal-menu">
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
							</div>

							<div class="col col-middle">
								<div class="site-brand">
									<?php $elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true ); ?> 
									<?php if($elementor_page){ ?>
										<?php if(cosmetsy_page_settings('logo')['url']){ ?>
											<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<img src="<?php echo esc_url( cosmetsy_page_settings('logo')['url'] ); ?>" alt="<?php bloginfo("name"); ?>">
											</a>
										<?php }elseif (get_theme_mod( 'cosmetsy_logo_white' )) { ?>
											<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'cosmetsy_logo_white' )) ); ?>"  alt="<?php bloginfo("name"); ?>">
											</a>
										<?php } elseif (get_theme_mod( 'cosmetsy_logo' )) { ?>
											<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'cosmetsy_logo' )) ); ?>" alt="<?php bloginfo("name"); ?>">
											</a>
										<?php } elseif (get_theme_mod( 'cosmetsy_logo_text' )) { ?>
											<a class="navbar-brand text" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<span class="brand-text"><?php echo esc_html(get_theme_mod( 'cosmetsy_logo_text' )); ?></span>
											</a>
										<?php } else { ?>
											<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-light.png" width="168" height="40" alt="<?php bloginfo("name"); ?>">
											</a>
										<?php } ?>
									<?php } else { ?>
										<?php if (get_theme_mod( 'cosmetsy_logo_white' )) { ?>
											<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'cosmetsy_logo_white' )) ); ?>"  alt="<?php bloginfo("name"); ?>">
											</a>
										<?php } elseif (get_theme_mod( 'cosmetsy_logo' )) { ?>
											<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'cosmetsy_logo' )) ); ?>" alt="<?php bloginfo("name"); ?>">
											</a>
										<?php } elseif (get_theme_mod( 'cosmetsy_logo_text' )) { ?>
											<a class="navbar-brand text" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<span class="brand-text"><?php echo esc_html(get_theme_mod( 'cosmetsy_logo_text' )); ?></span>
											</a>
										<?php } else { ?>
											<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-light.png" width="168" height="40" alt="<?php bloginfo("name"); ?>">
											</a>
										<?php } ?>
									<?php } ?>
								</div>
							</div>

							<div class="col col-right">
								<?php get_template_part( 'includes/header/models/wishlist-text' ); ?>

								<?php get_template_part( 'includes/header/models/account-text' ); ?>

								<?php get_template_part( 'includes/header/models/search-text' ); ?>

								<?php get_template_part( 'includes/header/models/cart-text' ); ?>
							</div><!-- col -->
						</div><!-- row -->
					</div><!-- container -->
				</div><!-- site-header--content -->

			</div><!-- site-header--desktop -->

			<div class="site-header--mobile hide-desktop">
				<div class="container">
					<div class="row align-items-center">
						<div class="col col-3 col-left">
							<div class="quick-button canvas-toggle">
								<span></span>
								<span></span>
								<span></span>
							</div>
							<?php get_template_part( 'includes/header/models/account-icon' ); ?>
						</div><!-- col -->
						<div class="col col-6 col-middle">
							<div class="site-brand">
								<?php if (get_theme_mod( 'cosmetsy_logo_white' )) { ?>
									<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
										<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'cosmetsy_logo_white' )) ); ?>"  alt="<?php bloginfo("name"); ?>">
									</a>
								<?php } elseif (get_theme_mod( 'cosmetsy_logo' )) { ?>
									<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
										<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'cosmetsy_logo' )) ); ?>"  alt="<?php bloginfo("name"); ?>">
									</a>
								<?php } elseif (get_theme_mod( 'cosmetsy_logo_text' )) { ?>
									<a class="navbar-brand text" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
										<span class="brand-text"><?php echo esc_html(get_theme_mod( 'cosmetsy_logo_text' )); ?></span>
									</a>
								<?php } else { ?>
									<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-light.png" width="168" height="40" alt="<?php bloginfo("name"); ?>">
									</a>
								<?php } ?>
							</div>
						</div>
						<div class="col col-3 col-right">
							<?php get_template_part( 'includes/header/models/search-icon' ); ?>
							
							<?php get_template_part( 'includes/header/models/cart-icon' ); ?>
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
			</div><!-- site-header--mobile -->
		</header><!-- site-header -->