<?php 
/*************************************************
## Cosmetsy Typography
*************************************************/

function cosmetsy_custom_styling() { ?>

<style type="text/css">
<?php if (get_theme_mod( 'cosmetsy_shop_breadcrumb_bg' )) { ?>
.klb-shop-breadcrumb.with-background .container{
	background-image: url(<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'cosmetsy_shop_breadcrumb_bg' )) ); ?>);
}
<?php } ?>

<?php if (get_theme_mod( 'cosmetsy_mobile_sticky_header',0 ) == 1) { ?>
@media(max-width:64rem){
	header.sticky-header {
		position: fixed !important;
		top: 0;
		left: 0;
		right: 0;
	}	
}
<?php } ?>

<?php if (get_theme_mod( 'cosmetsy_middle_sticky_header',0 ) == 1) { ?>
.sticky-header .site-header--content {
    background: #fff;
    position: fixed;
    left: 0;
    right: 0;
    top: 0;
    z-index: 9;
    border-bottom: 1px solid #e3e4e6;
}
.style-4.sticky-header .site-header--content {
    background: #000;
	border-bottom: none;
}
<?php } ?>

<?php $categoryimage = get_theme_mod('cosmetsy_image_each_category'); ?>
<?php if(is_product_category() && $categoryimage && array_search(get_queried_object()->term_id, array_column($categoryimage, 'category_id')) !== false){ ?>
	<?php foreach($categoryimage as $c){ ?>
		<?php if($c['category_id'] == get_queried_object()->term_id){ ?>
			.klb-shop-breadcrumb.with-background .container{
				background-image: url(<?php echo esc_url(cosmetsy_get_image($c['category_image'])); ?>);
			}
		<?php } ?>
	<?php } ?>
<?php } ?>

<?php if (get_theme_mod( 'cosmetsy_shop_breadcrumb_bg_color' )) { ?>
.klb-shop-breadcrumb .container{
	background-color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_breadcrumb_bg_color' ) ); ?>;
}
<?php } ?>


.klb-blog-breadcrumb .container{
	background-color: #f9f3f2;
}


<?php if(get_theme_mod( 'cosmetsy_preloader_image' )){ ?>
#preloader{
	background: #fff url('<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'cosmetsy_preloader_image' )) ); ?>') no-repeat center center; 
}
<?php } ?>

<?php if (function_exists('get_wcmp_vendor_settings')) { ?>
	<?php if(is_vendor_dashboard() && is_user_logged_in()){ ?>
		.elementor-container {
			max-width: 100% !important;
		}

		.elementor-column-wrap,
		.elementor-widget-wrap {
			padding:0 !important;
		}
	<?php } ?>
<?php } ?>

<?php if (get_theme_mod( 'cosmetsy_mobile_single_sticky_cart',0 ) == 1) { ?>
@media(max-width:64rem){
	.single .site-content .product-type-simple form.cart {
	    position: fixed;
	    bottom: 0;
	    right: 0;
	    z-index: 9999;
	    background: #fff;
	    margin-bottom: 0;
	    padding: 15px;
	    -webkit-box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    justify-content: space-between;
		width: 100%;
		display: flex;
		
	}

	.single .woocommerce-variation-add-to-cart {
	    display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    position: fixed;
	    bottom: 0;
	    right: 0;
	    z-index: 9999;
	    background: #fff;
	    margin-bottom: 0;
	    padding: 15px;
	    -webkit-box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    justify-content: space-between;
    	width: 100%;
		flex-wrap: wrap;
	}
}

<?php } ?>

<?php if(get_theme_mod( 'cosmetsy_main_color' )){ ?>
:root {
  --color-primary: <?php echo esc_attr(get_theme_mod( 'cosmetsy_main_color' ) ); ?>;
  --color-header-active: <?php echo esc_attr(get_theme_mod( 'cosmetsy_main_color' ) ); ?>;
  --color-primary-menu-active: <?php echo esc_attr(get_theme_mod( 'cosmetsy_main_color' ) ); ?>;
  --color-primary-submenu-active: <?php echo esc_attr(get_theme_mod( 'cosmetsy_main_color' ) ); ?>;
  --color-button-primary: <?php echo esc_attr(get_theme_mod( 'cosmetsy_main_color' ) ); ?>;
  --color-category-color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_main_color' ) ); ?>;
}
<?php } ?>

