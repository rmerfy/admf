<?php
/**
 * The template for displaying archive pages
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
			<h1 class="title title--center">Blog</h1>
        </div>
      </div>
      <section class="archive-posts">
        <div class="container">
          <div class="archive-posts__inner">
          <?php if ( have_posts() ) : ?>
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
          </div>
        </div>
      </section>

		
	</main><!-- #main -->
  <script>
    let currentUrl = window.location.href;

    // Отслеживание события нажатия кнопок браузера "Вперед/Назад"
    window.addEventListener("popstate", function (e) {
        let clickedPage = parseInt(location.href.match(/\d+/));
        Number.isInteger(clickedPage) ? clickedPage : clickedPage = 1;
        sendAjax(clickedPage, currentUrl);
    }, false);


    function updateLinks() {
      document.querySelectorAll('a.page-numbers').forEach(page => {
        page.addEventListener('click', (e) => {
          e.preventDefault();
          history.pushState(currentUrl, "", e.target.href);
          let clickedPage = parseInt(e.target.href.match(/\d+/));
          Number.isInteger(clickedPage) ? clickedPage : clickedPage = 1;
          sendAjax(clickedPage, currentUrl);
        });
      });
    }

    updateLinks();

    function sendAjax(page, link) {
      $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        dataType: 'html',
        data: {
          action: 'archive_posts',
          page : page,
          link : link
        },
      	beforeSend: function ( xhr ) {
      		$('.archive-posts__inner').animate({opacity: 0.5}, 300);
          window.scrollTo({
                top: 0,
          });
      	},
        success: function(res) {
        $('.archive-posts__inner').html(res);
        $('.archive-posts__inner').animate({opacity: 1}, 300);
        updateLinks();
        }
      });
    }
    
  </script>
<?php
get_footer();
