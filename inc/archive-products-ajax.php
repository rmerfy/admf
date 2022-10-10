<?php
/**
 * archive_products_posts pagination
 */

function archive_products_posts()
{
	$current_page = $_POST['page'];

	$link = false;

	if(!empty( $_POST['link'] )) {
		$link = esc_attr( $_POST['link'] );
		$link = preg_replace('/\/page\/[0-9]{1,}/', '', $link);
	}
	$slug = $link ? wp_basename( $link ) : false;
	$cat  = get_category_by_slug( $slug );

	if ( ! $cat ) {
		die( 'Category not found' );
	}

	$args = [
		'posts_per_page' => 12,
		'post_type' => 'product',
		'post_status' => 'published',
	];
	$product_query = new WP_Query( $args );
	echo '<div class="premmerce-filter-ajax-container"><div class="woocommerce-notices-wrapper"></div>';
	echo '<ul class="product-items__list products columns-4">';

	if ( $product_query->have_posts() ) {
		while ( $product_query->have_posts() ) {
			$product_query->the_post();
			
			wc_get_template_part( 'content', 'product' );

		}
	}
	echo '</ul>';
	echo '<nav class="woocommerce-pagination">';
	
	woocommerce_pagination();


	echo str_replace( admin_url( 'admin-ajax.php/' ), get_category_link( $cat->term_id ), $pagination );
	
	echo '</nav></div>';
	wp_reset_postdata();
	wp_die();

}

add_action('wp_ajax_archive_products_posts', 'archive_products_posts');
add_action('wp_ajax_nopriv_archive_products_posts', 'archive_products_posts');