<?php
/*
Template Name: Gallery
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
	<section class="single-page loading">
      <?php if( have_rows('gallery') ): ?>
      <div class="container">
        <ul id="gallery-control" class="gallery-control">
          <?php
          $i = 0;
          while ( have_rows('gallery') ) : the_row(); ?>
          <li><button class="gallery-btn<?php if($i == 0) echo ' gallery-btn--act' ?>"><?php the_sub_field('title') ?></button></li>
          <?php 
          $i++;
          endwhile;
          ?>
        </ul>
        <div class="gallery-wrapper">
          <?php 
          $i = 0;
          while ( have_rows('gallery') ) : the_row();
          ?>

          <?php 
              $images = get_sub_field('images');
              $cols;
              $cols_value;
              $images_sum = count($images);
              switch ($images_sum) {
                case 1:
                  $cols = 2;
                  break;
                case 2:
                  $cols = 2;
                  break;
                case 4:
                  $cols = 4;
                  break;

                default:
                  break;
              }
              if($cols && !is_mobile()) {
			          $cols_value = 'style="column-count: '.$cols_value.'"';
              }
              if( $images ): ?>
                  <ul class="gallery" <?php echo $cols ?>>
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
                  <a class="btn btn--black" target="_blank" href="<?php the_sub_field('link') ?>">See flooring</a>
                  <a class="btn" href="#gallery-control">Back to top</a>
                </div>
          <?php
          if($i == 0) break;
          $i++;
          endwhile;
          ?>
        </div>
      </div>
    <?php endif; ?>
    </section>
</main>

<?php
get_footer();