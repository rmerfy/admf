<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ADM
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
			<h1 class="title title--center"><?php the_archive_title() ?></h1>
        </div>
      </div>
      <section class="archive-posts">
        <div class="container">
          <div class="archive-posts__inner">
          <?php if ( have_posts() ) : ?>
          <?php
            echo '<ul class="archive-posts__list">';
              while ( have_posts() ) : the_post();
                
                  get_template_part( 'template-parts/content', get_post_format() );
                
                endwhile;
            echo '</ul>';

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
        </div>
      </section>

		
	</main><!-- #main -->
<?php
get_footer();
