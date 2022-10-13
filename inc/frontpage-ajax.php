<?php
/**
 * frontpage_posts pagination
 */

function frontpage_posts()
{
	$current_page = $_POST['page'];

    // The Query
    $args = [
        'posts_per_page' => 12,
        'post_type'   => 'product',
        'product_cat' => 'all-flooring',
        'post_status' => 'publish',
        'paged'       => $current_page,
    ];
    $query = new WP_Query( $args );

    // The Loop
    while ( $query->have_posts() ) {
        $query->the_post();
        ?>
        <li class="flooring__list-item animate__animated animate__fadeInUp">
            <a href="<?php the_permalink() ?>">
            <div class="flooring__list-front">
                <?php the_post_thumbnail( 'medium' ) ?>
            </div>
            <div class="flooring__list-back">
                <span class="flooring__list-title"><?php the_title() ?></span>
            </div>
            </a>
        </li>
        <?php
    }

    wp_reset_postdata();

	wp_die();
}

add_action('wp_ajax_frontpage_posts', 'frontpage_posts');
add_action('wp_ajax_nopriv_frontpage_posts', 'frontpage_posts');