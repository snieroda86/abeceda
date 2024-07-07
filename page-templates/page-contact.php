<?php
/**
 * Template Name: Kontakt
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

get_header();
?>

	<main id="primary" class="site-main page-about">
		
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="container-lg pt-5 pb-5">
			<div class="row g-5">
				<div class="col-md-6">
					<div class="row g-5">
						<div class="col-xl-6 col-lg-12">
							<h3>Kontakt</h3>

							<div class="contact-info-section pt-4 mb-4">
								<div class="c-info-text">
									<p><b>ABECEDA - centrum języków obcych</b></p>
									<p>ABECEDA Piotr Zalewski</p>
									<p>17-go Sierpnia 2/13,</p>
									<p>41-503 Chorzów</p>
									<p>NIP: 6272628891</p>
									
								</div>
								<h6 class="mt-4 mb-3">Księgarnia</h6>
								<div class="rounded-c-info mt-2">

									<!-- Phone -->
									<div class="rounded-c-info-item d-flex">
										<div class="rci-icon">
											<img src="<?php echo PATH_SN ?>/uploads/phone.png" alt="Phone">
										</div>
										<div class="rci-text">
											<p>+420 730 975 941</p>
										</div>
									</div>
									<!-- Mobile -->
									<div class="rounded-c-info-item d-flex">
										<div class="rci-icon">
											<img src="<?php echo PATH_SN ?>/uploads/mobile-black.png" alt="Mobile">
										</div>
										<div class="rci-text">
											<p>+420 730 975 941</p>
										</div>
									</div>
									<!-- Email -->
									<div class="rounded-c-info-item d-flex">
										<div class="rci-icon">
											<img src="<?php echo PATH_SN ?>/uploads/envelope-black.svg" alt="Email">
										</div>
										<div class="rci-text">
											<p><a href="mailto:sklep@abeceda.pl">sklep@abeceda.pl</a></p>
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="col-xl-6 col-lg-12">
							<h3>Współpraca</h3>
							<div class="cooperation-info-section pt-4">
								<p><b>Współpracujemy w zakresie:</b></p>
								<ul class="check-list-sn">
									<li>tłumaczeń pisemnych i ustnych</li>
									<li>kursach</li>
									<li>obsługach firm.</li>

								</ul>
								<div class="pt-2">
									<p><b>Jesteś zainteresowany?</b></p>
									<p><b>Jesteśmy do twojej dyspozycji!</b></p>

									<div class="rounded-c-info mt-3">
										<!-- Email -->
										<div class="rounded-c-info-item d-flex">
											<div class="rci-icon">
												<img src="<?php echo PATH_SN ?>/uploads/envelope-black.svg" alt="Email">
											</div>
											<div class="rci-text">
												<p><a href="mailto:sklep@abeceda.pl">sklep@abeceda.pl</a></p>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="cf-wrapper-sn">
						<div class="cf-wrapper-inner">
							<h3 class="text-white text-center">
								Wypełnij formularz
							</h3>
							<div class="cf-form-wrapper">
								<?php echo do_shortcode('[wpforms id="222"]'); ?>
							</div>	
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</main><!-- #main -->
<?php
get_footer();
