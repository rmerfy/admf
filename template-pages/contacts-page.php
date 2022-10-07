<?php
/*
Template Name: Contact Us
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
			<h1 class="title title--center"><?php the_title() ?></h1>
		</div>
	</div>
	<section class="contacts">
        <div class="container">
          <ul class="contacts__items">
            <li>
              <img class="svg" src="<?echo get_template_directory_uri() ?>/assets/images/icons/contact-phone.svg" alt="phone">
              <div class="contacts__item-content">
                <h3 class="contacts__item-title">Call us</h3>
                <p class="contacts__item-subtitle">Save time by calling us directly.</p>
                <a class="contacts__item-link hover-animation" href="tel:+18887296781">+1 (888) 729 - 6781</a>
              </div>
            </li>
            <li>
              <img class="svg" src="<?echo get_template_directory_uri() ?>/assets/images/icons/contact-email.svg" alt="email">
              <div class="contacts__item-content">
                <h3 class="contacts__item-title">Send us a message</h3>
                <p class="contacts__item-subtitle">We will respond quickly to resolve</p>
                <a class="contacts__item-link hover-animation"
                  href="mailto:info@admflooring.com">info@admflooring.com</a>
              </div>
            </li>
            <li>
              <img class="svg" src="<?echo get_template_directory_uri() ?>/assets/images/icons/contact-office.svg" alt="office">
              <div class="contacts__item-content">
                <h3 class="contacts__item-title">Business hours</h3>
                <p class="contacts__item-subtitle">Save time by calling us directly.</p>
                <p>
                  Monday – Friday<br>
                  8:00am to 4:00pm (PDT)<br>
                  Saturday and Sunday – Closed
                </p>
              </div>
            </li>
          </ul>
          <div class="contacts__inner">
            <div class="contacts__map">
              <h4 class="title-2">
                Check out our showroom!
              </h4>
              <iframe class="google_map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3307.7080468185304!2d-118.20773266939034!3d34.00003206021614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c8d4a07d5fd9%3A0x53740df35d31fd4!2sADM%20Flooring!5e0!3m2!1sen!2sus!4v1664217454068!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="contacts__form">
              <h4 class="title-2">
                Lets talk
              </h4>
              <span class="modal-form__form-subtitle">
                Fields marked with an * are required
              </span>
              <?php echo do_shortcode('[contact-form-7 id="17" title="Contact Us"]') ?>
            </div>
          </div>
        </div>
      </section>
</main>

<?php
get_footer();