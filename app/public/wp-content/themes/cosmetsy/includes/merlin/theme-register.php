<?php 

function cosmetsy_get_registered_purchase_code() {
	return get_option( 'envato_purchase_code_30886890' );
}

add_action( 'admin_menu', 'cosmetsy_register_theme' );
function cosmetsy_register_theme() {
	add_submenu_page( 'themes.php', 'Register Theme', 'Register Theme', 'manage_options', 'register-theme', 'cosmetsy_register_theme_options' );
}

function cosmetsy_register_theme_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	

	echo '<div class="" id="klb-theme-registration">';
	echo '<div id="col-left">';

	if(empty(cosmetsy_get_registered_purchase_code())){
		echo '<form action="" method="post" id="purchase_code_form">';
		echo '<h1>'.esc_html__('Register Theme','cosmetsy').'</h1>';
		echo '<p style="max-width: 500px;">'.esc_html__('You\'re almost done. Just one more step. In order to gain full access to all demos, 
		premium plugins and support, please register your theme\'s purchase code.','cosmetsy').'</p>';
		echo '<h2>'.esc_html__('Your Envato Purchase Code','cosmetsy').'</h2>';
		
		echo '<p>';
		echo '<input class="regular-text code" type="text" name="purchase_code" id="purchase_code" value=""> ';
		echo '<a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">'.esc_html__('Where to find the code?','cosmetsy').'</a>';
		echo '</p>';
		
		echo '<p>';
		echo '<label>';
		echo '<input type="checkbox" id="klb-accept-license-terms">'.esc_html__('I confirm that, according to the Envato License Terms, I am licensed to use the purchase code for a single project. Using it on multiple installations is a copyright violation.','cosmetsy').'</label>';
		echo '<a href="https://themeforest.net/licenses/terms/regular" target="_blank">'.esc_html__('License details.','cosmetsy').'</a>';
		echo '</p>';
		
		echo '<p class="klb-actions">';
		echo '<button class="button button-primary button-hero" id="klb-register-theme" disabled="disabled">'.esc_html__('Register Theme','cosmetsy').'</button>';
		echo '</p>';

		wp_nonce_field( 'register_theme_my_action', 'register_theme_nonce_field' );

		echo '</form>';
	} else {
		echo '<div class="c-inner">';
		echo '<h2>'.esc_html__('The theme registered','cosmetsy').'</h2>';
		echo esc_html__('Envato allows 1 license for 1 project located on 1 domain. It means that 1 purchase key can be used only for 1 site. Each additional site will require an additional purchase key.','cosmetsy');
		echo '</div>';
		?>
		<div class="c-inner">

			<h2 class="c-title"><?php esc_html_e( 'Help Center', 'cosmetsy' ); ?></h2>
			<a class="c-link" target="_blank" href="https://klbtheme.ticksy.com/"><?php esc_html_e( 'Open a New Ticket', 'cosmetsy' ); ?></a>

			<p class="c-text"><?php esc_html_e( 'If you need support with using the theme,
			please visit the links below. If you are having trouble with the installation, please read the documentation.', 'cosmetsy' ); ?></p>


			<h4 class="c-title"><?php esc_html_e( 'Theme Documentation', 'cosmetsy' ); ?></h4>
			<a class="c-link" target="_blank" href="https://klbtheme.com/cosmetsy/documentation/"><?php esc_html_e( 'Theme Documentation', 'cosmetsy' ); ?></a>

			<h4><?php esc_html_e( 'WooCommerce Documentations', 'cosmetsy' ); ?></h4>
			<p><a target="_blank" href="https://docs.woocommerce.com/documentation/plugins/woocommerce/getting-started/setup-products/"><?php esc_html_e( 'Set Up Products', 'cosmetsy' ); ?></a></p>
			<p><a target="_blank" href="https://docs.woocommerce.com/documentation/plugins/woocommerce/getting-started/sell-products/"><?php esc_html_e( 'Sell Products', 'cosmetsy' ); ?></a></p>
			<p><a target="_blank" href="https://docs.woocommerce.com/document/shop-currency/"><?php esc_html_e('Currency','cosmetsy'); ?></a></p>
			<p><a target="_blank" href="https://docs.woocommerce.com/documentation/plugins/woocommerce/getting-started/shipping/core-shipping-options/"><?php esc_html_e('Core Shipping Options','cosmetsy'); ?></a></p>
			<p><a target="_blank" href="https://docs.woocommerce.com/documentation/plugins/woocommerce/getting-started/sell-products/core-payment-options/"><?php esc_html_e('Core Payment Options','cosmetsy'); ?></a></p>
			<p><a target="_blank" href="https://docs.woocommerce.com/documentation/plugins/woocommerce/getting-started/managing-orders/"><?php esc_html_e('Managing Orders','cosmetsy'); ?></a></p>


			<h4 class="c-title"><?php esc_html_e( 'Plugin Documentations', 'cosmetsy' ); ?></h4>
			<p><a target="_blank" href="https://elementor.com/help/how-to-use-elementor/"><?php esc_html_e( 'Elementor', 'cosmetsy' ); ?></a></p>
			<p><a target="_blank" href="https://klbtheme.ticksy.com/article/15398/"><?php esc_html_e('Translate the Theme','cosmetsy'); ?></a></p>
			<p><a target="_blank" href="https://klbtheme.ticksy.com/article/12940/"><?php esc_html_e('How To Change Google Fonts','cosmetsy'); ?></a></p>
			<p><a target="_blank" href="https://contactform7.com/docs/"><?php esc_html_e( 'Contact Form 7', 'cosmetsy' ); ?></a></p>
		
		</div>
	<?php }

	echo '</div>';
	echo '<div id="col-right">';
	echo '<iframe width="540" height="600" src="https://33361513.sibforms.com/serve/MUIEALoJ0wnxku9u3ep-cbgDG6MIt27QNxpok1LrpapS7-mTFeDgTFssS2yLVDugSsWlhqjlHDpf4x64TrtHvOBvZzacxXZTQrfkYjgp-tbzFIF8tmHjg3ot7tC8Gq-cnYJBpZNoM0DmJ_wV68vZ0bVzayMF-xmQFJAJuD3bGkanAL6Kgu5S0Ow2WGbBVQi4FspSmLugX519y9BU" frameborder="0" scrolling="auto" allowfullscreen style="display: block;max-width: 100%;"></iframe>';
	echo '</div>';
	echo '</div>';
	
	if(isset($_POST['purchase_code'])) { 
		$purchase_code = $_POST['purchase_code'];
	} else {
		$purchase_code = '';
	}
	
	if(isset($_POST['purchase_code']) && wp_verify_nonce( $_POST['register_theme_nonce_field'], 'register_theme_my_action' )) {
		
		$api_endpoint = 'http://api.klbtheme.com/wp-json/klb/v1/purchase/';

		$request = wp_remote_get( $api_endpoint . $purchase_code, array(
			'method'    => 'GET',
			'timeout'   => 30,
			'body' => array(
				'domain' => home_url(),
			),
		) );

		if ( is_wp_error( $request ) ) {
			return new WP_Error( 'klbtheme_api_error', "There is a problem contacting the KlbTheme server. Automatic registration is not possible." );
		}
		
		$response_code = wp_remote_retrieve_response_code( $request );
		
		if ( 200 !== $response_code ) {
			$response_data = json_decode( wp_remote_retrieve_body( $request ), true );
			echo '<div class="data-response">'.esc_html($response_data['message']).'</div>';
			return new WP_Error( $response_data['code'], $response_data['message'] . ' Automatic registration is not possible.' );
		}
		
		echo '<div class="data-response success">'.esc_html__('The theme registered succesfully','cosmetsy').'</div>';
		update_option( 'envato_purchase_code_30886890', $purchase_code );
	}
}


