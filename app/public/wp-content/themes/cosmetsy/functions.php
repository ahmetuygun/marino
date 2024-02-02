<?php
/**
 * functions.php
 * @package WordPress
 * @subpackage Cosmetsy
 * @since Cosmetsy 1.8.1
 * 
 */

/*************************************************
## Admin style and scripts  
*************************************************/ 

function cosmetsy_admin_styles() {
	wp_enqueue_style('cosmetsy-klbtheme',  get_template_directory_uri() .'/assets/css/admin/klbtheme.css');
	wp_enqueue_script('cosmetsy-init', 	   get_template_directory_uri() .'/assets/js/init.js', array('jquery','media-upload','thickbox'));
    wp_enqueue_script('cosmetsy-register', get_template_directory_uri() . '/assets/js/admin/register.js', array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'cosmetsy_admin_styles');

 /*************************************************
## Cosmetsy Fonts
*************************************************/
function cosmetsy_fonts_url_dmsans() {
	$fonts_url = '';

	$dmsans = _x( 'on', 'DM Sans font: on or off', 'cosmetsy' );		

	if ( 'off' !== $dmsans ) {
		$font_families = array();

		if ( 'off' !== $dmsans ) {
		$font_families[] = 'DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700';
		}
		
		$query_args = array( 
		'family' => rawurldecode( implode( '|', $font_families ) ), 
		'subset' => rawurldecode( 'latin,latin-ext' ), 
		); 
		 
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css2' );
	}
 
	return esc_url_raw( $fonts_url );
}

function cosmetsy_fonts_url_crimson() {
	$fonts_url = '';

	$crimson = _x( 'on', 'Crimson font: on or off', 'cosmetsy' );	

	if ( 'off' !== $crimson ) {
		$font_families = array();

		if ( 'off' !== $crimson ) {
		$font_families[] = 'Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700';
		}
		
		$query_args = array( 
		'family' => rawurldecode( implode( '|', $font_families ) ), 
		'subset' => rawurldecode( 'latin,latin-ext' ), 
		); 
		 
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css2' );
	}
 
	return esc_url_raw( $fonts_url );
}

/*************************************************
## Styles and Scripts
*************************************************/ 
define('COSMETSY_INDEX_CSS', 	  get_template_directory_uri()  . '/assets/css');
define('COSMETSY_INDEX_JS', 	  get_template_directory_uri()  . '/assets/js');
define('COSMETSY_INDEX_FONTS',    get_template_directory_uri()  . '/assets/fonts');

function cosmetsy_scripts() {

	if ( is_admin_bar_showing() ) {
		wp_enqueue_style( 'cosmetsy-klbtheme', COSMETSY_INDEX_CSS . '/admin/klbtheme.css', false, '1.0');    
	}	

	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	wp_enqueue_style( 'cosmetsy-base', 			COSMETSY_INDEX_CSS . '/base.css', false, '1.0');
	wp_style_add_data( 'cosmetsy-base', 'rtl', 'replace' );
	wp_enqueue_style( 'cosmetsy-font-dmsans',  	cosmetsy_fonts_url_dmsans(), array(), null );
	wp_enqueue_style( 'cosmetsy-font-crimson',  cosmetsy_fonts_url_crimson(), array(), null );
	wp_enqueue_style( 'cosmetsy-style',         get_stylesheet_uri() );
	wp_style_add_data( 'cosmetsy-style', 'rtl', 'replace' );

	$mapkey = get_theme_mod('cosmetsy_mapapi');

	wp_enqueue_script( 'imagesloaded');
	wp_enqueue_script( 'gsap',    	    		 	  COSMETSY_INDEX_JS . '/vendor/gsap.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'jquery-magnific-popup',  	  COSMETSY_INDEX_JS . '/vendor/jquery.magnific-popup.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'perfect-scrollbar',    	 	  COSMETSY_INDEX_JS . '/vendor/perfect-scrollbar.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'slick',    	    	 	 	  COSMETSY_INDEX_JS . '/vendor/slick.min.js', array('jquery'), '1.0', true);
	wp_register_script( 'cosmetsy-counter',   	 	  COSMETSY_INDEX_JS . '/custom/counter.js', array('jquery'), '1.0', true);
	wp_register_script( 'cosmetsy-plus-minus',   	  COSMETSY_INDEX_JS . '/custom/plus_minus.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'cosmetsy-shopsidebar',   	  COSMETSY_INDEX_JS . '/custom/shopsidebar.js', array('jquery'), '1.0', true);
	wp_register_script( 'cosmetsy-loginform',    	  COSMETSY_INDEX_JS . '/custom/loginform.js', array('jquery'), '1.0', true);
	wp_register_script( 'cosmetsy-accordion-tabs',    COSMETSY_INDEX_JS . '/custom/accordion-tabs.js', array('jquery'), '1.0', true);
	wp_register_script( 'cosmetsy-googlemap',    '//maps.googleapis.com/maps/api/js?key='. $mapkey .'', array('jquery'), '1.0', true);
	wp_enqueue_script( 'cosmetsy-bundle',     	 	  COSMETSY_INDEX_JS . '/bundle.js', array('jquery'), '1.0', true);

}
add_action( 'wp_enqueue_scripts', 'cosmetsy_scripts' );

/*************************************************
## Theme Setup
*************************************************/ 

if ( ! isset( $content_width ) ) $content_width = 960;

function cosmetsy_theme_setup() {
	
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'post-formats', array('gallery', 'audio', 'video'));
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'woocommerce', array('gallery_thumbnail_image_width' => 99,'thumbnail_image_width' => 90,) );
	load_theme_textdomain( 'cosmetsy', get_template_directory() . '/languages' );
	remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'cosmetsy_theme_setup' );


/*************************************************
## Include the TGM_Plugin_Activation class.
*************************************************/ 

require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'cosmetsy_register_required_plugins' );

