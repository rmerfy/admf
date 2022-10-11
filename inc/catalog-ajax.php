<?php
/**
 * ajax catalog
 */

function catalog_posts()
{
	$page = $_POST['page'];
	$category = $_POST['category'];

	$args = [
		'posts_per_page' => 4,
		'post_status'    => 'publish',
		'post_type'    => 'product',
		'product_cat'   => $category,
		'paged' => $page,
		'meta_query' => [
			[
			'key' => '_thumbnail_id',
			'value' => '0',
			'compare' => '>'
			]
		]
	];

	$product_query = new WP_Query( $args );


	if ( $product_query->have_posts() ) {
		ob_start(); // start buffering because we do not need to print the posts now
 
		while ( $product_query->have_posts() ) : $product_query->the_post();
		
			echo wc_get_template_part( 'content', 'product' );
		
		endwhile;
 
 		$posts_html = ob_get_contents(); // we pass the posts to variable
   		ob_end_clean(); // clear the buffer
		
	}

	echo json_encode( array(
		'posts' => json_encode( $product_query->query_vars ),
		'max_page' => $product_query->max_num_pages,
		'found_posts' => $product_query->found_posts,
		'content' => $posts_html
	) );

	wp_die();
}

add_action('wp_ajax_catalog_posts', 'catalog_posts');
add_action('wp_ajax_nopriv_catalog_posts', 'catalog_posts');