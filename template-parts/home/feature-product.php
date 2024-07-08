<section class="pt-100 pt-m-40">
	<div class="container-lg">
		<div class="row">
			<div class="col-12 pos-relative ftr-product-col-wrapper">
				<div class="ftr-product-bg-grey d-flex flex-wrap">
					<div class="ftr-product-left col-50-sn">
						<div class="ftr-left-inner d-flex flex-wrap">
							<div class="col-ftr-50-inner inner-left  d-flex align-items-end justify-content-center">
								<?php $home_ftr_pimage = get_field('zdjecie_produktu_home_ftr'); ?>
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
							<?php the_field('nazwa_produktu_home_ftr'); ?>
						</h2>
						<div class="about-desc-area">
							<p class="pb-2">
								<?php the_field('opis_produktu_home_ftr'); ?>
							</p>
							<?php 
							$etykieta_przycisku_home_ftr = get_field('etykieta_przycisku_home_ftr');
							$link_do_przycisku_home_ftr = get_field('link_do_przycisku_home_ftr');
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