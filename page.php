<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
			<h1 class="title title--center"><?php the_title() ?></h1>
		</div>
	</div>
	<section class="single-page">
        <div class="container container--sm">
			<?php the_content() ?>
		</div>
	</section>
</main>

<?php
get_footer();