function cosmetsy_is_theme_registered() {
	$purchase_code =  cosmetsy_get_registered_purchase_code();
	$registered_by_purchase_code =  ! empty( $purchase_code );

	// Purchase code entered correctly.
	if ( $registered_by_purchase_code ) {
		return true;
	}
}

/**
 * Filter TGMPA action links.
 */
 
$cosmetsy_tgmpa_prefix = ( defined( 'WP_NETWORK_ADMIN' ) && WP_NETWORK_ADMIN ) ? 'network_admin_' : '';
add_filter( 'tgmpa_' . $cosmetsy_tgmpa_prefix . 'plugin_action_links', 'cosmetsy_tgmpa_filter_action_links', 10, 4 );
function cosmetsy_tgmpa_filter_action_links( $action_links, $item_slug, $item, $view_context ) {
	$source = ! empty( $item['source'] ) ? $item['source'] : '';

	// Prevent installing theme's premium plugins.
	if ( 'External Source' === $source && ! cosmetsy_is_theme_registered() ) {
		$action_links = array(
			'cosmetsy_registration_required' => sprintf( __( '<a style="color: #ff0000;" href="%s">Register theme to unblock it</a>', 'cosmetsy' ), esc_url( admin_url( 'themes.php?page=register-theme' ) ) ),
		);
	}

	return $action_links;
}

/**
 * Admin Notice
 */
add_action('admin_notices', 'cosmetsy_notice_for_activation');
function cosmetsy_notice_for_activation() {

	if(empty(cosmetsy_get_registered_purchase_code())){

		echo '<div class="notice notice-warning">
			<p>' . sprintf(
			esc_html__( 'Enter your Envato Purchase Code to receive Theme and plugin updates %s', 'cosmetsy' ),
			'<a href="' . admin_url('themes.php?page=register-theme') . '">' . esc_html__( 'Enter Purchase Code', 'cosmetsy' ) . '</a>') . '</p>
		</div>';
	}
}