function cosmetsy_register_required_plugins() {

	$url = 'http://klbtheme.com/cosmetsy/plugins/';
	$mainurl = 'http://klbtheme.com/plugins/';

	$plugins = array(
		
        array(
            'name'                  => esc_html__('Meta Box','cosmetsy'),
            'slug'                  => 'meta-box',
        ),

        array(
            'name'                  => esc_html__('Contact Form 7','cosmetsy'),
            'slug'                  => 'contact-form-7',
        ),
		
		array(
            'name'                  => esc_html__('WooCommerce Wishlist','cosmetsy'),
            'slug'                  => 'ti-woocommerce-wishlist',
        ),
		
        array(
            'name'                  => esc_html__('Kirki','cosmetsy'),
            'slug'                  => 'kirki',
        ),
		
		array(
            'name'                  => esc_html__('MailChimp Subscribe','cosmetsy'),
            'slug'                  => 'mailchimp-for-wp',
        ),
		
        array(
            'name'                  => esc_html__('Elementor','cosmetsy'),
            'slug'                  => 'elementor',
        ),
		
        array(
            'name'                  => esc_html__('WooCommerce','cosmetsy'),
            'slug'                  => 'woocommerce',
        ),
		
		array(
            'name'                  => esc_html__('Instagram Feed','cosmetsy'),
            'slug'                  => 'instagram-feed',
        ),

        array(
            'name'                  => esc_html__('Cosmetsy Core','cosmetsy'),
            'slug'                  => 'cosmetsy-core',
            'source'                => $url . 'cosmetsy-core.zip',
            'required'              => false,
            'version'               => '1.3.4',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),

        array(
            'name'                  => esc_html__('Envato Market','cosmetsy'),
            'slug'                  => 'envato-market',
            'source'                => $mainurl . 'envato-market.zip',
            'required'              => true,
            'version'               => '2.0.11',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),


	);

	$config = array(
		'id'           => 'cosmetsy',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

/*************************************************
## Cosmetsy Register Menu 
*************************************************/

function cosmetsy_register_menus() {
	register_nav_menus( array( 'main-menu' 	   => esc_html__('Primary Navigation Menu','cosmetsy')) );

	$topheader = get_theme_mod('cosmetsy_top_header','0');
	if($topheader == '1'){
		register_nav_menus( array( 'canvas-bottom' 	   => esc_html__('Canvas Bottom','cosmetsy')) );
		register_nav_menus( array( 'top-right-menu'    => esc_html__('Top Right Menu','cosmetsy')) );
		register_nav_menus( array( 'top-left-menu'     => esc_html__('Top Left Menu','cosmetsy')) );
	}
}
add_action('init', 'cosmetsy_register_menus');

/*************************************************
## Cosmetsy Menu
*************************************************/ 
class cosmetsy_description_walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'',
			( $display_depth % 2  ? '' : '' ),
			( $display_depth >=2 ? '' : '' ),
			
			);
		$class_names = implode( ' ', $classes );
	  
		// build html
		$output .= "\n" . $indent . '<ul class="sub-menu">' . "\n";
	}

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
      function start_el(&$output, $object, $depth = 0, $args = Array() , $current_object_id = 0) {
           
           global $wp_query;

           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';
		   
		   $classes = empty( $object->classes ) ? array() : (array) $object->classes;
           $icon_class = $classes[0];
		   $classes = array_slice($classes,1);
		   
		   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
		   
		   if ( $args->has_children ) {
		   $class_names = 'class="dropdown '.esc_attr($icon_class).' '. esc_attr( $class_names ) . '"';
		   } else {
		   $class_names = 'class="'.esc_attr($icon_class).' '. esc_attr( $class_names ) . '"';
		   }
			
			$output .= $indent . '<li ' . $value . $class_names .'>';

			$datahover = str_replace(' ','',$object->title);


			$attributes  = ! empty( $object->url ) ? ' href="'   . esc_attr( $object->url ) .'"' : '';
            $attributes .= ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
            $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
            $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
				
			$object_output = $args->before;

			$object_output .= '<a'. $attributes .'  >';
			$object_output .= $args->link_before .  apply_filters( 'the_title', $object->title, $object->ID ) . '';
	        $object_output .= $args->link_after;
			$object_output .= '</a>';


			$object_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );            	              	
      }
}



