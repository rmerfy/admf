<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( 'product-item', $product ); ?>>
	<a class="product-item__link" href="<?php the_permalink() ?>">
	<?php 
	the_post_thumbnail('medium');
	if(get_field('product_name')) {
		echo '<h3 class="product-item__title">'.get_field('product_name').'</h3>';
	} else {
		the_title('<h3 class="product-item__title">', '</h3>');
	}
	?>
	<div class="product-item__subtitle">
	<?php
	woocommerce_template_loop_price();
	$term = get_the_terms( $post->ID, 'product_cat' );
	if($term == 'all_flooring') echo '<span> per sq ft</span>';
	?>
	</div>
	</a>
	<div class="product-item__btns">
	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	</div>
</li>