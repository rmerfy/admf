<?php
/*
Template Name: Full size page
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
			<?php the_content() ?>
		</div>
	</section>
</main>

<?php
get_footer();
