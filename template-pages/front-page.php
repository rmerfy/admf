<?php
/*
Template Name: Front page
Template Post Type: page
 */
get_header();
?>

<main class="main">
    <section class="main-banner">
    <h1 class="visually-hidden">ADM Flooring</h1>
    <?php if( have_rows('slider') ): ?>
    <div class="swiper main-slider">
        <div class="swiper-wrapper">
            <?php while ( have_rows('slider') ) : the_row(); ?>
             <!-- Slides -->
             <div class="swiper-slide">
                <div class="container">
                <?php 
                $image = get_sub_field('image');
                if( !empty( $image ) ): ?>
                <img class="main-slide-img" src="<?php echo esc_url($image['url']); ?>" loading="lazy" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                <div class="main-slide-content flash">
                <?php 
                $product_link = get_sub_field('product_link');
                if( $product_link ): 
                    $product_link_url = $product_link['url'];
                    $product_link_title = $product_link['title'];
                    $product_link_target = $product_link['target'] ? $product_link['target'] : '_self';
                    ?>
                    <a class="main-slide-content__title hover-animation" href="<?php echo esc_url( $product_link_url ); ?>" target="<?php echo esc_attr( $product_link_target ); ?>"><?php echo esc_html( $product_link_title ); ?></a>
                <?php endif; ?>
                <?php 
                $collection_link = get_sub_field('collection_link');
                if( $collection_link ): 
                    $collection_link_url = $collection_link['url'];
                    $collection_link_title = $collection_link['title'];
                    $collection_link_target = $collection_link['target'] ? $collection_link['target'] : '_self';
                    ?>
                    <a class="main-slide-content__subtitle hover-animation" href="<?php echo esc_url( $collection_link_url ); ?>" target="<?php echo esc_attr( $collection_link_target ); ?>"><?php echo esc_html( $collection_link_title ); ?></a>
                <?php endif; ?>
                </div>
                </div>
            </div>
                  
            <?php endwhile; ?>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <?php endif; ?>
    </section>
    <section class="features">
    <div class="container">
        <div class="features__items">
        <div class="features__item decor decor--left">
            <h3 class="features__item-title wow animate__animated animate__fadeInDown">Engineered Hardwood Floors</h3>
            <div class="features__item-content">
            <img class="wow animate__animated animate__fadeInLeft" loading="lazy" src="<?echo get_template_directory_uri() ?>/assets/images/features/01.jpeg"
                alt="Hardwood Floor">
            <div class="features__item-text wow animate__animated animate__fadeInDown animate__delay-1s">
                <p>
                Based out of Los Angeles, California, ADM designs and produces exclusive engineered wood flooring.
                Each
                engineered floor is crafted with quality and durability in mind using the most durable of wood
                materials
                from White Oak, Maple, and Walnut. Carrying over 500k+ SQ FT of engineered wood year around. We are
                a
                one-stop-shop for all your flooring needs whether you need Woca maintenance products, adhesives,
                custom
                flooring, t-molds, or stair treads, we have it all.
                </p>
            </div>
            </div>
        </div>
        <div class="features__item decor decor--right">
            <h3 class="features__item-title features__item-title--right wow animate__animated animate__fadeInDown">
            SERVING CLIENTS WORLDWIDE</h3>
            <div class="features__item-content">
            <div class="features__item-text wow animate__animated animate__fadeInDown animate__delay-1s">
                <p>
                We supply designers, contractors, homes, and businesses across the USA and across the globe. Some
                conditions apply to destinations outside of the 48 contiguous states. <br> Contact our sales
                representative for orders outside of the US.
                </p>
            </div>
            <img class="wow animate__animated animate__fadeInRight" loading="lazy" src="/wp-content/uploads/2022/11/Oceana-house-1.jpg"
                alt="Hardwood Floor">
            </div>
        </div>
        <div class="features__item decor decor--left">
            <h3 class="features__item-title">Custom Cuts</h3>
            <div class="features__item-content">
            <div class="features__img-item wow animate__animated animate__fadeInLeft">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/features/03.jpeg" loading="lazy" alt="floor">
                <span class="features__img-caption">Herringbone Colors</span>
            </div>
            <div class="features__item-text features__item-text--large wow animate__animated animate__fadeInDown animate__delay-1s">
                <h4>We do Custom Cuts <br> on All Our Flooring Colors</h4>
                <p>
                Upon request we can utilize any flooring color available to create a custom pattern such as chevron
                or herringbone. Our custom cut and color services are offered with a 2 weeks lead time. We are able
                to mix and match any collection to design and produce unique flooring that fits any luxurious
                scenario. With Chevron and Herringbone becoming more popular in homes throughout the US you can too
                create your custom herringbone or chevron cut pattern flooring for your home.
                </p>
                <a class="hover-animation" href="tel:+18887296781">CALL US: +1 (888) 729 - 6781</a>
            </div>
            <div class="features__img-item wow animate__animated animate__fadeInUp animate__delay-1s">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/features/04.jpeg" loading="lazy" alt="floor">
                <span class="features__img-caption">Chevron Colors</span>
            </div>
            <div class="features__img-item wow animate__animated animate__fadeInUp animate__delay-2s">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/features/05.jpeg" loading="lazy" alt="floor">
                <span class="features__img-caption">Versailles Colors</span>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    <section class="instagram">
    <div class="container">
        <div class="instagram__inner decor decor--right">
        <h3 class="features__item-title features__item-title--right">GET INSPIRED</h3>
        <?php echo do_shortcode('[instagram feed="4033"]') ?>
        </div>
    </div>
    </section>
    <div class="showcase">
    <div class="container">
        <a class="btn btn--ts-black" href="/designershowcase/">DESIGNER SHOWCASE: JOIN OUR COMPETITION</a>
    </div>
    </div>
    <section class="flooring">
    <div class="container">
        <h3 class="title decor decor--left">Flooring</h3>
        <ul class="flooring__list">
        <?php
        $posts = get_posts([
            'numberposts' => 12,
            'post_type'   => 'product',
            'product_cat' => 'all-flooring'
        ]);

        foreach ( $posts as $post ){
            setup_postdata( $post );
            ?>
            <li class="flooring__list-item">
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

        ?>
        </ul>
        <div class="flooring__footer">
            <button class="btn btn--center flooring__show-more">Show more</button>
        </div>
    </div>
    </section>
    <section class="customers-reviews">
    <div class="container">
        <h3 class="title title--right decor decor--right">SATISFIED CUSTOMERS</h3>
        <ul class="customers-reviews__items">
        <li class="customers-reviews__item">
            <a class="btn"  target="_blank" rel="noopener noreferrer" href="https://www.google.com/maps/place/ADM+Flooring/@34.000081,-118.2070192,17z/data=!3m1!4b1!4m5!3m4!1s0x80c2c8d4a07d5fd9:0x53740df35d31fd4!8m2!3d34.000081!4d-118.2070192">Google</a>
            <div class="customers-reviews__rate">
            <img class="svg" src="<?echo get_template_directory_uri() ?>/assets/images/icons/rate.svg" loading="lazy" alt="rate">
            <span class="customers-reviews__rate-text">
                4.5
            </span>
            </div>
        </li>
        <li class="customers-reviews__item">
            <a class="btn"  target="_blank" rel="noopener noreferrer" href="https://www.yelp.com/biz/adm-flooring-vernon">Yelp</a>
            <div class="customers-reviews__rate">
            <img class="svg" src="<?echo get_template_directory_uri() ?>/assets/images/icons/rate.svg" loading="lazy" alt="rate">
            <span class="customers-reviews__rate-text">
                4.5
            </span>
            </div>
        </li>
        <li class="customers-reviews__item">
            <a class="btn"  target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/flooring-contractors/adm-flooring-pfvwus-pf~1477051655">Houzz</a>
            <div class="customers-reviews__rate">
            <img class="svg" src="<?echo get_template_directory_uri() ?>/assets/images/icons/rate.svg" loading="lazy" alt="rate">
            <span class="customers-reviews__rate-text">
                4.8
            </span>
            </div>
        </li>
        <li class="customers-reviews__item">
            <a class="btn"  target="_blank" rel="noopener noreferrer" href="https://www.trustpilot.com/review/admflooringdesign.com">Trustpilot</a>
            <div class="customers-reviews__rate">
            <img class="svg" src="<?echo get_template_directory_uri() ?>/assets/images/icons/rate.svg" loading="lazy" alt="rate">
            <span class="customers-reviews__rate-text">
                4.6
            </span>
            </div>
        </li>
        </ul>
    </div>
    </section>
</main>

<?php
get_footer();