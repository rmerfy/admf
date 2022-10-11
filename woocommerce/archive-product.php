<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

$page_id = get_queried_object_id();

?>
<div class="archive-info">
	<div class="container">
		<div class="archive-info__inner">
			<div class="archive-info__content">
				<div class="breadcrumbs">
				<?php 
					if (function_exists('bcn_display')) {
						bcn_display();
					}
				?>
				</div>
				<h1 class="title archive-info__title"><?php woocommerce_page_title(); ?></h1>
				<?php
				/**
				 * Hook: woocommerce_archive_description.
				 *
				 * @hooked woocommerce_taxonomy_archive_description - 10
				 * @hooked woocommerce_product_archive_description - 10
				 */
				do_action( 'woocommerce_archive_description' );
				?>
			</div>
			<?php
			$args = [
				'posts_per_page' => 1,
				'post_type' => 'product',
				'post_status' => 'published',
				'post__in' => [get_field('product_spotlight', 'product_cat_'.$page_id)]
			];
			$product_query = new WP_Query( $args );
			
			if ( $product_query->have_posts() ) {
				while ( $product_query->have_posts() ) {
					$product_query->the_post();
					?>
				<a class="archive-info__product" href="<?php the_permalink() ?>">
					<div class="archive-info__product-descr">
						<span class="archive-info__product-suptitle">Product Spotlight</span>
						<span class="archive-info__product-title"><?php the_field('product_name') ?></span>
					</div>
					<?php the_post_thumbnail( 'full' ) ?>
				</a>
				<?php
				}
			}
			wp_reset_postdata();
			?>
		</div>

	</div>
</div>
<section class="product-section product-section--top-line">
	<div class="container">
		<div class="product-section__inner">
			<div class="filter-wrapper">
				<?php get_sidebar(); ?>
			</div>
			<button class="filter-btn">Filter</button>
			<div class="product-items">
				<?php
				if ( woocommerce_product_loop() ) {

					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );
				
					woocommerce_product_loop_start();
				
					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();
				
							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action( 'woocommerce_shop_loop' );
				
							wc_get_template_part( 'content', 'product' );
						}
					}
				
					woocommerce_product_loop_end();
				
					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				}
				?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer('shop');

