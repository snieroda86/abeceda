<section  class="section-recent-products woocommerce pt-md-4">
	<div class="section-wrapper-sn pt-100">
		<div class="container-lg">
			<div class="row g-5">
				<div class="col-md-6">
					<h2 class="section-title-sn pb-4">
						<?php the_field('heading_home_about'); ?>
					</h2>
					<div class="about-desc-area">
						<?php the_field('desc_home_about'); ?>
					</div>	
					<?php 
					$about_btn_label = get_field('btn_label_home_about');
					$about_btn_url = get_field('link_btn_home_about');
					if( $about_btn_label && $about_btn_url ): ?>	
						<div class="mt-4 pt-2">
							<a href="<?php echo esc_url($about_btn_url); ?>" class="btn btn-bordered">
								<?php echo esc_html($about_btn_label); ?>
							</a>
						</div>
					<?php endif; ?>

				</div>

				<div class="col-md-6">
					<?php if($home_about_ftr_img = get_field('home_about_ftr_img')): ?>
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