/*************************************************
## Excerpt More
*************************************************/ 

function cosmetsy_excerpt_more($more) {
  global $post;
  return '<div class="klb-readmore entry-button"><a class="button light alt medium" href="'. esc_url(get_permalink($post->ID)) . '">' . esc_html__('Read More', 'cosmetsy') . '</a></div>';
  }
 add_filter('excerpt_more', 'cosmetsy_excerpt_more');
 
/*************************************************
## Word Limiter
*************************************************/ 
function cosmetsy_limit_words($string, $limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $limit));
}

/*************************************************
## Widgets
*************************************************/ 

function cosmetsy_widgets_init() {
	register_sidebar( array(
	  'name' => esc_html__( 'Blog Sidebar', 'cosmetsy' ),
	  'id' => 'blog-sidebar',
	  'description'   => esc_html__( 'These are widgets for the Blog page.','cosmetsy' ),
	  'before_widget' => '<div class="widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Shop Sidebar', 'cosmetsy' ),
	  'id' => 'shop-sidebar',
	  'description'   => esc_html__( 'These are widgets for the Shop.','cosmetsy' ),
	  'before_widget' => '<div class="widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer First Column', 'cosmetsy' ),
	  'id' => 'footer-1',
	  'description'   => esc_html__( 'These are widgets for the Footer.','cosmetsy' ),
	  'before_widget' => '<div class="klbfooterwidget widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer Second Column', 'cosmetsy' ),
	  'id' => 'footer-2',
	  'description'   => esc_html__( 'These are widgets for the Footer.','cosmetsy' ),
	  'before_widget' => '<div class="klbfooterwidget widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer Third Column', 'cosmetsy' ),
	  'id' => 'footer-3',
	  'description'   => esc_html__( 'These are widgets for the Footer.','cosmetsy' ),
	  'before_widget' => '<div class="klbfooterwidget widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer Fourth Column', 'cosmetsy' ),
	  'id' => 'footer-4',
	  'description'   => esc_html__( 'These are widgets for the Footer.','cosmetsy' ),
	  'before_widget' => '<div class="klbfooterwidget widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer Fifth Column', 'cosmetsy' ),
	  'id' => 'footer-5',
	  'description'   => esc_html__( 'These are widgets for the Footer.','cosmetsy' ),
	  'before_widget' => '<div class="klbfooterwidget widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h4 class="widget-title">',
	  'after_title'   => '</h4>'
	) );
}
add_action( 'widgets_init', 'cosmetsy_widgets_init' );
 
/*************************************************
## Cosmetsy Comment
*************************************************/

if ( ! function_exists( 'cosmetsy_comment' ) ) :
 function cosmetsy_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
   case 'pingback' :
   case 'trackback' :
  ?>

   <article class="post pingback">
   <p><?php esc_html_e( 'Pingback:', 'cosmetsy' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( '(Edit)', 'cosmetsy' ), ' ' ); ?></p>
  <?php
    break;
   default :
  ?>
  
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<div class="comments-box">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<img src="<?php echo get_avatar_url( $comment, 90 ); ?>" alt="<?php comment_author(); ?>" class="avatar">
						<b class="fn"><?php comment_author(); ?></b>
						<div class="comment-metadata">
							<time><?php comment_date(); ?></time>
						</div>
					</div>
				</footer>
				<div class="comment-content">
					<div class="klb-post">
						<?php comment_text(); ?>
						<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'cosmetsy' ); ?></em>
						<?php endif; ?>
					</div>
				</div><!-- comment-content -->
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- reply -->
			</div>
		</div>
	</li>

  <?php
    break;
  endswitch;
 }
endif;

/*************************************************
## Cosmetsy Widget Count Filter
 *************************************************/

function cosmetsy_cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span class="catcount">(', $links);
  $links = str_replace(')', ')</span>', $links);
  return cosmetsy_sanitize_data($links);
}
add_filter('wp_list_categories', 'cosmetsy_cat_count_span');
 
function cosmetsy_archive_count_span( $links ) {
	$links = str_replace( '</a>&nbsp;(', '</a><span class="catcount">(', $links );
	$links = str_replace( ')', ')</span>', $links );
	return cosmetsy_sanitize_data($links);
}
add_filter( 'get_archives_link', 'cosmetsy_archive_count_span' );


