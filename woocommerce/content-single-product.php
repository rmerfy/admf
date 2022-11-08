<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="page-info">
		<div class="container">
			<div class="breadcrumbs">
				<?php if (function_exists('bcn_display')) {
					bcn_display();
				}
				?>
			</div>
			<?php 
			/**
			 * Hook: woocommerce_before_single_product.
			 *
			 * @hooked woocommerce_output_all_notices - 10
			 */
			do_action( 'woocommerce_before_single_product' );
			?>
		</div>
	</div>
	<section class="product-main">
		<div class="container">
			<div class="product-main__top-inner">
			<div class="product-gallery">
			<?php
			$gallery = $product->gallery_image_ids;

			if (!$gallery) : ?>
			<a class="product-slider__img" data-fancybox="product-gallery" href="<?php the_post_thumbnail_url() ?>">
				<?php
				the_post_thumbnail();
				?>
			</a>
			<?php elseif($gallery) : ?>
			<div class="product-slider-wrapper">
				<div class="swiper product-slider">
					<div class="swiper-wrapper">
						<!-- Slides -->
						<div class="swiper-slide">
							<a class="product-slider__img" data-fancybox="product-gallery" href="<?php the_post_thumbnail_url() ?>">
								<?php the_post_thumbnail() ?>
							</a>
						</div>
						<?php foreach ($gallery as $image_id) : 
						$url = wp_get_attachment_image_url($image_id, 'full');
						$img = wp_get_attachment_image($image_id, 'full');    
						?>
						<div class="swiper-slide">
							<a class="product-slider__img" data-fancybox="product-gallery" href="<?php echo $url; ?>">
								<?php echo $img; ?>
							</a>
						</div>
						<?php endforeach; ?>	
					</div>
				</div>
				<!-- If we need navigation buttons -->
				<div class="swiper-button-prev product-thumbs-prev"></div>
				<div class="swiper-button-next product-thumbs-next"></div>
			</div>
			
			<div class="swiper product-thumbs">
				<div class="swiper-wrapper">
					<!-- Slides -->
					<div class="swiper-slide">
						<div class="product-slider__thumb-img">
							<?php the_post_thumbnail() ?>
						</div>
					</div>
					<?php foreach ($gallery as $image_id) : 
					$img = wp_get_attachment_image($image_id, 'full');       
					?>
					<div class="swiper-slide">
						<div class="product-slider__thumb-img">
							<?php echo $img; ?>
						</div>
					</div>
					<?php endforeach; ?>	
				</div>
			</div>
			<?php else : ?>
				<div class="product-slider__img">
					<img src="<?php echo wc_placeholder_img_src() ?>" alt="No image">
				</div>
			<?php endif; ?>
			</div><!-- gallery -->
			<div class="product-content">
				<?php 
				if(get_field('product_name')) {
					echo '<h1 class="title product-content__title">'.get_field('product_name').'</h1>';
				} else {
					the_title('<h1 class="title product-content__title">', '</h1>');
				}
				?>
				<div class="product-content__prices">
				<?php 
					$price = $product->get_price();
					$price_sqft = get_field('price_sqft');
					$pickup_price = null;
					if($price_sqft) {
						$box_sqft = get_field('box_sqft');
						$pickup_price = bcdiv(($price_sqft*0.95)-0.1, 1, 2);
						$free_delivery = ceil(500/$box_sqft);
						echo '<p class="product-content__price-sqft"><span>$'.$price_sqft.'</span> per sq. ft.</p>';
						echo '<p class="product-content__price-carton"><span>$'.$price.'</span> per carton ('.$box_sqft.' sq. ft.)</p>';
					} elseif (!$product->is_type( 'variable' )){
						echo '<span>$'.$price.'</span>';
					}
				?>
				</div>
				<?php 
					if($pickup_price) echo '<p class="product-content__price-pickup">Local Pick-up Price: <span>$'.$pickup_price.'</span> per sq. ft.</p>';
				?>
				<div class="product-content__add-to-cart">
				<?php woocommerce_template_single_add_to_cart() ?>
				</div>
				
				<?php 
				$terms = get_the_terms( $product->get_id(), 'product_cat' );
				$product_cat_ids = [];
				foreach ($terms as $term) {
					$product_cat_ids[] = $term->term_id;
				}

				// if is all-flooring

				if(in_array('23', $product_cat_ids)) :
				?>
				<p class="product-content__stair-trim">Don't forget to purchase <a class="hover-animation" href="/stair-and-trim/">Stair & Trim.</a></p>
				<p class="product-content__compare">Want to see similar colors? <a class="compare hover-animation" href="/?action=yith-woocompare-add-product&amp;id=<?php echo $product->id; ?>" data-product_id="<?php echo $product->id; ?>" rel="nofollow">Compare.</a></p>
				<p>Consider adding 7-12% for waste.</p>
				<p>Free curbside delivery with any purchase of <b><?php echo $free_delivery ?></b> boxes or more.</p>
				<!-- <p>Also available in Oil: <a class="hover-animation" href="#">Ravenna Oil</a></p> -->
				<?php endif; ?>
			</div>
			</div>
			<div class="product-main__inner">
			<div class="product-main__descr product-main__col">
				<h3 class="product-main__title title-2">
				Product Description
				</h3>
				<div class="product-main__content">
				<?php the_content() ?>
				</div>
			</div>
			<div class="product-main__params product-main__col">
				<h3 class="product-main__title title-2">
				Product Design and Specifications
				</h3>
				<div class="product-main__content product-main__content--params">
				<ul class="product-main__params-list">
					<?php

					$attributes = $product->get_attributes();

					foreach ( $attributes as $attribute ) {
							// Get the taxonomy.
							$terms = wp_get_post_terms( $product->id, $attribute[ 'name' ], 'all' );
							$taxonomy = $terms[ 0 ]->taxonomy;
								
							// Get the taxonomy object.
							$taxonomy_object = get_taxonomy( $taxonomy );
							
							$attr_name = $taxonomy_object->labels->singular_name;
							$attr_value = $terms[0]->name;
							if ($attr_name && $attr_value) {
								echo '<li><span>'.$attr_name. ':</span><span>'.$attr_value.'</span></li>';
							}
						}
					?>
				</ul>
				</div>
			</div>
			</div>
			<?php
			// if is all-flooring
			if(in_array('23', $product_cat_ids)) : ?>
			<div class="product-main__downloads">
			<h3 class="product-main__title title-2 title--center">
				Downloads
			</h3>
			<ul class="product-main__downloads-items">
				<li>
				<a class="btn product-main__downloads-link" target="_blank" href="/wp-content/uploads/2022/09/ADMF-CareMaintenance-1.pdf">
					<span>Care and Maintenance Guide</span>
				</a>
				</li>
				<li>
				<a class="btn product-main__downloads-link" target="_blank" href="/wp-content/uploads/2022/09/ADMF-Install_Instructions-1.pdf">
					<span>Installation Instructions</span>
				</a>
				</li>
				<li>
				<a class="btn product-main__downloads-link" target="_blank" href="/wp-content/uploads/2022/09/ADMF-Warranty_Guide-1.pdf">
					<span>25-Year Warranty</span></a>
				</li>
				<li>
				<a class="btn product-main__downloads-link" target="_blank" href="/cleaning-videos/">
					<span>Learn how to clean your floors</span>
				</a>
				</li>
			</ul>
			</div>
			<?php endif; ?>
		</div>
	</section>
	<?php woocommerce_output_related_products(); ?>
</div>