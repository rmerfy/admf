<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ADM
 */

get_header();
?>

	<main class="main">

		<section class="error-404 not-found">
			<div class="container container--sm">
				<div class="error-404__inner">
					<span class="error-404__suptitle">404</span>
					<h1 class="title title--center error-404__title">The requested page was not found</h1>
					<p class="error-404__subtitle">We are working on the problem. If you need assistance please contact us by phone or email. Thank you.</p>
					<a class="btn" href="/products/">Return to shop</a>
				</div>
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