<?php if(get_theme_mod( 'cosmetsy_button_active_color' )){ ?>
:root {
  --color-button-active: <?php echo esc_attr(get_theme_mod( 'cosmetsy_button_active_color' ) ); ?>;

}
<?php } ?>

 .site-header .site-topbar {
	background-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_top_header_bg' ) ); ?>;
}
.site-header .site-topbar .site-menu .menu .menu-item a {
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_top_header_color' ) ); ?>;	
}


.site-header .site-topbar .site-menu .menu .menu-item a:hover  {
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_top_header_hvrcolor' ) ); ?>;	
}

.site-global-notification.klbtype-1 {
	background-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_top_header_bg' ) ); ?>;
}

.site-global-notification.klbtype-1{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_top_header_color' ) ); ?>;	
}

.site-global-notification.klbtype-1:hover {
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_top_header_hvrcolor' ) ); ?>;	
}

.style-5.header-default .site-header--content , .style-5 .site-header--mobile {
	background-color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type1_bg' ) ); ?>;
}

.style-5.site-header.header-default .primary-menu.horizontal-menu .menu > .menu-item a {
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type1_color' ) ); ?>;
}

.style-5.site-header.header-default .primary-menu.horizontal-menu .menu > .menu-item a:hover {
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type1_hvrcolor' ) ); ?>;
}

.style-5.site-header.header-default .quick-button.canvas-toggle span{
	background-color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type1_icon_color' ) ); ?>;
}

.style-5.header-default .site-header--content a i,
 .style-5.site-header.header-default .quick-button.search-button i ,
 .style-5.header-default .site-header--mobile a i{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type1_icon_color' ) ); ?>;
}

.style-2.site-header .primary-menu.horizontal-menu .menu > .menu-item a{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type2_color' ) ); ?>;
}

.style-2.site-header .primary-menu.horizontal-menu .menu > .menu-item a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type2_hvrcolor' ) ); ?>;
}

.style-2.site-header .quick-button.canvas-toggle span{
	background-color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type2_icon_color' ) ); ?>;
}

.style-2 .site-header--content a i,
 .style-2.site-header .quick-button.search-button ,
 .style-2 .site-header--mobile a i{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type2_icon_color' ) ); ?>;
}

.style-2 .site-header--desktop.hide-mobile , .style-2.site-header .site-header--nav , .style-2 .site-header--mobile{
	background-color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type2_bg' ) ); ?>;

}

.site-header.style-2 .primary-menu{
	border-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type2_border_color' ) ); ?>;
}

.style-1 .site-header--content , .style-1 .site-header--content .header-search--form .search-form-input ,
.style-1 .site-header--nav , .style-1 .site-header--mobile {
	background-color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type3_bg' ) ); ?>;
}

.style-1.site-header .primary-menu.horizontal-menu .menu > .menu-item a {
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type3_color' ) ); ?>;
}

.style-1.site-header .primary-menu.horizontal-menu .menu > .menu-item a:hover {
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type3_hvrcolor' ) ); ?>;
}

.style-1.site-header .quick-button.canvas-toggle span{
	background-color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type3_icon_color' ) ); ?>;

}

.style-1 .site-header--content a i,
 .style-1 .site-header--mobile a i ,
 .style-1 .site-header--mobile .quick-button.search-button i{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type3_icon_color' ) ); ?>;
}

.style-1.site-header .quick-button.header-button a{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type3_purchase_color' ) ); ?>;
}

.style-1.site-header .quick-button.header-button a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type3_purchase_hvrcolor' ) ); ?>;
}

.site-header.header-transparent.style-4 .primary-menu.horizontal-menu .menu > .menu-item > a , .site-header.style-4 .quick-button.text .quick-label ,
.site-header.header-transparent.style-4 .quick-button , .site-header.style-4 .quick-button.text .quick-label + .cart-count  {
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type4_color' ) ); ?>;
	
}

.site-header.header-transparent.style-4 .primary-menu.horizontal-menu .menu > .menu-item > a:hover , .site-header.style-4 .quick-button.text .quick-label:hover ,
.site-header.header-transparent.style-4 .quick-button:hover , .site-header.style-4 .quick-button.text .quick-label + .cart-count:hover	{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type4_hvrcolor' ) ); ?>;
	
}

