<?php
/*
Template Name: Collections
Template Post Type: page
 */

get_header();
?>
<main class="main">
    <div class="page-info">
        <div class="container container--sm">
            <div class="breadcrumbs">
            <?php 
                if (function_exists('bcn_display')) {
                    bcn_display();
                }
            ?>
            </div>
            <h1 class="title title--center">Collections</h1>
            <p class="subtitle">
                Our ADM engineered wood flooring collections are organized by plank width,
                plank pattern, wood species, plank grade, wear layer and finally a special
                collection with both Oil & Lacquer version of a color. We also have an Overstock collection.
                New to our collection: Luxury Vinyl Plank!
            </p>
        </div>
    </div>
    <?php if( have_rows('collections') ): ?>
    <section class="collections">
        <div class="container">
            <ul class="collections__items">
                <?php while ( have_rows('collections') ) : the_row(); ?>
                    <li class="collections__item">
                        <a href="<?php  the_sub_field('link'); ?>">
                            <h3 class="collections__title"><?php  the_sub_field('title'); ?></h3>
                            <img src="<?php  the_sub_field('img'); ?>" loading="lazy" alt="Image - <?php  the_sub_field('title'); ?>">
                            <span class="collections__descr"><?php  the_sub_field('descr'); ?></span>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php
get_footer();