<?php
/**
 * archive_posts pagination
 */

function archive_posts()
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

	query_posts([
		'posts_per_page' => get_option( 'posts_per_page' ),
		'post_status'    => 'publish',
		'category_name'   => $cat->slug,
		'paged' => $current_page
	]);

	// archive template

	if ( have_posts() ) : ?>
	<?php
	echo '<ul class="archive-posts__list">';
		while ( have_posts() ) : the_post();
		
			get_template_part( 'template-parts/content', get_post_format() );
		
		endwhile;
	echo '</ul>';
	
	echo '<div class="archive-pagination">';
	
	$pagination = get_the_posts_pagination( array(
		'prev_text'          => __( '←', 'adm' ),
		'next_text'          => __( '→', 'adm' ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'adm' ) . ' </span>',
	) );


	echo str_replace( admin_url( 'admin-ajax.php/' ), get_category_link( $cat->term_id ), $pagination );
	
	echo '</div>';
	
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;

	wp_die();
}

add_action('wp_ajax_archive_posts', 'archive_posts');
add_action('wp_ajax_nopriv_archive_posts', 'archive_posts');