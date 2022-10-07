<?php
/*
Template Name: FAQ
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
        <div class="container container--sm">
        <?php if( have_rows('faq') ): ?>
            <div class="accordion-container accordion-faq">
                <?php while ( have_rows('faq') ) : the_row(); ?>
                    <div class="ac">
                        <h2 class="ac-header">
                            <button type="button" class="ac-trigger"><?php  the_sub_field('title'); ?></button>
                        </h2>
                        <div class="ac-panel">
                            <div class="ac-text">
                                <?php  the_sub_field('content'); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <div class="faq-more">
                <p>If you cannot find an answer here, send us a message using the button below.</p>
                <button class="btn btn--black callback">Submit a Question</button>
            </div>
		</div>
	</section>
</main>

<?php
get_footer();