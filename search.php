<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ADM
 */

get_header();
?>

	<main id="primary" class="main">
	<div class="container">

	<?php if ( have_posts() ) : ?>

<header class="page-header">
	<h1 class="page-title title ">
		<?php
		/* translators: %s: search query. */
		printf( esc_html__( 'Search Results for: %s', 'adm' ), '<span>' . get_search_query() . '</span>' );
		?>
	</h1>
</header><!-- .page-header -->

<?php
echo '<div class="search">';
/* Start the Loop */
while ( have_posts() ) :
	the_post();

	/**
	 * Run the loop for the search to output the results.
	 * If you want to overload this in a child theme then include a file
	 * called content-search.php and that will be used instead.
	 */
	get_template_part( 'template-parts/content', 'search' );

endwhile;
echo '</div>';
echo '<div class="archive-pagination">';

the_posts_pagination( array(
	'prev_text'          => __( '←', 'adm' ),
	'next_text'          => __( '→', 'adm' ),
	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'adm' ) . ' </span>',
) );

echo '</div>';

else :

get_template_part( 'template-parts/content', 'none' );

endif;
?>


	</div>
	</main><!-- #main -->

<?php
get_footer();
