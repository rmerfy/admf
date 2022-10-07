<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ADM
 */

?>

<li class="archive-posts__item">
	<a class="archive-posts__link" href="<?php the_permalink() ?>">
	<?php the_post_thumbnail('large') ?>
	<h3 class="archive-posts__item-title title-2"><?php the_title() ?></h3>
	<div class="archive-posts__item-excerpt"><?php the_excerpt() ?></div>
	<span class="btn archive-posts__item-read-more">Read more</span>
	</a>
</li>
