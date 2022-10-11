<?php
/**
 * archive_products_posts pagination
 */

function archive_products_posts()
{
	$current_page = $_POST['page'];
	$link = false;

	$html="";
    $varition_args = array(
            'post_type' => 'product',
            'posts_per_page' => 10,
            'product_cat'    => 'all-flooring'
        );
	$variation_query = new WP_Query($varition_args);


    if ($variation_query->have_posts()) {
            while ($variation_query->have_posts()) {
                 $variation_query->the_post();
                 global $product;
                 $html.= '<tr>';
                 $html.= '<td>'.get_the_ID().'</td>';
                 $html.= '<td>'.get_the_title().'</td>';
                 $html.= '<td>'.$product->get_price_html().'</td>';
                 $html.= '</tr>';
            }
    }

    //Returns records
    return $html;
	
	wp_die();
}

add_action('wp_ajax_archive_products_posts', 'archive_products_posts');
add_action('wp_ajax_nopriv_archive_products_posts', 'archive_products_posts');