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
							<h3><?php the_field('dane_adresowe_naglowek_'); ?></h3>

							<div class="contact-info-section pt-4 mb-4">
								<div class="c-info-text">
									<?php the_field('dane_adresowe'); ?>
								</div>
								<h6 class="mt-4 mb-3"><?php the_field('informacje_kontaktowe_naglowek'); ?></h6>
								<?php 
									$c_info = get_field('informacje_kontaktowe');
									if($c_info):
								?>
								<div class="rounded-c-info mt-2">

									<!-- Phone -->
									<?php if($c_info['telefon_stacjonarny']): ?>
									<div class="rounded-c-info-item d-flex">
										<div class="rci-icon">
											<img src="<?php echo PATH_SN ?>/uploads/phone.png" alt="Phone">
										</div>
										<div class="rci-text">
											<p><a href="tel:<?php echo esc_html($c_info['telefon_stacjonarny']) ?>">
												<?php echo esc_html($c_info['telefon_stacjonarny']) ?>
											</a></p>
										</div>
									</div>
									<?php endif; ?>
									<!-- Mobile -->
									<?php if($c_info['telefon_komorkowy']): ?>
									<div class="rounded-c-info-item d-flex">
										<div class="rci-icon">
											<img src="<?php echo PATH_SN ?>/uploads/mobile-black.png" alt="Mobile">
										</div>
										<div class="rci-text">
											<p><a href="tel:<?php echo esc_html($c_info['telefon_komorkowy']) ?>">
												<?php echo esc_html($c_info['telefon_komorkowy']) ?>
											</a></p>
										</div>
									</div>
									<?php endif; ?>

									<!-- Email -->
									<?php if($c_info['adres_email']): ?>
									<div class="rounded-c-info-item d-flex">
										<div class="rci-icon">
											<img src="<?php echo PATH_SN ?>/uploads/envelope-black.svg" alt="Email">
										</div>
										<div class="rci-text">
											<p><a href="mailto:<?php echo esc_html($c_info['adres_email']) ?>">
												<?php echo esc_html($c_info['adres_email']) ?>
											</a></p>
										</div>
									</div>
									<?php endif; ?>

								</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-xl-6 col-lg-12">
							<h3><?php the_field('naglowek_sekcji_wspolpraca'); ?></h3>
							<div class="cooperation-info-section pt-4">
								<?php the_field('opis_sekcji_wspolpraca'); ?>
								<div class="pt-2">
									<p><b><?php the_field('podrzedny_naglowek_wspolpraca'); ?></b></p>
								</div>
								<?php 
									$cpr_info = get_field('wspolpraca_dane_kontaktowe');
									if($cpr_info):
								?>
								<div class="rounded-c-info mt-2">

									<!-- Phone -->
									<?php if($cpr_info['telefon_stacjonarny_cpr']): ?>
									<div class="rounded-c-info-item d-flex">
										<div class="rci-icon">
											<img src="<?php echo PATH_SN ?>/uploads/phone.png" alt="Phone">
										</div>
										<div class="rci-text">
											<p><a href="tel:<?php echo esc_html($cpr_info['telefon_stacjonarny_cpr']) ?>">
												<?php echo esc_html($cpr_info['telefon_stacjonarny_cpr']) ?>
											</a></p>
										</div>
									</div>
									<?php endif; ?>
									<!-- Mobile -->
									<?php if($cpr_info['telefon_komorkowy_cpr']): ?>
									<div class="rounded-c-info-item d-flex">
										<div class="rci-icon">
											<img src="<?php echo PATH_SN ?>/uploads/mobile-black.png" alt="Mobile">
										</div>
										<div class="rci-text">
											<p><a href="tel:<?php echo esc_html($cpr_info['telefon_komorkowy_cpr']) ?>">
												<?php echo esc_html($cpr_info['telefon_komorkowy_cpr']) ?>
											</a></p>
										</div>
									</div>
									<?php endif; ?>

									<!-- Email -->
									<?php if($cpr_info['adres_email_cpr']): ?>
									<div class="rounded-c-info-item d-flex">
										<div class="rci-icon">
											<img src="<?php echo PATH_SN ?>/uploads/envelope-black.svg" alt="Email">
										</div>
										<div class="rci-text">
											<p><a href="mailto:<?php echo esc_html($cpr_info['adres_email_cpr']) ?>">
												<?php echo esc_html($cpr_info['adres_email_cpr']) ?>
											</a></p>
										</div>
									</div>
									<?php endif; ?>

								</div>
								<?php endif; ?>
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
