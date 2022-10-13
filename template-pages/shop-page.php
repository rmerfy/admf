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
        <a class="btn" href="/engineered-hardwood-catalog/">Engineered Hardwood</a>
        <a class="btn" href="/vinyl-catalog/">Vinyl</a>
        <a class="btn" href="/stair-and-trim/">Stair & Trim</a>
        <a class="btn" href="/care-and-maintenance/">Care & Maintainance</a>
        <a class="btn" href="/adhesives/">Adhesives</a>
        </div>
    </div>
    </section>
    <section class="product-section">
    <div class="container">
        <div class="product-items decor decor--left">
        <h3 class="title"><a href="/engineered-hardwood-catalog/">Engineered Hardwood</a></h3>
        <ul class="product-items__list" data-category="engineered-hardwood-catalog">
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
        <button class="btn btn--black product-items__btn">Show more</button>
        </div>
        <div class="product-items decor decor--left">
        <h3 class="title"><a href="/vinyl-catalog/">Luxury Vinyl Plank</a></h3>
        <ul class="product-items__list" data-category="vinyl-catalog">
        <?php
        $posts = get_posts([
            'numberposts' => 4,
            'post_type'   => 'product',
            'product_cat' => 'vinyl-catalog'
        ]);

        foreach ( $posts as $post ){
            setup_postdata( $post );
            wc_get_template_part( 'content', 'product' );
        }
        wp_reset_postdata();
        ?>
        </ul>
        <button class="btn btn--black product-items__btn">Show more</button>
        </div>
        <div class="product-items decor decor--left">
        <h3 class="title"><a href="/stair-and-trim/">Stair & Trim</a></h3>
        <ul class="product-items__list" data-category="stair-and-trim">
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
        <button class="btn btn--black product-items__btn">Show more</button>
        </div>
        <div class="product-items decor decor--left">
        <h3 class="title"><a href="/care-and-maintenance/">Care & Maintainance</a></h3>
        <ul class="product-items__list" data-category="care-and-maintenance">
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
        <button class="btn btn--black product-items__btn">Show more</button>
        </div>
        <div class="product-items decor decor--left">
        <h3 class="title"><a href="/adhesives/">Adhesives</a></h3>
        <ul class="product-items__list" data-category="adhesives">
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