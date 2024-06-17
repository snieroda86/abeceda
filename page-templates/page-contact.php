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
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="contact-info-sn pt-3 mb-3">
							<div class="contact-info-sn-box">
								<h1 class="contact-info-h1">Dane kontaktowe</h1>
								<div>
									<?php the_content(); ?>
								</div>

								<div class="pt-3">
									<ul class="contact-sn-list">

										<?php if(get_field('telefon_kontaktowy' , 'option')): ?>
						        		<li>
						        			<div class="d-flex pb-1">
						        				<div class="d-flex align-items-center pr-1">
						        					<img src="<?php echo PATH_SN ?>/uploads/phone.png">
						        				</div>
						        				<div class="d-flex align-items-center">
						        					<a href="tel:<?php the_field('telefon_kontaktowy' , 'option') ?>"  class="p-0 m-0">
						        						<p class=" m-0 font-weight-bold"><?php the_field('telefon_kontaktowy' , 'option') ?></p>
						        					</a>
						        				</div>

						        			</div>
						        		</li>
						        		<?php endif; ?>

						        		<?php if(get_field('adres_email' , 'option')): ?>
						        		<li>
						        			<div class="d-flex pb-1">
						        				<div class="d-flex align-items-center pr-1">
						        					<img src="<?php echo PATH_SN ?>/uploads/envelope.png">
						        				</div>
						        				<div class="d-flex align-items-center">
						        					<a href="mailto:<?php the_field('adres_email' , 'option') ?>"  class="p-0 m-0">
						        						<p class="footer-text m-0">
						        							<?php the_field('adres_email' , 'option') ?>
						        								
						        						</p>
						        					</a>
						        				</div>

						        			</div>
						        		</li>
						        		<?php endif; ?>
						        	</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8 col-md-6 pl-md-5">
						<div class="cf-wrapper-sn  pt-3">
							<h2 class="section-title-sn pb-2 pt-0 mt-0">
								Formularz kontaktowy
							</h2>
							<div class="cf-form-wrapper">
								<?php echo do_shortcode('[wpforms id="142"]'); ?>
							</div>
						</div>
					</div>
				</div>

			
			
		</div>

		<!-- Google map -->

		<section>
			<div  class="pb-5">
				<?php the_field('mapa_z_lokalizacja'); ?>
			</div>
		</section>


		<?php endwhile; ?>
	</main><!-- #main -->
<?php
get_footer();
