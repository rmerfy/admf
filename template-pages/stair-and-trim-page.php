<?php
/*
Template Name: Stair and Trim
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
            <h1 class="title title--center">Stair and Trim</h1>
        </div>
    </div>
    <section class="product-section">
        <div class="container">
            <div class="product-items decor decor--left">
            <h3 class="title"><a href="/stair-and-trim-wood/">Solid Wood</a></h3>
            <ul class="product-items__list" data-category="stair-and-trim-wood">
            <?php
            $posts = get_posts([
                'numberposts' => 4,
                'post_type'   => 'product',
                'product_cat' => 'stair-and-trim-wood'
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
            <!-- <div class="product-items decor decor--left">
            <h3 class="title"><a href="/stair-and-trim-vinyl/">Vinyl</a></h3>
            <ul class="product-items__list" data-category="stair-and-trim-vinyl">
            <?php
            // $posts = get_posts([
            //     'numberposts' => 4,
            //     'post_type'   => 'product',
            //     'product_cat' => 'stair-and-trim-vinyl'
            // ]);

            // foreach ( $posts as $post ){
            //     setup_postdata( $post );
            //     wc_get_template_part( 'content', 'product' );
            // }
            // wp_reset_postdata();
            ?>
            </ul>
            <button class="btn btn--black product-items__btn">Show more</button>
            </div> -->
        </div>
    </section>
</main>

<?php
get_footer();