<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ADM
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="wrapper">
	
<header class="header">
	<div class="container">
	<div class="header__inner">
		<ul class="nav-bar">
		<li class="nav-bar__menu-btn">
			<button aria-label="Menu" class="menu-btn">
			<span class="icon-menu"></span>
			<span class="visually-hidden">Menu</span>
			</button>
		</li>
		<li class="nav-bar__account-btn">
			<a title="My account" href="/account">
			<span class="icon-user"></span>
			</a>
		</li>
		<li class="nav-bar__search-btn">
			<button title="Search">
			<span class="icon-search"></span>
			</button>
		</li>
		</ul>
		<nav class="menu">

		<div class="logo logo--mobile">
			<?php the_custom_logo(); ?>
		</div>

		<div class="menu__inner">
			<button aria-label="Close" class="menu__close">
			&times;
			</button>

			<?php
			$args = array(
			 'menu_class' => 'menu__list menu__list--1',
			'theme_location'=>'header-1',
			'container'=> false,
			);
			wp_nav_menu($args);
			?>
			<div class="logo logo--header">
				<?php the_custom_logo(); ?>
			</div>
			<?php
			$args = array(
			 'menu_class' => 'menu__list menu__list--2',
			'theme_location'=>'header-2',
			'container'=> false,
			);
			wp_nav_menu($args);
			?>
		</div>
		<div class="mega-menu">
			<div class="container">
			<div class="mega-menu__inner">
				<div class="mega-menu__item">
				<a class="mega-menu__item-title" href="/all-flooring/">All flooring</a>
				<div class="mega-menu__item-content">
					<ul class="mega-menu__item-list">
					<li>Plank width</li>
					<li><a href="/all-flooring?filter_plank-width=10-1-4″%2C31-1-2″&query_type_plank-width=or">10-1/4" -> Up</a></li>
					<li><a href="/all-flooring?filter_plank-width=8-5-8″%2C8-7-8″%2C9″%2C9-3-8″%2C9-1-2″&query_type_plank-width=or">8-5/8" -> 9-1/2"</a></li>
					<li><a href="/all-flooring?filter_plank-width=7″%2C7-13-16″%2C7-1-2″%2C7-1-8″%2C6-1-2″%2C4″%2C4-3-4″&query_type_plank-width=or">Under 7-1/2"</a></li>
					</ul>
					<ul class="mega-menu__item-list">
					<li>Grade</li>
					<li><a href="/all-flooring?filter_grade=select-ab%2Cselect&query_type_grade=or">Select</a></li>
					<li><a href="/all-flooring?filter_grade=abcd-character&query_type_grade=or">Character</a></li>
					<li><a href="/all-flooring?filter_grade=rustic-select%2Crustic&query_type_grade=or">Rustic</a></li>
					</ul>
				</div>
				</div>
				<div class="mega-menu__item">
				<a class="mega-menu__item-title" href="/engineered-hardwood-catalog/">Engineered Hardwood</a>
				<div class="mega-menu__item-content">
					<ul class="mega-menu__item-list">
					<li>Finish</li>
					<li><a href="/all-flooring?filter_finish=oil&query_type_finish=or">Oil</a></li>
					<li><a href="/all-flooring?filter_finish=uv-lacquer&query_type_finish=or">Lacquer</a></li>
					<li><a href="/all-flooring?filter_finish=unfinished&query_type_finish=or">Unfinished</a></li>
					</ul>
					<ul class="mega-menu__item-list">
					<li>Color</li>
					<li><a href="/all-flooring?filter_color=light&query_type_color=or">Light</a></li>
					<li><a href="/all-flooring?filter_color=grey&query_type_color=or">Grey</a></li>
					<li><a href="/all-flooring?filter_color=dark%2Cnatural&query_type_color=or">Natural/Dark</a></li>
					</ul>
				</div>
				</div>
				<div class="mega-menu__item">
				<a class="mega-menu__item-title" href="/vinyl-catalog/">Vinyl<span class="new-label">new</span></a>
				<div class="mega-menu__item-content">
					<ul class="mega-menu__item-list">
					<li>Pattern</li>
					<li><a href="#">Versailles</a></li>
					<li><a href="#">Herringbone</a></li>
					<li><a href="#">Chevron</a></li>
					</ul>
				</div>
				</div>
				<div class="mega-menu__item">
				<a class="mega-menu__item-title" href="#">Collections</a>
				<div class="mega-menu__item-content">
					<ul class="mega-menu__item-list">
					<li>Species</li>
					<li><a href="#">Oak</a></li>
					<li><a href="#">Maple</a></li>
					<li><a href="#">Walnut</a></li>
					</ul>
				</div>
				</div>
				<div class="mega-menu__item">
				<a class="mega-menu__item-title" href="/overstock/">Overstock</a>
				<div class="mega-menu__item-content">
					<ul class="mega-menu__item-list">
					<li>Floor care & Accessories</li>
					<li><a href="/adhesives/">Adhesives</a></li>
					<li><a href="/stair-and-trim/">Stair & Trim</a></li>
					<li><a href="/care-and-maintenance/">Care & Maintence</a></li>
					</ul>
				</div>
				</div>
			</div>
			</div>
		</div>
		</nav>
		<ul class="nav-bar">
		<li class="nav-bar__phone-btn">
			<a href="tel:+18887296781">
			<span class="icon-phone"></span>
			</a>
		</li>
		<li class="nav-bar__message-btn">
			<button class="callback" title="Contact us">
			<span class="icon-message"></span>
			</button>
		</li>
		<li>
			<a class="cart-btn" href="/cart/">
			<span class="icon-cart"></span>
			</a>
		</li>
		</ul>
		<div class="search-bar">
			<?php echo do_shortcode('[fibosearch]'); ?>
		</div>
		<div class="search-bar-layout"></div>
	</div>
	</div>
	<?php if( have_rows('slider', 50) ): ?>
	<div class="swiper info-slider">
		<div class="swiper-wrapper">
		<!-- Slides -->
		<?php while ( have_rows('slider', 50) ) : the_row(); ?>
		<div class="swiper-slide">
			<a href="/promotions/"><?php  the_sub_field('title'); ?></a>
		</div>
		<?php endwhile; ?>
		</div>
	</div>
	<?php endif; ?>
</header>
