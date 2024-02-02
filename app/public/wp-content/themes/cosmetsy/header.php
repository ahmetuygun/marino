<?php
/**
 * header.php
 * @package WordPress
 * @subpackage Cosmetsy
 * @since Cosmetsy 1.0
 * 
 */
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( "charset" ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<?php get_template_part( 'includes/header/models/canvas-menu' ); ?>
  
	<?php cosmetsy_do_action( 'cosmetsy_before_main_header'); ?>

	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) { ?>
		<?php
        /**
        * Hook: cosmetsy_main_header
        *
        * @hooked cosmetsy_main_header_function - 10
        */
        do_action( 'cosmetsy_main_header' );
	
		?>
	<?php } ?>

	<?php cosmetsy_do_action( 'cosmetsy_after_main_header'); ?>

	<main id="main" class="site-primary">
		<div class="site-content">
			<div id="content" class="main-content">