.site-header.style-4 .primary-menu.horizontal-menu .menu .sub-menu .menu-item a{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type4_submenu_color' ) ); ?>;
}

.site-header.style-4 .primary-menu.horizontal-menu .menu .sub-menu .menu-item a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type4_submenu_hvrcolor' ) ); ?>;
}

.site-header.header-transparent.style-4 .quick-button.canvas-toggle span{
	background-color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type4_icon_color' ) ); ?>;
}

.site-header.header-transparent.style-4 .site-header--mobile .quick-button > a i,
 .site-header.header-transparent.style-4 .site-header--mobile .quick-button i{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_type4_icon_color' ) ); ?>;
}


.site-offcanvas .site-scroll{
	background-color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_sidebar_menu_bg' ) ); ?>;
}

.site-scroll .site-offcanvas--main .mobile-menu .menu .menu-item a{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_sidebar_menu_color' ) ); ?>;
}

.site-scroll .site-offcanvas--main .mobile-menu .menu .menu-item a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_sidebar_menu_hvrcolor' ) ); ?>;
}

.site-scroll .site-offcanvas--main .mobile-menu .menu > .menu-item + .menu-item , .site-scroll .site-offcanvas--header .offcanvas-close{
	border-color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_sidebar_menu_border_color' ) ); ?>;
}

.site-scroll  .site-offcanvas--footer .site-social ul.icon.dark li a{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_sidebar_menu_icon_color' ) ); ?>;
}

.site-scroll  .site-offcanvas--footer .site-copyright p{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_sidebar_menu_cpy_color' ) ); ?>;
}

.site-scroll  .site-offcanvas--footer .site-copyright p:hover{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_header_sidebar_menu_cpy_hvrcolor' ) ); ?>;
}

.site-footer .footer-newsletter.klbtype-1 .site-footer--wrapper .entry-subtitle.klbtype-1{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_subscribe_title_color' ) ); ?>;
}

.site-footer .footer-newsletter.klbtype-1 .site-footer--wrapper .entry-subtitle.klbtype-1:hover{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_subscribe_title_hvrcolor' ) ); ?>;
}

.site-footer .footer-newsletter.klbtype-1 .site-footer--wrapper .entry-title.klbtype-1{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_subscribe_subtitle_color' ) ); ?>;
}

.site-footer .footer-newsletter.klbtype-1 .site-footer--wrapper .entry-title.klbtype-1:hover{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_subscribe_subtitle_hvrcolor' ) ); ?>;
}

.site-footer .footer-widgets .site-footer--wrapper .widget .widget-title{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_footer_header_color' ) ); ?>;
}

.site-footer .footer-widgets .site-footer--wrapper .widget .widget-title:hover{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_footer_header_hvrcolor' ) ); ?>;
}

.site-footer .footer-widgets .site-footer--wrapper a , 
.site-footer .footer-widgets .site-footer--wrapper .widget.widget_text .textwidget p{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_footer_color' ) ); ?>;

}

.site-footer .footer-widgets .site-footer--wrapper a:hover ,
.site-footer .footer-widgets .site-footer--wrapper .widget.widget_text .textwidget p:hover {
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_footer_hvrcolor' ) ); ?>;

}

.site-footer .subfooter .site-footer--wrapper .site-social ul li a .social-text{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_footer_social_list_color' ) ); ?>;

}

.site-footer--wrapper .site-copyright p{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_footer_cpy_color' ) ); ?>;
}

.site-footer--wrapper .site-copyright p:hover{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_footer_cpy_hvrcolor' ) ); ?>;
}

.footer-fix-nav{
	background-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_mobile_menu_bg_color' ) ); ?> !important;
}

.footer-fix-nav a i , .footer-fix-nav svg{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_mobile_menu_icon_color' ) ); ?> !important;
}

.footer-fix-nav a i:hover , .footer-fix-nav svg:hover{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_mobile_menu_icon_hvrcolor' ) ); ?> !important;
}

.footer-fix-nav .col{
	border-right-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_mobile_menu_border_color' ) ); ?> !important;
}

.site-footer .footer-newsletter , .site-footer .footer-instagram.klbtype-1::before{
	background-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_subscribe_bg_color' ) ); ?> !important;
}

