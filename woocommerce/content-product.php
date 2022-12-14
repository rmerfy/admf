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
	
	$price = $product->get_price();
	$price_sqft = get_field('price_sqft');
	if($price_sqft) {
		echo '<span class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>'.$price_sqft.'</bdi> per sq. ft.</span></span>';
	} else {
		woocommerce_template_loop_price();
	}
	?>
	</div>
	</a>
	<div class="product-item__btns">
	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	<?php 
		$terms = get_the_terms( $product->get_id(), 'product_cat' );
		$product_cat_ids = [];
		foreach ($terms as $term) {
			$product_cat_ids[] = $term->term_id;
		}

		// if is all-flooring

		if(in_array('23', $product_cat_ids)) :
		?>
		<a href="/?action=yith-woocompare-add-product&amp;id=<?php echo $product->id; ?>" class="compare btn" data-product_id="<?php echo $product->id; ?>" rel="nofollow">Compare</a>
		<?php endif; ?>
	</div>
</li>