<?php
/**
 * footer.php
 * @package WordPress
 * @subpackage Cosmetsy
 * @since Cosmetsy 1.0
 * 
 */
 ?>
					</div><!-- main-content -->
				</div><!-- site-content -->
			</main><!-- site-primary -->

		<?php cosmetsy_do_action( 'cosmetsy_before_main_footer'); ?>

		<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) { ?>
			<?php
			/**
			* Hook: cosmetsy_main_footer
			*
			* @hooked cosmetsy_main_footer_function - 10
			*/
			do_action( 'cosmetsy_main_footer' );
		
			?>
		<?php } ?>

		<?php cosmetsy_do_action( 'cosmetsy_after_main_footer'); ?>

  <div class="site-overlay"></div>

  <?php wp_footer(); ?>
</body>
</html>