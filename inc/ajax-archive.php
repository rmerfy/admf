<?php 

// archive template

if ( have_posts() ) : ?>
<?php
echo '<ul class="archive-posts__list">';
    while ( have_posts() ) : the_post();
    
        get_template_part( 'template-parts/content', get_post_format() );
    
    endwhile;
echo '</ul>';

echo '<div class="archive-pagination">';

the_posts_pagination( array(
    'prev_text'          => __( '←', 'adm' ),
    'next_text'          => __( '→', 'adm' ),
    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'adm' ) . ' </span>',
) );

echo '</div>';

else :
    get_template_part( 'template-parts/content', 'none' );
endif;
?>