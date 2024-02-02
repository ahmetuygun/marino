<?php
/**
* Plugin Name: Cosmetsy Core
* Description: Premium & Advanced Essential Elements for Elementor
* Plugin URI:  http://themeforest.net/user/KlbTheme
* Version:     1.3.4
* Author:      KlbTheme
* Author URI:  http://themeforest.net/user/KlbTheme
*/


/*
* Exit if accessed directly.
*/

if ( ! defined( 'ABSPATH' ) ) exit;

final class Cosmetsy_Elementor_Addons
{
    /**
    * Plugin Version
    *
    * @since 1.0
    *
    * @var string The plugin version.
    */
    const VERSION = '1.0.0';

    /**
    * Minimum Elementor Version
    *
    * @since 1.0
    *
    * @var string Minimum Elementor version required to run the plugin.
    */
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    /**
    * Minimum PHP Version
    *
    * @since 1.0
    *
    * @var string Minimum PHP version required to run the plugin.
    */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
    * Instance
    *
    * @since 1.0
    *
    * @access private
    * @static
    *
    * @var Cosmetsy_Elementor_Addons The single instance of the class.
    */
    private static $_instance = null;

    /**
    * Instance
    *
    * Ensures only one instance of the class is loaded or can be loaded.
    *
    * @since 1.0
    *
    * @access public
    * @static
    *
    * @return Cosmetsy_Elementor_Addons An instance of the class.
    */
    public static function instance()
    {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
    * Constructor
    *
    * @since 1.0
    *
    * @access public
    */
    public function __construct()
    {
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    /**
    * Load Textdomain
    *
    * Load plugin localization files.
    *
    * Fired by `init` action hook.
    *
    * @since 1.0
    *
    * @access public
    */
    public function i18n()
    {
        load_plugin_textdomain( 'cosmetsy-core' );
    }
	
   /**
    * Initialize the plugin
    *
    * Load the plugin only after Elementor (and other plugins) are loaded.
    * Checks for basic plugin requirements, if one check fail don't continue,
    * if all check have passed load the files required to run the plugin.
    *
    * Fired by `plugins_loaded` action hook.
    *
    * @since 1.0
    *
    * @access public
    */
    public function init()
    {
        // Check if Elementor is installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'cosmetsy_admin_notice_missing_main_plugin' ] );
            return;
        }
        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'cosmetsy_admin_notice_minimum_elementor_version' ] );
            return;
        }
        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'cosmetsy_admin_notice_minimum_php_version' ] );
            return;
        }
		
		// Categories registered
        add_action( 'elementor/elements/categories_registered', [ $this, 'cosmetsy_add_widget_category' ] );

		/* Init Include */
        require_once( __DIR__ . '/init.php' );

        /* Customizer Kirki */
        require_once( __DIR__ . '/inc/customizer.php' );

        /* Style php */
        require_once( __DIR__ . '/inc/style.php' );
		
		/* Aq Resizer Image Resize */
        require_once( __DIR__ . '/inc/aq_resizer.php' );
		
		/* Breadcrumb */
        require_once( __DIR__ . '/inc/breadcrumb.php' );
		
		/* Newsletter */
		if(get_theme_mod('cosmetsy_newsletter_popup_toggle',0) == 1){
			require_once( __DIR__ . '/inc/newsletter-popup/newsletter-main.php' );
		}
		
		/* GDPR */
		if(get_theme_mod('cosmetsy_gdpr_toggle',0) == 1){
			require_once( __DIR__ . '/inc/gdpr/gdpr-main.php' );
		}

		/* Post view for popular posts widget */
        require_once( __DIR__ . '/inc/post_view.php' );
		
        /* Popular Posts Widget */
        require_once( __DIR__ . '/widgets/widget-popular-posts.php' );
		
		/* Footer About Widget */
        require_once( __DIR__ . '/widgets/widget-footer-about.php' );
		
		/* Subscribe Form */
        require_once( __DIR__ . '/widgets/widget-subscribe-form.php' );
		
		/* Social List */
        require_once( __DIR__ . '/widgets/widget-social-list.php' );
		
		/* WooCommerce Filter */
        require_once( __DIR__ . '/woocommerce-filter/woocommerce-filter.php' );
		
		/* Maintenance */
		if(get_theme_mod('cosmetsy_maintenance_toggle', 0) == 1 || cosmetsy_ft() == 'maintenance'){
			require_once( __DIR__ . '/inc/maintenance/maintenance.php' );
		}
		
        /* Custom plugin helper functions */
        require_once( __DIR__ . '/elementor/classes/class-helpers-functions.php' );
		
        /* Custom plugin helper functions */
        require_once( __DIR__ . '/elementor/classes/class-customizing-page-settings.php' );

        // Register Widget Styles
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
		
        // Register Widget Scripts
        add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ] );
		
        // Register Widget Editor Scripts
        add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'widget_editor_scripts' ] );
		
        // Widgets registered
        add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );
		
		// Register Widget Editor Style
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'widget_editor_style' ] );
    }
	
    /**
    * Register Widgets Category
    *
    */
    public function cosmetsy_add_widget_category( $elements_manager )
    {
        $elements_manager->add_category( 'cosmetsy', ['title' => esc_html__( 'Cosmetsy Core', 'cosmetsy' )]);
    }	
	
    /**
    * Init Widgets
    *
    * Include widgets files and register them
    *
    * @since 1.0
    *
    * @access public
    */
    public function init_widgets()
    {

		// Home Slider
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-home-slider.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Home_Slider_Widget() );
		
		// Custom Title
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-breadcrumb.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Breadcrumb_Widget() );
		
		// Breadcrumb
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-custom-title.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Custom_Title_Widget() );
		
		// Image Text
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-image-text.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Image_Text_Widget() );
		
		// Image Text 2
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-image-text-2.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Image_Text_2_Widget() );
		
		// Image Text 3
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-image-text-3.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Image_Text_3_Widget() );
		
		// Image Text 4
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-image-text-4.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Image_Text_4_Widget() );
		
		// Image Text 5
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-image-text-5.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Image_Text_5_Widget() );
		
		// Product Carousel
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-product-carousel.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Product_Carousel_Widget() );
		
		// Product Carousel 2
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-product-carousel-2.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Product_Carousel_2_Widget() );
		
		// Product Grid
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-product-grid.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Product_Grid_Widget() );
		
		// Product Categories
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-product-categories.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Product_Categories_Widget() );
		
		// Latest Blog
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-latest-blog.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Latest_Blog_Widget() );
		
		// Image Box
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-image-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Image_Box_Widget() );
		
		// Button
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-button.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Button() );
		
		// Counter
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-counter.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Counter_Widget() );
		
		// Clients Box
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-clients-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Clients_Box_Widget() );
		
		// Banner Box
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-banner-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Banner_Box_Widget() );
		
		// Icon Box
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-icon-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Icon_Box_Widget() );
		
		// About Banner
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-about-banner.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_About_Banner_Widget() );
		
		// Contact Form 7
		require_once( __DIR__ . '/elementor/widgets/cosmetsy-contact-form-7.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Cosmetsy_Contact_Form_7_Widget() );

	}
	
	
    /**
    * Admin notice
    *
    * Warning when the site doesn't have Elementor installed or activated.
    *
    * @since 1.0
    *
    * @access public
    */
    public function cosmetsy_admin_notice_missing_main_plugin()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '%1$s requires %2$s to be installed and activated.', 'cosmetsy' ),
            '<strong>' . esc_html__( 'Cosmetsy Core', 'cosmetsy' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'cosmetsy' ) . '</strong>'
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin notice
    *
    * Warning when the site doesn't have a minimum required Elementor version.
    *
    * @since 1.0
    *
    * @access public
    */
    public function cosmetsy_admin_notice_minimum_elementor_version()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '%1$s requires %2$s version %3$s or greater.', 'cosmetsy' ),
            '<strong>' . esc_html__( 'Cosmetsy Core', 'cosmetsy' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'cosmetsy' ) . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin notice
    *
    * Warning when the site doesn't have a minimum required PHP version.
    *
    * @since 1.0
    *
    * @access public
    */
    public function cosmetsy_admin_notice_minimum_php_version()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '%1$s requires %2$s version %3$s or greater.', 'cosmetsy' ),
            '<strong>' . esc_html__( 'Cosmetsy Core', 'cosmetsy' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'cosmetsy' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }
	
    public function widget_styles()
    {
    }

    public function widget_scripts()
    {


		if (is_admin ()){
			wp_enqueue_media ();
			wp_enqueue_script( 'widget-image', plugins_url( 'js/widget-image.js', __FILE__ ));
		}

        // custom-scripts
		if ( is_rtl() ) {
			wp_enqueue_script( 'cosmetsy-core-custom-scripts-rtl', plugins_url( 'elementor/custom-scripts-rtl.js', __FILE__ ), true );
		} else {
			wp_enqueue_script( 'cosmetsy-core-custom-scripts', plugins_url( 'elementor/custom-scripts.js', __FILE__ ), true );
		}
    }
	
    public function widget_editor_scripts(){
		
		wp_enqueue_script( 'klb-editor-scripts', plugins_url( 'elementor/editor-scripts.js', __FILE__ ), true );

    }
	
	public function widget_editor_style(){
		
		wp_enqueue_style( 'klb-editor-style', plugins_url( 'elementor/editor-style.css', __FILE__ ), true );

    }


} 
Cosmetsy_Elementor_Addons::instance();