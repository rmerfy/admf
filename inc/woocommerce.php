<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package ADM
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function adm_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'adm_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function adm_woocommerce_scripts() {
	wp_enqueue_style( 'adm-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'adm-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'adm_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function adm_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'adm_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function adm_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'adm_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'adm_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function adm_woocommerce_wrapper_before() {
		?>
			<main class="main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'adm_woocommerce_wrapper_before' );

if ( ! function_exists( 'adm_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function adm_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'adm_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'adm_woocommerce_header_cart' ) ) {
			adm_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'adm_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function adm_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		adm_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'adm_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'adm_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function adm_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'adm' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'adm' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'adm_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function adm_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php adm_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

// cart auto update
add_action('wp_footer', 'cart_update_qty_script');

function cart_update_qty_script()
{
    if (is_cart()):
    ?>
    <script>
        jQuery('div.woocommerce').on('change', '.qty', function(){
            jQuery("[name='update_cart']").removeAttr("disabled").trigger("click");
        });
    </script>
    <?php
endif;
}

// ajax cart update

add_action('wp_ajax_update_cart_counter', 'update_cart_counter');
add_action('wp_ajax_nopriv_update_cart_counter', 'update_cart_counter');

function update_cart_counter()
{
	$response = '<span class="icon-cart"></span>';
    if(WC()->cart->get_cart_contents_count() <= 0) {
		echo $response;
        wp_die();
    }

    $response .= '<span class="cart-btn__counter">' . WC()->cart->get_cart_contents_count() . '</span>';

    echo $response;
    wp_die();
}

/**================================================================================================================================================================
 * Title: Failed order email to customer
 * Reference: https://stackoverflow.com/questions/51635878/send-cancelled-and-failed-order-email-to-customer-in-woocommerce-3
 * Reference: https://stackoverflow.com/questions/47648386/sending-email-to-customer-on-cancelled-order-in-woocommerce?fbclid=IwAR2E5-sm6w09i2PbUgx59EMgC0T_JZLHkP_WZ1x5g8qmU2MTjBVErNgAsJU
 * Note: Located in Snippets Plugin
 */

// add_action('woocommerce_order_status_changed', 'send_custom_email_notifications', 10, 4 );
// function send_custom_email_notifications( $order_id, $old_status, $new_status, $order ){
//     if ( $new_status == 'cancelled' || $new_status == 'failed' ){
//         $wc_emails = WC()->mailer()->get_emails(); // Get all WC_emails objects instances
//         $customer_email = $order->get_billing_email(); // The customer email
//     }

//     if ( $new_status == 'cancelled' ) {
//         // change the recipient of this instance
//         $wc_emails['WC_Email_Cancelled_Order']->recipient = $customer_email;
//         // Sending the email from this instance
//         $wc_emails['WC_Email_Cancelled_Order']->trigger( $order_id );
//     } 
//     elseif ( $new_status == 'failed' ) {
//         // change the recipient of this instance
//         $wc_emails['WC_Email_Failed_Order']->recipient = $customer_email;
//         // Sending the email from this instance
//         $wc_emails['WC_Email_Failed_Order']->trigger( $order_id );
//     } 
// }


/**===================================================================================================================================================================================================
 * Title: Add Customer Order Status
 * Note: Located in Snippets Plugin
 * Description & References: 
 * Add New Order Status
 * - https://www.godaddy.com/garage/how-to-create-custom-woocommerce-order-status/ 
 * CSS Order Statuses
 * - https://stackoverflow.com/questions/49333542/custom-order-status-background-button-color-in-woocommerce-3-3-admin-order-list
 *===================================================================================================================================================================================================*/


/**===================================================================================================================================================================================================
 * Reference: 
 * - See other snippet: [Add custom field (radio button - 2 choices) to checkout, order page, order list, WC PDF Plugin, order & admin emails]
 *===================================================================================================================================================================================================*/

class WooCommerceCustomOrderStatus{

	/* ------------------------------- Variables ----------------------------- */

	private $fieldlabelFrontEnd; // 'Awaiting shipment'
	private $fieldLabelBackEnd;  // 'wc-awaiting-shipment'
	private $cssClass;           // 'Awaiting shipment'
	private $fontColor;          // '#C69275'
	private $backgroundColor;    // '#ffffff'

	/* ------------------------------- Constructor ----------------------------- */

	public function __construct($fieldlabelFrontEnd, $fieldLabelBackEnd, $cssClass, $fontColor, $backgroundColor) {
		$this->fieldlabelFrontEnd = $fieldlabelFrontEnd;
		$this->fieldLabelBackEnd = $fieldLabelBackEnd;
		$this->cssClass = $cssClass;
		$this->fontColor = $fontColor;
		$this->backgroundColor = $backgroundColor;
	}




	// https://www.godaddy.com/garage/how-to-create-custom-woocommerce-order-status/ 
	// Register new status
	//add_action( 'init', 'register_order_status' );
	function register_order_status() {
		register_post_status( $this->fieldLabelBackEnd, array(
			'label'                     => $this->fieldlabelFrontEnd,
			'public'                    => true,
			'exclude_from_search'       => false,
			'show_in_admin_all_list'    => true,
			'show_in_admin_status_list' => true,
			'label_count'               => _n_noop( $this->fieldlabelFrontEnd . ' (%s)', $this->fieldlabelFrontEnd . ' (%s)' )
		) );
	}


	// Add to list of WC Order statuses
	function add_new_status_to_order_statuses( $order_statuses ) {

		$new_order_statuses = array();

		// add new order status after processing
		foreach ( $order_statuses as $key => $status ) {

			$new_order_statuses[ $key ] = $status;

			if ( 'wc-completed' === $key ) {
				$new_order_statuses[ $this->fieldLabelBackEnd ] = $this->fieldlabelFrontEnd;
			}
		}

		return $new_order_statuses;
	}

	//https://stackoverflow.com/questions/49333542/custom-order-status-background-button-color-in-woocommerce-3-3-admin-order-list
	//add_action('admin_head', 'css_new_order_status' );
	
	function css_new_order_status() {
		global $pagenow, $post;

		if( $pagenow != 'edit.php') return; // Exit
		if( get_post_type($post->ID) != 'shop_order' ) return; // Exit

		echo '
		<style id="' . $this->fieldLabelBackEnd  .'">
		.order-status.status-' . sanitize_title($this->cssClass) . ' {
			color: ' . $this->fontColor . ';
			background: ' . $this->backgroundColor . ';
			white-space: normal !important;
		}
		</style>

		';
	}
	

}


/* ------------------------------- Add new functions to WP/Plugin Hooks ----------------------------- */


function createWooCommerceCustomOrderStatus($fieldlabelFrontEnd, $fieldLabelBackEnd, $cssClass, $fontColor, $backgroundColor){

	//Create new object
	$newOrderStatus = new WooCommerceCustomOrderStatus($fieldlabelFrontEnd, $fieldLabelBackEnd, $cssClass, $fontColor, $backgroundColor);

	//Call object functions (with new data) inside WP/Plugin hooks
	//example: add_action( 'woocommerce_before_order_notes', [ $newField, 'create_checkout_custom_field' ] );

	add_action( 'init', [ $newOrderStatus, 'register_order_status' ] );
	add_filter( 'wc_order_statuses', [ $newOrderStatus, 'add_new_status_to_order_statuses' ] );
	add_action('admin_head', [ $newOrderStatus, 'css_new_order_status' ] );


}



/* ------------------------------- Custom Fields Creation ----------------------------- */
//NOTE: Max $fieldLabelBackEnd length can only be 20 characters (including dashes)

createWooCommerceCustomOrderStatus("Test Order", "wc-test-order", "Test Order", "#b9de16", "#000000");
createWooCommerceCustomOrderStatus("Completed - Affiliate Paid", "wc-affiliate-paid", "Affiliate Paid", "#5b841b", "#c8d7e1");
createWooCommerceCustomOrderStatus("Completed - Affiliate Unpaid", "wc-affiliate-unpaid", "Affiliate Unpaid", "#e50000", "#c8d7e1");



/**================================================================================================================================================================
 * Purpose: Add Column to Orders Table (e.g. Billing Country) - WooCommerce
 * Title: Add comment column to WC Order Table
 * Description: https://businessbloomer.com/?p=78723
 * Note: Located in Snippets Plugin
 */
 
add_filter( 'manage_edit-shop_order_columns', 'bbloomer_add_new_order_admin_list_column_comments' );
 
function bbloomer_add_new_order_admin_list_column_comments( $columns ) {
    $columns['customer_order_notes'] = 'Customer Note';
    $columns['additional_type_address'] = 'Type of address';
    $columns['additional_time'] = 'Shipping priority';
    $columns['additional_appointment'] = 'Delivery appointment';
    return $columns;
}
 
add_action( 'manage_shop_order_posts_custom_column', 'bbloomer_add_new_order_admin_list_column_content_comments' );
 
function bbloomer_add_new_order_admin_list_column_content_comments( $column ) {
   
    global $post;
	$order = wc_get_order( $post->ID );
 
    if ( 'customer_order_notes' === $column ) {
        echo $order->get_customer_note();
    }
	if ( 'additional_type_address' === $column ) {
        echo $order->meta_data[1]->value;
		echo '<pre>';
		echo print_r($order->meta_data[1]->value);
		echo '</pre>';
    }
	if ( 'additional_time' === $column ) {
        echo $order->meta_data[3]->value;
    }
	if ( 'additional_appointment' === $column ) {
        echo $order->meta_data[2]->value;
    }
}


/**================================================================================================================================================================
 * Add reCaptcha to checkout form
 * Note: Can't place within the payment part of the form, WooCommerce just won't show it, choose an appropriate action to add it to accordingly
 * @param $checkout
 * Reference: https://gist.github.com/doubleedesign/6169b5a3d678298aa062fe5f343d57c4
 * Note: Located in Snippets Plugin
 */
function doublee_show_me_the_checkout_captcha($checkout) {
	echo '<div class="g-recaptcha" data-sitekey="6LfoCmwdAAAAAEzuw85725fOJUiDUN_w67wkpzrE"></div>';
	//https://stackoverflow.com/questions/3371314/how-to-reload-recaptcha-using-javascript
	echo '<button onclick="grecaptcha.reset()" id="reCaptchaReset">Recaptcha Reset</button>';
}
add_action('woocommerce_checkout_order_review', 'doublee_show_me_the_checkout_captcha', 18);

//CSS for recaptcha reset button
//Note: This can be done through code block in Oxygen but to keep things verbose I'm simply creating a PHP script to echo in to wp_footer
add_action('wp_footer', 'recaptcha_reset_button_css');
function recaptcha_reset_button_css(){
	echo '<style>
			#reCaptchaReset{
				color: black;
				font-size: 10px;
				background-color: #f9f9f9;
				border: solid thin black;
				border-radius: 0px;
				box-shadow: 3px 3px 1px 0px rgb(0 0 0 / 5%);
				cursor: pointer;
			}
			#reCaptchaReset:hover {
				background-color: black;
				color: white;
			}
		</style>';
	
	echo '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
}


/**
 * Validate reCaptcha
 */
function doublee_process_recaptcha() {

	$postdata = $_POST['g-recaptcha-response'];
	$verified_recaptcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6LfoCmwdAAAAAJnOkRLK784-FVpEokG5GXXacbHt&response='.$postdata);
	$response = json_decode($verified_recaptcha);

	if(!$response->success) {
		wc_add_notice('Please verify that you are not a robot' ,'error');
	}
}
add_action('woocommerce_checkout_process', 'doublee_process_recaptcha');





// редиректим на главную со страниц авторов
function author_archive_redirect() {
   if( is_author() || is_product_tag() ) {
	   wp_redirect( home_url(), 301 );
	   exit;
   }
}

// удаляем ссылку
function remove_author_pages_link( $content ) {
	return home_url();
}

add_action( 'template_redirect', 'author_archive_redirect' );
add_filter( 'author_link', 'remove_author_pages_link' );