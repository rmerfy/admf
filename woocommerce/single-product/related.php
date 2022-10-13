<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;


$cats = wp_get_post_terms( $product->id, 'product_cat' );
$category = $product->category_ids[0];

foreach($cats as $cat){
	if (str_contains($cat->name, 'Collection')) {
		$category = $cat->term_id;
	}
}

$posts = query_posts([
    'post_type'             => 'product',
    'post_status'           => 'publish',
    'ignore_sticky_posts'   => 1,
    'posts_per_page'        => 4,
	'orderby' 				=> 'menu_order',
    'order' 				=> 'ACS',
	'meta_query'			=> [
		'relation' => 'AND',
		[
			'key' => '_thumbnail_id',
			'value' => '0',
			'compare' => '>'
		],
		[
			'key'     => '_sku',
			'value'   => $product->sku,
			'compare' => 'NOT IN',
		]
	],
    'tax_query'             => [
        [
            'taxonomy'      => 'product_cat',
            'terms'         => $category,
            'compare'      => 'IN' 
        ]
    ]
]);

if ( $posts ) {
	echo '<section class="product-section related products">
		<div class="container">
		<div class="product-items decor decor--left">
		<h2 class="title">Related products</h2>';
	woocommerce_product_loop_start();

	while (have_posts()): the_post();

	wc_get_template_part( 'content', 'product' );

	endwhile;
	wp_reset_query();

	woocommerce_product_loop_end();
	echo '</div>
		</div>
		</section>';
}

