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
			<li class="info__item wow animate__animated animate__fadeInUp animate__faster">
				<h4 class="info__item-title title">Call</h4>
				<p class="info__item-text">
				We are open <br>
				M-F 8:00AM to 4:00PM PST
				</p>
				<a class="btn" href="tel:+18887296781">+1 (888) 729 - 6781</a>
			</li>
			<li class="info__item wow animate__animated animate__fadeInUp animate__delay-1s animate__faster">
				<h4 class="info__item-title title">FAQ'S</h4>
				<p class="info__item-text">
				Find questions and answers <br> to common topics.
				</p>
				<a class="btn" href="/faq/">See All FAQS</a>
			</li>
			<li class="info__item wow animate__animated animate__fadeInUp animate__delay-2s animate__faster">
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
    <img class="admbathroom-banner__img" loading="lazy" src="/wp-content/uploads/2022/10/admbathroom.jpg" alt="admbathroom">
		<div class="container">
			<div class="admbathroom-banner__inner">
			<a class="btn btn--ts-black" href="http://admbathroom.com" target="_blank">ADM BATHROOM - MODERN AND YET
				MINIMALISTIC BATHROOM FIXTURES</a>
			<a class="btn btn--ts-black" href="http://admbathroom.com/collections" target="_blank">Checkout bathroom catalog</a>
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
            <!-- subscribe -->
            <div id="mlb2-5755158" class="ml-form-embedContainer ml-subscribe-form ml-subscribe-form-5755158">
            <div class="ml-form-align-center">
                <div class="ml-form-embedWrapper embedForm">
                    <div class="ml-form-embedBody ml-form-embedBodyDefault row-form">
                        <form class="ml-block-form subscribe-form" action="https://static.mailerlite.com/webforms/submit/n2u1z4"
                            data-code="n2u1z4" method="post" target="_blank">
                            <div class="ml-form-formContent">
                                <div class="ml-form-fieldRow ml-last-item">
                                    <div class="ml-field-group ml-field-email ml-validate-email ml-validate-required">
                                        <input aria-label="email" aria-required="true" type="email" class="form-control"
                                            data-inputmask="" name="fields[email]" placeholder="Email" autocomplete="email">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="ml-submit" value="1">
                            <div class="ml-form-embedSubmit">
                                <button type="submit" class="btn btn--black primary">Subscribe</button>
                                <button disabled="disabled" style="display:none" type="button" class="btn loading">
                                    <div class="ml-form-embedSubmitLoad"></div> <span class="sr-only">Loading...</span>
                                </button>
                            </div>
                            <input type="hidden" name="anticsrf" value="true">
                        </form>
                    </div>
                    <div class="ml-form-successBody row-success" style="display:none">
                        <div class="ml-form-successContent">
                            <h4>Thank you!</h4>
                            <p>You have successfully joined our subscriber list.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function ml_webform_success_5755158() { var r = ml_jQuery || jQuery; r(".ml-subscribe-form-5755158 .row-success").show(), r(".ml-subscribe-form-5755158 .row-form").hide() }
        </script>
        <img src="https://track.mailerlite.com/webforms/o/5755158/n2u1z4?v1661277187" width="1" height="1"
            style="max-width:1px;max-height:1px;visibility:hidden;padding:0;margin:0;display:block" alt="web">
        <script src="https://static.mailerlite.com/js/w/webforms.min.js?v7316d10e2931a97c7b0f5c7e7e7be3ea"></script>
            <!-- /subscribe -->
            <div class="awards">
              <a target="_blank" rel="noopener noreferrer" href="https://www.bbb.org/us/ca/vernon/profile/wholesalers-and-distributors/a-d-m-bathroom-design-1216-13082158">
                <img  loading="lazy" src="<?echo get_template_directory_uri() ?>/assets/images/awards/01.png" alt="BBB">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://admflooring.com/wp-content/uploads/2022/03/flooring_certification_2022.pdf">
                <img  loading="lazy" src="<?echo get_template_directory_uri() ?>/assets/images/awards/02.png" alt="ATCM">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://nwfa.org/">
                <img  loading="lazy" src="<?echo get_template_directory_uri() ?>/assets/images/awards/03.png" alt="nwfa">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://admflooring.com/shipping/">
                <img  loading="lazy" src="<?echo get_template_directory_uri() ?>/assets/images/awards/04.png" alt="Canada">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img  loading="lazy" src="<?echo get_template_directory_uri() ?>/assets/images/awards/05.png" alt="houzz 2014">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img  loading="lazy" src="<?echo get_template_directory_uri() ?>/assets/images/awards/06.png" alt="houzz 2015">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img  loading="lazy" src="<?echo get_template_directory_uri() ?>/assets/images/awards/07.png" alt="houzz 2016">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img  loading="lazy" src="<?echo get_template_directory_uri() ?>/assets/images/awards/08.png" alt="houzz 2017">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img  loading="lazy" src="<?echo get_template_directory_uri() ?>/assets/images/awards/09.png" alt="houzz 2018">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img  loading="lazy" src="<?echo get_template_directory_uri() ?>/assets/images/awards/10.png" alt="houzz 2018 design">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img  loading="lazy" src="<?echo get_template_directory_uri() ?>/assets/images/awards/11.png" alt="houzz 2019">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img  loading="lazy" src="<?echo get_template_directory_uri() ?>/assets/images/awards/12.png" alt="houzz 2020">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img  loading="lazy" src="<?echo get_template_directory_uri() ?>/assets/images/awards/13.png" alt="houzz 2021">
              </a>
              <a target="_blank" rel="noopener noreferrer" href="https://www.houzz.com/professionals/hardwood-flooring-dealers-and-installers/adm-flooring-design-pfvwus-pf~1477051655">
                <img  loading="lazy" src="<?echo get_template_directory_uri() ?>/assets/images/awards/14.png" alt="houzz 2022">
              </a>
            </div>
          </div>
        </div>
		<img class="svg footer__payments" src="<?echo get_template_directory_uri() ?>/assets/images/icons/payments.svg" alt="payments">
        <p class="copyright">&copy; 2022 ADM Flooring<br> All rights reserved. Various trademarks held by their respective owners.</p>
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
  (function(){
    var s = document.createElement('script'),
    e = ! document.body ? document.querySelector('head') : document.body;
    s.src = 'https://acsbapp.com/apps/app/dist/js/app.js';
    s.async = true;
    s.onload = function(){
        acsbJS.init({
                statementLink    : '',
                footerHtml       : '',
                hideMobile       : false,
                hideTrigger      : false,
                language         : 'en',
                position         : 'right',
                leadColor        : '#146FF8',
                triggerColor     : '#146FF8',
                triggerRadius    : '50%',
                triggerPositionX : 'right',
                triggerPositionY : 'bottom',
                triggerIcon      : 'people',
                triggerSize      : 'medium',
                triggerOffsetX   : 20,
                triggerOffsetY   : 20,
                mobile           : {
                    triggerSize      : 'small',
                    triggerPositionX : 'right',
                    triggerPositionY : 'center',
                    triggerOffsetX   : 0,
                    triggerOffsetY   : 0,
                    triggerRadius    : '50%'
                }
        });
    };
    e.appendChild(s);
}());
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.1/cookieconsent.min.js" data-cfasync="false"></script>
<script>
// https://2gdpr.com/cookieconsent

window.addEventListener('load', function(){
  window.cookieconsent.initialise({
   revokeBtn: "<div class='cc-revoke'></div>",
   type: "opt-in",
   position: "bottom-left",
   theme: "classic",
   palette: {
       popup: {
           background: "#000",
           text: "#fff"
        },
       button: {
           background: "#b9de16",
           text: "#000"
        }
    },
   content: {
       link: "Privacy policy",
       href: "/privacy/"
    },
    onInitialise: function(status) {
      if(status == cookieconsent.status.allow) myScripts();
    },
    onStatusChange: function(status) {
      if (this.hasConsented()) myScripts();
    }
  })
});

function myScripts() {

   // Paste here your scripts that use cookies requiring consent. See examples below
   
}
</script>

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
