<?php
/*
Template Name: Video
Template Post Type: page
 */

get_header();
?>
<main class="main">
	<div class="page-info">
		<div class="container">
			<div class="breadcrumbs">
			<?php 
				if (function_exists('bcn_display')) {
					bcn_display();
				}
			?>
			</div>
			<h1 class="title title--center"><?php the_title() ?></h1>
		</div>
	</div>
    <section class="single-page">
        <div class="container">
            <?php if( have_rows('products') ): ?>
			<ul class="video-list product-items__list">
                <?php while ( have_rows('products') ) : the_row();
                $id = get_sub_field('product_id');
                if($id) {
                $product = wc_get_product( $id );
                $thumbs = get_field('thumbnails');
                ?>
                <li class="video-list__item">
                    <?php if ($thumbs[0]) : ?>
                    <a class="video-list__item-img" target="_blank" href="<?php the_permalink($id) ?>">
                        <?php echo get_the_post_thumbnail($id, 'large'); ?>
                    </a>
                    <?php endif; ?>
                    <iframe class="video-list__frame" src="<?php  the_sub_field('video'); ?>" loading="lazy" allowfullscreen></iframe>
                    <?php 
                    if(get_field('product_name', $id)) {
                        echo '<h3 class="product-item__title">'.get_field('product_name', $id).'</h3>';
                    } else {
                        echo '<h3 class="product-item__title">'.get_the_title($id).'</h3>';
                    }
                    ?>
                    <a target="_blank" class="btn video-list__btn" href="<?php the_permalink($id) ?>">See product</a>
                </li>
                      
                <?php 
                    }
                    endwhile;
                ?>
            </ul>
            <?php if ($thumbs[0]) : ?>
            <div class="video-more">
                <h4>Want to see all the videos?</h4>
                <a href="https://www.youtube.com/watch?v=X4EiFzBe-dI&list=PL-CxygoZA5wrSo1IOhOnlPGoZq3Ij3Wrs" target="_blank" rel="noopener noreferrer">Checkout the playlist</a>
            </div>
            <?php endif; ?>
            <?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();