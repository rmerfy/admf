<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ADM
 */

?>
	<section class="info">
		<div class="container">
			<ul class="info__items">
			<li class="info__item wow animate__animated animate__fadeInUp">
				<h4 class="info__item-title title">Call</h4>
				<p class="info__item-text">
				We are open <br>
				M-F 8:00AM to 4:00PM PST
				</p>
				<a class="btn" href="tel:+18887296781">+1 (888) 729 - 6781</a>
			</li>
			<li class="info__item wow animate__animated animate__fadeInUp animate__delay-1s">
				<h4 class="info__item-title title">FAQ'S</h4>
				<p class="info__item-text">
				Find questions and answers <br> to common topics.
				</p>
				<a class="btn" href="/faq/">See All FAQS</a>
			</li>
			<li class="info__item wow animate__animated animate__fadeInUp animate__delay-2s">
				<h4 class="info__item-title title">EMAIL</h4>
				<p class="info__item-text">
				We typically respond within<br>
				business 1-hour.
				</p>
				<a class="btn" href="mailto:info@admflooring.com">info@admflooring.com</a>
			</li>
			</ul>
		</div>
	</section>
	<div class="admbathroom-banner">
		<div class="container">
			<div class="admbathroom-banner__inner">
			<a class="btn btn--ts-black" href="http://admbathroom.com" target="_blank">ADM BATHROOM - MODERN, YET
				MINIMALISTIC BATHROOM FIXTURES</a>
			<a class="btn btn--ts-black" href="http://admbathroom.com" target="_blank">VISIT US</a>
			</div>
		</div>
	</div>
	<footer class="footer" id="footer">
      <div class="container">
        <div class="footer__inner">
          <div class="logo logo--footer">
				  <?php the_custom_logo(); ?>
          </div>
          <div class="footer__item">
            <span class="title footer__title">RESOURCES</span>
            <?php
			$args = array(
			 'menu_class' => 'footer__list',
			'theme_location'=>'footer-1',
			'container'=> false,
			);
			wp_nav_menu($args);
			?>
          </div>
          <div class="footer__item">
            <span class="title footer__title">POLICIES</span>
            <?php
			$args = array(
			 'menu_class' => 'footer__list',
			'theme_location'=>'footer-2',
			'container'=> false,
			);
			wp_nav_menu($args);
			?>
          </div>
          <div class="footer__item">
            <span class="title footer__title">CONTACT</span>
            <ul class="footer__list">
              <li>
                <a href="tel:+18887296781">+1 (888) 729 - 6781</a>
              </li>
              <li>
                <a href="mailto:info@admflooring.com">info@admflooring.com</a>
              </li>
              <li>
                <a href="https://www.google.com/maps/dir//ADM+Flooring+Vernon,+CA+90058/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x80c2c8d4a07d5fd9:0x53740df35d31fd4?sa=X&ved=2ahUKEwi3wu7Oxo_vAhXyHDQIHUjhBHwQ9RcwE3oECCwQBQ" target="_blank" rel="noopener noreferrer">
                  3340 Leonis Blvd.<br> Suite B
                  Vernon, CA 90058
                </a>
              </li>
              <li>
                Monday - Friday <br>
                <span class="hover-animation">8:00am - 4:00pm PST</span>
              </li>
            </ul>
          </div>
          <div class="footer__item">
            <span class="title footer__title">Sign up and save</span>
            <p class="footer__subtitle">Subscribe to get special offers,<br> free giveaways, and once-in-a-lifetime
              deals.</p>
            <form class="subscribe-form">
              <input type="email" placeholder="E-mail">
              <button class="btn btn--black">Subscribe</button>
            </form>
            <div class="awards">
              <a target="_blank" rel="noopener noreferrer" href="https://www.bbb.org/us/ca/vernon/profile/wholesalers-and-distributors/a-d-m-bathroom-design-1216-13082158">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/awards/01.png" alt="BBB">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://admflooring.com/wp-content/uploads/2022/03/flooring_certification_2022.pdf">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/awards/02.png" alt="ATCM">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://nwfa.org/">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/awards/03.png" alt="nwfa">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://admflooring.com/shipping/">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/awards/04.png" alt="Canada">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/awards/05.png" alt="houzz 2014">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/awards/06.png" alt="houzz 2015">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/awards/07.png" alt="houzz 2016">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/awards/08.png" alt="houzz 2017">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/awards/09.png" alt="houzz 2018">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/awards/10.png" alt="houzz 2018 design">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/awards/11.png" alt="houzz 2019">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/awards/12.png" alt="houzz 2020">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/awards/13.png" alt="houzz 2021">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img src="<?echo get_template_directory_uri() ?>/assets/images/awards/14.png" alt="houzz 2022">
              </a>
            </div>
          </div>
        </div>
		<img class="svg footer__payments" src="<?echo get_template_directory_uri() ?>/assets/images/icons/payments.svg" alt="payments">
        <p class="copyright">
			&copy; 2022 ADM Flooring<br>
			All rights reserved. Various trademarks held by their respective owners.
		</p>
      </div>
    </footer><!-- #colophon -->
</div><!-- #page -->
<div class="modal-callback d-none">
	<div class="modal-form">
		<h4 class="title modal-form__form-title">
		Contact us
		</h4>
		<span class="modal-form__form-subtitle">
		Fields marked with an * are required
		</span>
		<?php echo do_shortcode('[contact-form-7 id="17" title="Contact Us"]') ?>
	</div>
</div>

<?php wp_footer(); ?>

<script>
	const callbackBtns = document.querySelectorAll('.callback');

	const callbackModal = new tingle.modal({
		footer: false,
		stickyFooter: false,
		closeMethods: ['overlay', 'button', 'escape'],
		closeLabel: "Закрыть",
		cssClass: ['modal-sm'],
	});

	callbackModal.setContent(document.querySelector(".modal-callback").innerHTML);

	callbackBtns.forEach((callbackBtn) => {
		callbackBtn.addEventListener('click', function () {
		callbackModal.open();
		});
	});
	if(document.querySelector('.accordion-faq')) new Accordion('.accordion-faq');
</script>

</body>
</html>
