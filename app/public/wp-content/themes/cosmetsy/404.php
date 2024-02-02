<?php
/**
 * 404.php
 * @package WordPress
 * @subpackage Cosmetsy
 * @since Cosmetsy 1.0
 */
?>

<?php get_header(); ?>

<div class="module-border hide-mobile">
	<div class="container">
		<div class="module-border--inner"></div>
	</div>
</div>
<div class="page-not-found">
	<div class="page-not-found--inner">
		<h1 class="entry-title"><?php esc_html_e('404','cosmetsy'); ?></h1>
		<h2 class="entry-subtitle"><?php esc_html_e('That page can\'t be found','cosmetsy'); ?></h2>
		<div class="entry-description">
			<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try to search for what you are looking for?','cosmetsy'); ?></p>
		</div>

		<?php get_search_form(); ?>
		
		<a href="<?php echo esc_url( home_url('/') ); ?>" class="button light"><?php esc_html_e('Go To Homepage','cosmetsy'); ?></a>
	</div>
</div>

<?php get_footer(); ?>