.site-footer .footer-instagram .site-instagram span{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_top_footer_title_color' ) ); ?>; 
}

.site-footer .footer-instagram .site-instagram span:hover{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_top_footer_title_hvrcolor' ) ); ?>; 
}

.site-footer .footer-instagram .site-instagram .entry-title{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_top_footer_subtitle_color' ) ); ?> !important;
}

.site-footer .footer-instagram .site-instagram .entry-title:hover{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_top_footer_subtitle_hvrcolor' ) ); ?> !important;
}

.site-footer .footer-widgets, .site-footer .subfooter{
	background-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_footer_bg_color' ) ); ?>;
}

.maintenance-mode-wrapper h2.entry-title{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_maintenance_title_color' ) ); ?>;
}

.maintenance-mode-wrapper h1.entry-sub{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_maintenance_second_title_color' ) ); ?>;
}

body#error-page .maintenance-content .entry-description{
	color: <?php echo esc_attr(get_theme_mod( 'cosmetsy_maintenance_subtitle_color' ) ); ?>;
}

.single-product .site-content {
	background-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_bg_color' ) ); ?>;
}

.product-single--columns ol.flex-control-thumbs li:before{
	background-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_image_border_color' ) ); ?>;
}

.product-single .product-details--header.hot-product .entry-title{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_title_color' ) ); ?>;
}

.product-single .product-details .product-price-wrapper .in-stock{
	background-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_stock_bg_color' ) ); ?>;
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_stock_text_color' ) ); ?>;
}

.product-single .product-details .product-price-wrapper .out-of-stock{
	background-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_out_of_stock_bg_color' ) ); ?>;
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_out_of_stock_text_color' ) ); ?>;
}

.product-single .product-details .product-price-wrapper .price del{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_regular_price_color' ) ); ?>;
}

.product-single .product-details .product-price-wrapper .price ins,
.product-single .product-details .product-price-wrapper .price{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_sale_price_color' ) ); ?>;
}

.product-single .product-details .woocommerce-product-details__short-description p,
.single-product .woocommerce-tabs .woocommerce-Tabs-panel--description{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_desc_color' ) ); ?>;
}

.product-single .product-details .single_add_to_cart_button{
	background-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_button_bg_color' ) ); ?>;
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_button_text_color' ) ); ?>;
}

.product-single .product-details .single_add_to_cart_button:hover{
	background-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_button_bg_hvrcolor' ) ); ?>;
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_button_text_hvrcolor' ) ); ?>;
}

.product-single .product-details .product_meta{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_meta_title_color' ) ); ?>;
}

.product-single .product-details .product_meta > span span,
.product-single .product-details .product_meta > span a{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_meta_subtitle_color' ) ); ?>;
}

.product-single .product-details .product-actions a.tinvwl_add_to_wishlist_button{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_wishlist_color' ) ); ?>;
}

.product-single .product-details .product-actions a.tinvwl_add_to_wishlist_button:hover{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_wishlist_hvrcolor' ) ); ?>;
}

.product-single .product-details .product-actions .product-share > span{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_share_title_color' ) ); ?>;
}

.product-single .product-details .product-actions .product-share{
	border-left-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_wishlist_border_color' ) ); ?>;
}

.product-single .product-details .product-actions{
	border-top-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_wishlist_border_color' ) ); ?>;
}

.single-product .module .module--title.style-2 .module--title--inner .entry-title{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_module_title_color' ) ); ?>;
}

.single-product .module .module--title.style-2.bordered .module--title--inner{
	border-top-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_module_border_color' ) ); ?>;
}

.single-product .woocommerce-tabs ul.tabs.wc-tabs li a{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_tab_module_title_color' ) ); ?>;
}

.single-product .woocommerce-tabs ul.tabs.wc-tabs li.active a{
	color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_tab_module_title_hvrcolor' ) ); ?>;
}

.single-product .woocommerce-tabs ul.tabs.wc-tabs li.active a:after{
	background:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_tab_module_title_hvrcolor' ) ); ?>;
}

.single-product .woocommerce-tabs ul.tabs.wc-tabs{
	border-bottom-color:<?php echo esc_attr(get_theme_mod( 'cosmetsy_shop_single_tab_module_border_color' ) ); ?>;
}
</style>
<?php }
add_action('wp_head','cosmetsy_custom_styling');

?>