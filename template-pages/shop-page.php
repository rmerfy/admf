<?php
/*
Template Name: Shop
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
        <h1 class="title title--center">All Products</h1>
    </div>
    </div>
    <section class="quick-links">
    <div class="container">
        <h3 class="quick-links__title title-2">
        Quick Links
        </h3>
        <div class="quick-links__items">
        <a class="btn scrollto" href="/engineered-hardwood-catalog/">Engineered Hardwood</a>
        <a class="btn scrollto" href="/vinyl-catalog/">Vinyl</a>
        <a class="btn scrollto" href="/stair-and-trim/">Stair & Trim</a>
        <a class="btn scrollto" href="/care-and-maintenance/">Care & Maintainance</a>
        <a class="btn scrollto" href="/adhesives/">Adhesives</a>
        </div>
    </div>
    </section>
    <section class="product-section">
    <div class="container">
        <div class="product-items decor decor--left">
        <h3 class="title">Engineered Hardwood</h3>
        <ul class="product-items__list">
        <?php
        $posts = get_posts([
            'numberposts' => 4,
            'post_type'   => 'product',
            'product_cat' => 'engineered-hardwood-catalog'
        ]);

        foreach ( $posts as $post ){
            setup_postdata( $post );
            wc_get_template_part( 'content', 'product' );
        }
        wp_reset_postdata();
        ?>
        </ul>
        <a class="btn btn--black product-items__link" href="archive-products.html">Show more</a>
        </div>
        <div class="product-items decor decor--left">
        <h3 class="title">Luxury Vinyl Plank</h3>
        <ul class="product-items__list">
        <?php
        $posts = get_posts([
            'numberposts' => 4,
            'post_type'   => 'product',
            'product_cat' => 'vinyl-flooring'
        ]);

        foreach ( $posts as $post ){
            setup_postdata( $post );
            wc_get_template_part( 'content', 'product' );
        }
        wp_reset_postdata();
        ?>
        </ul>
        <a class="btn btn--black product-items__link" href="archive-products.html">Show more</a>
        </div>
        <div class="product-items decor decor--left">
        <h3 class="title">Stair and Trim</h3>
        <ul class="product-items__list">
        <?php
        $posts = get_posts([
            'numberposts' => 4,
            'post_type'   => 'product',
            'product_cat' => 'stair-and-trim'
        ]);

        foreach ( $posts as $post ){
            setup_postdata( $post );
            wc_get_template_part( 'content', 'product' );
        }
        wp_reset_postdata();
        ?>
        </ul>
        <a class="btn btn--black product-items__link" href="archive-products.html">Show more</a>
        </div>
        <div class="product-items decor decor--left">
        <h3 class="title">Care and Maintainance</h3>
        <ul class="product-items__list">
        <?php
        $posts = get_posts([
            'numberposts' => 4,
            'post_type'   => 'product',
            'product_cat' => 'care-and-maintenance'
        ]);

        foreach ( $posts as $post ){
            setup_postdata( $post );
            wc_get_template_part( 'content', 'product' );
        }
        wp_reset_postdata();
        ?>
        </ul>
        <a class="btn btn--black product-items__link" href="archive-products.html">Show more</a>
        </div>
        <div class="product-items decor decor--left">
        <h3 class="title">Adhesives</h3>
        <ul class="product-items__list">
        <?php
        $posts = get_posts([
            'numberposts' => 4,
            'post_type'   => 'product',
            'product_cat' => 'adhesives'
        ]);

        foreach ( $posts as $post ){
            setup_postdata( $post );
            wc_get_template_part( 'content', 'product' );
        }
        wp_reset_postdata();
        ?>
        </ul>
        </div>
    </div>
    </section>
</main>

<?php
get_footer();