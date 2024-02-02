<div id="page" class="site">
	<div class="site--inner">

		<header id="masthead" class="site-header header-default style-1" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
			<div class="site-header--desktop hide-mobile">

				<div class="site-topbar">
					<div class="container">
						<div class="row align-items-center">
							<div class="col col-lg-6 col-left">
								<nav class="site-menu horizontal-menu">
									<?php 
										wp_nav_menu(array(
										'theme_location' => 'top-left-menu',
										'container' => '',
										'fallback_cb' => 'show_top_menu',
										'menu_id' => '',
										'menu_class' => 'menu',
										'echo' => true,
										'depth' => 0 
										));
									?>
								</nav>
							</div><!-- col-lg-6 -->
							<div class="col col-lg-6 col-right">
								<nav class="topbar-button language-switcher site-menu horizontal-menu">
									<?php 
										wp_nav_menu(array(
										'theme_location' => 'top-right-menu',
										'container' => '',
										'fallback_cb' => 'show_top_menu',
										'menu_id' => '',
										'menu_class' => 'menu',
										'echo' => true,
										'depth' => 0 
										));
									?>
								</nav><!-- horizontal-menu -->
							</div><!-- col-lg-6 -->
						</div><!-- row -->
					</div><!-- container -->
				</div><!-- site-topbar -->

				<div class="site-header--content">
					<div class="container">
						<div class="row align-items-center">
							<div class="col col-left">
							
								<?php $sidebarmenu = get_theme_mod('cosmetsy_header_sidebar',0); ?>
								<?php if($sidebarmenu == 1){ ?>
									<div class="quick-button canvas-toggle">
										<span></span>
										<span></span>
										<span></span>
									</div>
								<?php } ?>

								<div class="site-brand">
									<?php $elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true ); ?> 
									<?php if($elementor_page){ ?>
										<?php if(cosmetsy_page_settings('logo')['url']){ ?>
											<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<img src="<?php echo esc_url( cosmetsy_page_settings('logo')['url'] ); ?>" alt="<?php bloginfo("name"); ?>">
											</a>
										<?php }elseif (get_theme_mod( 'cosmetsy_logo' ) && cosmetsy_page_settings('page_header_style') != 'transparent') { ?>
											<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'cosmetsy_logo' )) ); ?>"  alt="<?php bloginfo("name"); ?>">
											</a>
										<?php } elseif (get_theme_mod( 'cosmetsy_logo_white' )) { ?>
											<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'cosmetsy_logo_white' )) ); ?>"  alt="<?php bloginfo("name"); ?>">
											</a>
										<?php } elseif (get_theme_mod( 'cosmetsy_logo_text' )) { ?>
											<a class="navbar-brand text" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<span class="brand-text"><?php echo esc_html(get_theme_mod( 'cosmetsy_logo_text' )); ?></span>
											</a>
										<?php } else { ?>
											<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-dark.png" width="168" height="40" alt="<?php bloginfo("name"); ?>">
											</a>
										<?php } ?>
									<?php } else { ?>
										<?php if (get_theme_mod( 'cosmetsy_logo' ) && cosmetsy_page_settings('page_header_style') != 'transparent') { ?>
											<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'cosmetsy_logo' )) ); ?>"  alt="<?php bloginfo("name"); ?>">
											</a>
										<?php } elseif (get_theme_mod( 'cosmetsy_logo_white' )) { ?>
											<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'cosmetsy_logo_white' )) ); ?>"  alt="<?php bloginfo("name"); ?>">
											</a>
										<?php } elseif (get_theme_mod( 'cosmetsy_logo_text' )) { ?>
											<a class="navbar-brand text" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<span class="brand-text"><?php echo esc_html(get_theme_mod( 'cosmetsy_logo_text' )); ?></span>
											</a>
										<?php } else { ?>
											<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-dark.png" width="168" height="40" alt="<?php bloginfo("name"); ?>">
											</a>
										<?php } ?>
									<?php } ?>
								</div>

								<div class="header-search">
									<?php echo cosmetsy_category_search_form(); ?>
								</div>

							</div><!-- col -->
							<div class="col col-right">
								<?php get_template_part( 'includes/header/models/wishlist-icon' ); ?>

								<?php get_template_part( 'includes/header/models/account-icon' ); ?>

								<?php get_template_part( 'includes/header/models/cart-icon' ); ?>
							</div><!-- col -->
						</div><!-- row -->
					</div><!-- container -->
				</div><!-- site-header--content -->

				<div class="site-header--nav">
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
								</nav><!-- horizontal-menu -->
							</div><!-- col -->
							<div class="col col-right">
								<div class="quick-button header-button">
									<?php echo cosmetsy_sanitize_data(get_theme_mod('cosmetsy_header_type1_button')); ?>
								</div>
							</div><!-- col -->
						</div><!-- row -->
					</div><!-- container -->
				</div><!-- site-header--nav -->

			</div><!-- site-header--desktop -->

			<div class="site-header--mobile hide-desktop">
				<div class="container">
					<div class="row align-items-center">
						<div class="col col-left">
							<div class="quick-button canvas-toggle">
								<span></span>
								<span></span>
								<span></span>
							</div><!-- quick-button -->
							<div class="site-brand">
								<?php if (get_theme_mod( 'cosmetsy_logo' )) { ?>
									<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
										<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'cosmetsy_logo' )) ); ?>"  alt="<?php bloginfo("name"); ?>">
									</a>
								<?php } elseif (get_theme_mod( 'cosmetsy_logo_white' )) { ?>
									<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="<?php bloginfo("name"); ?>">
										<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'cosmetsy_logo_white' )) ); ?>"  alt="<?php bloginfo("name"); ?>">
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
							</div><!-- site-brand -->
						</div><!-- col -->
						<div class="col col-right">
							<?php get_template_part( 'includes/header/models/account-icon' ); ?>

							<?php get_template_part( 'includes/header/models/search-icon' ); ?>

							<?php get_template_part( 'includes/header/models/cart-icon' ); ?>
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
			</div><!-- site-header--mobile -->
		</header><!-- site-header -->