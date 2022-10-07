<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ADM
 */

get_header();
?>

	<main class="main">
		<?php if(get_the_post_thumbnail()) {
			echo '<div class="single-post-top"><div class="container container--sm">';
			the_post_thumbnail();
			echo '</div></div>';
		}
		?>
      <div class="page-info">
        <div class="container container--sm">
          <div class="breadcrumbs">
		  	<?php 
				if (function_exists('bcn_display')) {
					bcn_display();
				}
			?>
          </div>
          <h1 class="title"><?php the_title() ?></h1>
        </div>
      </div>
      <div class="single-post-content">
        <div class="container container--sm">
			<?php the_content() ?>
        </div>
      </div>
	  <div class="single-post-nav">
	  	<div class="container container--sm">
			<?php 
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'adm' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'adm' ) . '</span> <span class="nav-title">%title</span>',
					)
				); 
			?>
		</div>
      </div>
	</main><!-- #main -->

<?php
get_footer();
