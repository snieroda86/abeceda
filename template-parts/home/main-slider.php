
<section  class="section-bg-grey">
	<div class="section-wrapper-sn py-3">
		<div class="container-lg">
			<div class="row">
				<div class="shop-sidebar-sn">
					<?php echo do_shortcode('[categories_sidebar_sn]'); ?>
				</div>
				<div class="slider-home-col">
					<div class="main-slider-sn-wrapper">


						<?php

						if( have_rows('slider_home_sn') ): ?>
							<div class="main-slider-sn">
							<?php
						    while( have_rows('slider_home_sn') ) : the_row();

						        $tlo_slajdu = get_sub_field('tlo_slajdu');
						        $naglowek_na_slajdzie = get_sub_field('naglowek_na_slajdzie');
						        $opis_na_slajdzie = get_sub_field('opis_na_slajdzie');
						        $adres_url_przycisku = get_sub_field('adres_url_przycisku');

						        ?>

						        <div  style="background-image: url(<?php echo $tlo_slajdu; ?>);background-size:cover;background-position:center center;">
									<div class="main-slider-item-inner">
										<div class="ms-inner-bs">
											<div class="ms-item-heading">
												<h2><?php echo $naglowek_na_slajdzie; ?></h2>
											</div>
											<div class="ms-item-desc">
												<p>
													<?php echo $opis_na_slajdzie; ?>
												</p>
											</div>
											<?php if($adres_url_przycisku): ?>
											<div class="ms-item-button">
												<a href="<?php echo $adres_url_przycisku; ?>" class="btn-main-sn btn-bg-gradient">
													<div class="btn-sn-inner">
														<p>Zobacz produkty</p>
													</div>
												</a>
											</div>
											<?php endif; ?>
										</div>
									</div>
								</div>

						    <?php endwhile; ?>
						    </div>
						    <!-- Custom arrows -->
							<div class="ms-custom-arrows">
								<div class="ms-prev">
									<img src="<?php echo PATH_SN ?>/uploads/angle-left.svg"  alt="Porzedni">
								</div>
								<div class="ms-next">
									<img src="<?php echo PATH_SN ?>/uploads/angle-right.svg"  alt="Następny">
								</div>
							</div>
						<?php endif; ?>
							
						

						
					</div>

					<!-- Product tabs -->
					<div class="product-tabs-sn-wrapper pt-4">
						<ul class="nav nav-tabs" id="product-tabs-sn" role="tablist">
						  <li class="nav-item">
						    <a class="nav-link active" id="bestsellers-btn-sn" data-toggle="tab" href="#bestsellers-tab-sn" role="tab" aria-controls="bestsellers-tab-sn"
						      aria-selected="true"><?php _e('Polecane' , 'web14devsn'); ?></a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="latest-products-btn-sn" data-toggle="tab" href="#latest-products-tab-sn" role="tab" aria-controls="latest-products-tab-sn"
						      aria-selected="false"><?php _e('Nowości' , 'web14devsn'); ?></a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="onsale-products-btn-sn" data-toggle="tab" href="#onsale-products-tab-sn" role="tab" aria-controls="onsale-products-tab-sn"
						      aria-selected="false"><?php _e('Promocje' , 'web14devsn'); ?></a>
						  </li>
						</ul>
						<div class="tab-content" id="tab-content-products-sn">
						  <div class="tab-pane fade show active" id="bestsellers-tab-sn" role="tabpanel" aria-labelledby="bestsellers-btn-sn">
						  	
						  	<?php echo do_shortcode('[products limit="3" columns="3" visibility="visible"  featured="true"]'); ?>


						  </div>
						  <div class="tab-pane fade" id="latest-products-tab-sn" role="tabpanel" aria-labelledby="latest-products-btn-sn">
						  	
						  	<?php echo do_shortcode('[products limit="3" columns="3" orderby="date" order="DESC" visibility="visible" recent="true"]'); ?>

						  </div>
						  <div class="tab-pane fade" id="onsale-products-tab-sn" role="tabpanel" aria-labelledby="onsale-products-btn-sn">
						  	<?php echo do_shortcode('[products limit="3" columns="3" orderby="id" order="DESC" visibility="visible" on_sale="true"]'); ?>

						  </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>







