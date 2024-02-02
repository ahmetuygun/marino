<?php

/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package WordPress
* @subpackage Machic
* @since 1.0.0
*/

	remove_action( 'cosmetsy_main_header', 'cosmetsy_main_header_function', 10 );
	remove_action( 'cosmetsy_main_footer', 'cosmetsy_main_footer_function', 10 );

	remove_action( 'cosmetsy_before_main_shop', 'cosmetsy_get_elementor_template', 10);
	remove_action( 'cosmetsy_after_main_shop', 'cosmetsy_get_elementor_template', 10);
	remove_action( 'cosmetsy_before_main_footer', 'cosmetsy_get_elementor_template', 10);
	remove_action( 'cosmetsy_after_main_footer', 'cosmetsy_get_elementor_template', 10);
	remove_action( 'cosmetsy_before_main_header', 'cosmetsy_get_elementor_template', 10);
	remove_action( 'cosmetsy_after_main_header', 'cosmetsy_get_elementor_template', 10);

    get_header();

    while ( have_posts() ) : the_post();
        the_content();
    endwhile;

    get_footer();
?>
