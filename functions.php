<?php
/**
 * ADM functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ADM
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function adm_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ADM, use a find and replace
		* to change 'adm' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'adm', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header-1' => esc_html__( 'Header 1', 'adm' ),
			'header-2' => esc_html__( 'Header 2', 'adm' ),
			'header-3' => esc_html__( 'Header 3', 'adm' ),
			'footer-1' => esc_html__( 'Footer 1', 'adm' ),
			'footer-2' => esc_html__( 'Footer 2', 'adm' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'adm_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'adm_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adm_content_width', 640 );
}
add_action( 'after_setup_theme', 'adm_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adm_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'adm' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'adm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'adm_widgets_init' );

 /**
 * Enqueue scripts and styles.
 */
function adm_scripts() {
	wp_enqueue_style( 'adm-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'adm-style', 'rtl', 'replace' );

	wp_enqueue_style( 'adm-fancybox', get_template_directory_uri().'/assets/css/jquery.fancybox.min.css', array(), '', 'all' );
	wp_enqueue_style( 'adm-animate', get_template_directory_uri().'/assets/css/animate.min.css', array(), '', 'all' );
	wp_enqueue_style( 'adm-css', get_template_directory_uri().'/assets/css/style.min.css', array(), '', 'all' );

	wp_enqueue_script( 'adm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	wp_deregister_script( 'jquery' );
	wp_enqueue_script('jquery', get_template_directory_uri().'/assets/js/jquery.min.js','','',false);
	wp_enqueue_script('adm-fancybox', get_template_directory_uri().'/assets/js/jquery.fancybox.min.js','','',true);
	wp_enqueue_script('adm-wow', get_template_directory_uri().'/assets/js/wow.min.js','','',true);
	wp_enqueue_script('adm-libs', get_template_directory_uri().'/assets/js/libs.min.js','','',true);
	wp_enqueue_script('adm-ajax', get_template_directory_uri().'/assets/js/ajax.js', array( 'jquery' ),'',true);
	wp_enqueue_script('adm-main', get_template_directory_uri().'/assets/js/main.js','','',true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'adm_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Ajax Archive
 */
require get_template_directory() . '/inc/archive-ajax.php';


/**
 * Ajax Gallery
 */
require get_template_directory() . '/inc/gallery-ajax.php';

/**
 * Ajax Frontpage
 */
require get_template_directory() . '/inc/frontpage-ajax.php';

/**
 * Ajax Catalog
 */
require get_template_directory() . '/inc/catalog-ajax.php';


add_filter( 'excerpt_length', function(){
	return 40;
} );

add_filter('excerpt_more', function($more) {
	return '...';
});

add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});


// validator

add_filter("wpcf7_validate", function ($result, $tags) {

    $form = WPCF7_Submission::get_instance();
    $phone = $form->get_posted_data('tel-714');
    if (preg_match("/\([0-9]{3}\)\s[0-9]{3}-[0-9]{2}-[0-9]{2}/", $phone)) {
        $valid = true;
    } else {
        $valid = false;
    }

    // here you can do your API call to calculate the validation
    if (!$valid) {
        $result->offsetSet(
            "reason"
            , ["tel-714" => 'Ex. (999) 333-22-11']
        );
    }
    return $result;
}, 10, 2);


// Remove styles woocommerce

add_filter('woocommerce_enqueue_styles', '__return_false');

// Remove breadcrumbs

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

// remove count res / ordering

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0);


// show products with price

function shop_only_instock_products( $meta_query, $query ) {
    // In frontend only
    if( is_admin() ) return $meta_query;

    $meta_query['relation'] = 'OR';

    $meta_query[] = array(
        'key'     => '_price',
        'value'   => '',
        'type'    => 'numeric',
        'compare' => '!='
    );
    $meta_query[] = array(
        'key'     => '_price',
        'value'   => 0,
        'type'    => 'numeric',
        'compare' => '!='
    );
    return $meta_query;
}

add_filter( 'woocommerce_product_query_meta_query', 'shop_only_instock_products', 10, 2 );


function hide_products_without_image( $query ) {
		$query->set( 'meta_query', array( array(
		'key' => '_thumbnail_id',
		'value' => '0',
		'compare' => '>'
	))
	);
}

add_action( 'woocommerce_product_query', 'hide_products_without_image' );

// sample button single product

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );




function before_add_to_cart_btn(){
	$box_sqft = get_field('box_sqft');
	if($box_sqft) {
		echo '<div class="product-content__inputs"><div class="product-content__input-wrapper"><input type="number" data-perbox="'.$box_sqft.'" class="product-content__calc-input"><span>sq.ft.</span></div>';
	} else {
		echo '<div class="product-content__inputs product-content__inputs--other">';
	}
}

add_action( 'woocommerce_before_add_to_cart_button', 'before_add_to_cart_btn' );

function after_add_to_cart_btn(){
	if(!get_field('box_sqft')) echo '</div>';
}

add_action( 'woocommerce_after_add_to_cart_button', 'after_add_to_cart_btn' );


function free_shipping_rule( $is_available ) {
	global $woocommerce;
 
	// get cart contents
	$cart_items = $woocommerce->cart->get_cart();

	// loop through the items looking for one in the eligible array
	foreach ( $cart_items as $key => $item ) {
		if(get_field('box_sqft', $item['product_id'])) {
			$box_sqft = get_field('box_sqft', $item['product_id']);
			$qty = $item['quantity'];	
			$sum_sq_ft = ceil($box_sqft*$qty);

			if($sum_sq_ft >= 500) {
				return true;
			}
		}
	}
	// nothing found return the default value
	return $is_available;
}
add_filter( 'woocommerce_shipping_free_shipping_is_available', 'free_shipping_rule', 20 );