/*************************************************
## Pingback url auto-discovery header for single posts, pages, or attachments
 *************************************************/
function cosmetsy_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'cosmetsy_pingback_header' );

/************************************************************
## DATA CONTROL FROM PAGE METABOX OR ELEMENTOR PAGE SETTINGS
*************************************************************/
function cosmetsy_page_settings( $opt_id){
	
	if ( class_exists( '\Elementor\Core\Settings\Manager' ) ) {
		// Get the current post id
		$post_id = get_the_ID();

		// Get the page settings manager
		$page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

		// Get the settings model for current post
		$page_settings_model = $page_settings_manager->get_model( $post_id );

		// Retrieve the color we added before
		$output = $page_settings_model->get_settings( 'cosmetsy_elementor_'.$opt_id );
		
		return $output;
	}
}

/************************************************************
## Elementor Get Templates
*************************************************************/
function cosmetsy_get_elementor_template($template_id){
	if($template_id){
	    $frontend = new \Elementor\Frontend;
	    printf( '<div class="cosmetsy-elementor-template template-'.esc_attr($template_id).'">%1$s</div>', $frontend->get_builder_content_for_display( $template_id, true ) );

	    if ( class_exists( '\Elementor\Plugin' ) ) {
	        $elementor = \Elementor\Plugin::instance();
	        $elementor->frontend->enqueue_styles();
			$elementor->frontend->enqueue_scripts();
	    }
	
	    if ( class_exists( '\ElementorPro\Plugin' ) ) {
	        $elementor_pro = \ElementorPro\Plugin::instance();
	        $elementor_pro->enqueue_styles();
	        $elementor_pro->enqueue_scripts();
	    }

	}

}
add_action( 'cosmetsy_before_main_shop', 'cosmetsy_get_elementor_template', 10);
add_action( 'cosmetsy_after_main_shop', 'cosmetsy_get_elementor_template', 10);
add_action( 'cosmetsy_before_main_footer', 'cosmetsy_get_elementor_template', 10);
add_action( 'cosmetsy_after_main_footer', 'cosmetsy_get_elementor_template', 10);
add_action( 'cosmetsy_before_main_header', 'cosmetsy_get_elementor_template', 10);
add_action( 'cosmetsy_after_main_header', 'cosmetsy_get_elementor_template', 10);

/************************************************************
## Do Action for Templates and Product Categories
*************************************************************/
function cosmetsy_do_action($hook){
	
	if ( !class_exists( 'woocommerce' ) ) {
		return;
	}

	$categorytemplate = get_theme_mod('cosmetsy_elementor_template_each_shop_category');
	if(is_product_category()){
		if($categorytemplate && array_search(get_queried_object()->term_id, array_column($categorytemplate, 'category_id')) !== false){
			foreach($categorytemplate as $c){
				if($c['category_id'] == get_queried_object()->term_id){
					do_action( $hook, $c[$hook.'_elementor_template_category']);
				}
			}
		} else {
			do_action( $hook, get_theme_mod($hook.'_elementor_template'));
		}
	} else {
		do_action( $hook, get_theme_mod($hook.'_elementor_template'));
	}
	
}

/*************************************************
## Cosmetsy Get Image
*************************************************/
function cosmetsy_get_image($image){
	$app_image = ! wp_attachment_is_image($image) ? $image : wp_get_attachment_url($image);
	
	return esc_html($app_image);
}

/*************************************************
## Cosmetsy Get options
*************************************************/
function cosmetsy_get_option(){	
	$getopt  = isset( $_GET['opt'] ) ? $_GET['opt'] : '';

	return esc_html($getopt);
}

/*************************************************
## Cosmetsy Column options
*************************************************/
function cosmetsy_get_column_option(){	
	$getopt  = isset( $_GET['column'] ) ? $_GET['column'] : '';

	return esc_html($getopt);
}

if(cosmetsy_get_column_option()){
	add_filter('loop_shop_columns', 'loop_columns', 999);
	if (!function_exists('loop_columns')) {
		function loop_columns() {
			return cosmetsy_get_column_option(); // 3 products per row
		}
	}
}

/*************************************************
## Cosmetsy Theme options
*************************************************/

	require_once get_template_directory() . '/includes/metaboxes.php';
	require_once get_template_directory() . '/includes/woocommerce.php';
	require_once get_template_directory() . '/includes/woocommerce-filter.php';
	require_once get_template_directory() . '/includes/sanitize.php';
	require_once get_template_directory() . '/includes/merlin/theme-register.php';
	require_once get_template_directory() . '/includes/merlin/setup-wizard.php';
	require_once get_template_directory() . '/includes/pjax/filter-functions.php';
	require_once get_template_directory() . '/includes/header/main-header.php';
	require_once get_template_directory() . '/includes/footer/main-footer.php';