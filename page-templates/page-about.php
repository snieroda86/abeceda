<?php
/**
 * Template Name: O nas
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

get_header('page');
?>

	<main id="primary" class="site-main page-about">
		<section  class="section-recent-products woocommerce pt-md-4">
			<div class="section-wrapper-sn pt-100 pt-m-40">
				<div class="container-lg">
					<div class="row g-5">
						<div class="col-md-6">
							<h2 class="section-title-sn pb-4">
								<?php the_field('about_naglowek_sekcji'); ?>
							</h2>
							<div class="about-desc-area">
								<?php the_field('about_opis_sekcji'); ?>
							</div>	
							<?php 
							$about_btn_label = get_field('about_etykieta_przycisku');
							$about_btn_url = get_field('about_link_do_przycisku');
							if( $about_btn_label && $about_btn_url ): ?>	
								<div class="mt-4 pt-2">
									<a href="<?php echo esc_url($about_btn_url); ?>" class="btn btn-bordered">
										<?php echo esc_html($about_btn_label); ?>
									</a>
								</div>
							<?php endif; ?>
						</div>

						<div class="col-md-6">
							<?php if($home_about_ftr_img = get_field('about_obrazek_sekcji')): ?>
							<div class="about-img-home pos-relative">
								<img class="img-fluid pos-relative z-2 about-img" src="<?php echo esc_url($home_about_ftr_img['url']); ?>" alt="<?php echo esc_attr($home_about_ftr_img['alt']); ?>">
								<div class="about-img-shadow"></div>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="pt-100">
			<div class="container-lg">
				<div class="row">
					<div class="col-12 pos-relative ftr-product-col-wrapper">
						<div class="ftr-product-bg-grey d-flex flex-wrap">
							<div class="ftr-product-left col-50-sn">
								<div class="ftr-left-inner d-flex flex-wrap">
									<div class="col-ftr-50-inner inner-left  d-flex align-items-end justify-content-center">
										<?php $home_ftr_pimage = get_field('about_zdjecie_produktu'); ?>
										<?php if($home_ftr_pimage): ?>
										<img class="img-fluid" src="<?php echo esc_url($home_ftr_pimage['url']); ?>" alt="<?php echo esc_attr($home_ftr_pimage['alt']); ?>">
										<?php endif; ?>
									</div>
									<div class="col-ftr-50-inner inner-right d-flex align-items-end">
										<div class="text-start">
											<div>
												<img class="img-fluid" src="<?php echo PATH_SN ?>/uploads/logo-white.png" alt="Logo">
											</div >
											<div class="pt-4">
												<h4 class="text-white text-start">Patronat medialny</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="ftr-product-right col-50-sn">
								<h2 class="section-title-sn pb-4">
									<?php the_field('about_nazwa_produktu'); ?>
								</h2>
								<div class="about-desc-area">
									<div class="pb-2">
										<?php the_field('about_opis_produktu'); ?>
									</div>
									<?php 
									$etykieta_przycisku_home_ftr = get_field('about_fproduct_label');
									$link_do_przycisku_home_ftr = get_field('about_fproduct_btn_url');
									?>
									<?php if($etykieta_przycisku_home_ftr && $link_do_przycisku_home_ftr): ?>
									<div class="pt-4">
									    <a href="<?php echo esc_url($link_do_przycisku_home_ftr); ?>" class="btn">
									        <?php echo esc_html($etykieta_przycisku_home_ftr); ?>
									    </a>
									</div>
									<?php endif; ?>
								</div>		
							</div>				
						</div>
						<div class="ftr-product-shadow"></div>

					</div>
				</div>
			</div>
		</section>
	</main><!-- #main -->
<?php
get_footer();
