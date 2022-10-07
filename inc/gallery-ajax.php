<?php
/**
 * ajax gallery
 */

function gallery_posts()
{
	$current_page = $_POST['page'];
	$i = 0;

	while ( have_rows('gallery', 22) ) : the_row();
	if($current_page == $i) :
	?>
	<?php 
		$images = get_sub_field('images');
		if( $images ): ?>
			<ul class="gallery">
				<?php foreach( $images as $image ): 
				$gallery_name = preg_replace('/\s/', '-', get_sub_field('title'));
				$alt = preg_replace('/-/', ' ', $image['title']);
				?>
					<li>
						<a data-fancybox="gallery-<?php echo $gallery_name ?>" href="<?php echo esc_url($image['url']); ?>">
							<img src="<?php echo esc_url($image['sizes']['large']); ?>" loading="lazy" alt="<?php echo $alt ?>" />
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		  <div class="tab-bottom-btns">
			<a class="btn btn--black" href="<?php the_sub_field('link') ?>">See flooring</a>
			<a class="btn" href="#gallery-control">Back to top</a>
		  </div>
	<?php
	endif;
	$i++;
	endwhile; 

	wp_die();
}

add_action('wp_ajax_gallery_posts', 'gallery_posts');
add_action('wp_ajax_nopriv_gallery_posts', 'gallery_posts');