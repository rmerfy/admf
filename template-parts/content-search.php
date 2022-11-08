<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ADM
 */

?>

<article class="search-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
			the_title( sprintf( '<h2 class="search-content__title"><a target="_blank" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		?>
</article><!-- #post-<?php the_ID(); ?> -->
