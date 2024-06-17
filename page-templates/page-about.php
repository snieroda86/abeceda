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
		<div class="container-lg">
			<!-- Section 1 -->
			<section class="sec-about-1">
				<div class="d-flex flex-wrap">
					<div class="col-about-left pt-190 order-2 order-sm-1">
						<h1 class="page-section-h1"><?php the_field('naglowek_sekcja_1'); ?></h1>
						<p class="page-text pt-4 pb-4"><?php the_field('opis_sekcja_1'); ?></p>
						<a href="#kim-jestesmy" class="btn-main-sn btn">
							<span>Więcej</span>
						</a>
					</div>
					<div class="col-about-right text-right pt-3 order-1 order-sm-2 pos-rel">
						<img src="<?php echo PATH_SN ?>/uploads/onas-1.png" class="img-fluid">
						<!-- Moving blob start -->
						<div class="moving-blob-sn">
							<!-- Blob start -->
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" width="100%" id="blobSvg" style="opacity: 1;" transform="rotate(-97)" filter="blur(2.2px)">                        
								<defs>                        
								<linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%"><stop offset="0%" style="stop-color: rgb(240, 250, 255);"></stop><stop offset="100%" style="stop-color: rgb(240, 250, 255);"></stop></linearGradient>                        
								</defs>                                            
								<path id="blob" fill="url(#gradient)" style="opacity: 0.8;"><animate attributeName="d" dur="10s" repeatCount="indefinite" values="M384.02639,318.52969Q359.04619,387.05939,278.02474,435.01815Q197.0033,482.97691,137.94391,408.01485Q78.88453,333.05279,75.91422,249.0132Q72.94391,164.97361,138.46041,107.43731Q203.97691,49.90102,276.0132,88.41917Q348.04949,126.93731,378.52804,188.46866Q409.0066,250,384.02639,318.52969Z;M390.7302,319.10952Q360.37524,388.21905,284.62068,409.39959Q208.86612,430.58014,161.11156,373.20082Q113.35701,315.8215,88.46857,238.04463Q63.58014,160.26776,136.76776,117.04463Q209.95537,73.8215,303.79007,69.52027Q397.62476,65.21905,409.35497,157.60952Q421.08517,250,390.7302,319.10952Z;M388.67097,319.27849Q360.55699,388.55699,291.23441,379.72688Q221.91183,370.89678,145.00645,354.28387Q68.10108,337.67097,71.32903,251.33548Q74.55699,165,142.39247,119.95591Q210.22796,74.91183,286.12043,91.61398Q362.0129,108.31613,389.39892,179.15806Q416.78495,250,388.67097,319.27849Z;M384.02639,318.52969Q359.04619,387.05939,278.02474,435.01815Q197.0033,482.97691,137.94391,408.01485Q78.88453,333.05279,75.91422,249.0132Q72.94391,164.97361,138.46041,107.43731Q203.97691,49.90102,276.0132,88.41917Q348.04949,126.93731,378.52804,188.46866Q409.0066,250,384.02639,318.52969Z"></animate>
								</path>
							</svg>
							<!-- Blob end -->
						</div>
						<!-- Moving blob end -->
					</div>

				</div>
			</section>

			<!-- Section 2 -->

			<section class="sec-about-2 pt-3" id="kim-jestesmy">
				<div class="row pt-5">
					<div class="col-md-6 pt-190 order-2 order-sm-1" style="position: relative;z-index:2;">
						<h2 class="page-section-h2"><?php the_field('naglowek_sekcja_2'); ?></h2>
						<p class="page-text pt-4 pb-4"><?php the_field('opis_sekcja_2'); ?></p>
						<a href="#nasz-zespol" class="btn-main-sn btn">
							<span>Więcej</span>
						</a>
					</div>
					<div class="col-md-6 order-1 order-sm-2 pos-rel about-col-blob-2">
						<img src="<?php echo PATH_SN ?>/uploads/onas-2.png" class="img-fluid">
						<!-- Moving blob start -->
						<div class="moving-blob-sn">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" width="100%" id="blobSvg" style="opacity: 1;" transform="rotate(-97)" filter="blur(2.2px)">                        
								<defs>                        
								<linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%"><stop offset="0%" style="stop-color: rgb(240, 250, 255);"></stop><stop offset="100%" style="stop-color: rgb(240, 250, 255);"></stop></linearGradient>                        
								</defs>                                            
								<path id="blob" fill="url(#gradient)" style="opacity: 0.8;"><animate attributeName="d" dur="10s" repeatCount="indefinite" values="M384.02639,318.52969Q359.04619,387.05939,278.02474,435.01815Q197.0033,482.97691,137.94391,408.01485Q78.88453,333.05279,75.91422,249.0132Q72.94391,164.97361,138.46041,107.43731Q203.97691,49.90102,276.0132,88.41917Q348.04949,126.93731,378.52804,188.46866Q409.0066,250,384.02639,318.52969Z;M390.7302,319.10952Q360.37524,388.21905,284.62068,409.39959Q208.86612,430.58014,161.11156,373.20082Q113.35701,315.8215,88.46857,238.04463Q63.58014,160.26776,136.76776,117.04463Q209.95537,73.8215,303.79007,69.52027Q397.62476,65.21905,409.35497,157.60952Q421.08517,250,390.7302,319.10952Z;M388.67097,319.27849Q360.55699,388.55699,291.23441,379.72688Q221.91183,370.89678,145.00645,354.28387Q68.10108,337.67097,71.32903,251.33548Q74.55699,165,142.39247,119.95591Q210.22796,74.91183,286.12043,91.61398Q362.0129,108.31613,389.39892,179.15806Q416.78495,250,388.67097,319.27849Z;M384.02639,318.52969Q359.04619,387.05939,278.02474,435.01815Q197.0033,482.97691,137.94391,408.01485Q78.88453,333.05279,75.91422,249.0132Q72.94391,164.97361,138.46041,107.43731Q203.97691,49.90102,276.0132,88.41917Q348.04949,126.93731,378.52804,188.46866Q409.0066,250,384.02639,318.52969Z"></animate>
								</path>
							</svg>
						</div>

						<!-- Moving blob end -->
					</div>

				</div>
			</section>

			<!-- Our team -->
			<section class="sec-about-3 pt-sm-0 pt-5" id="nasz-zespol">
				<div class="row pt-3">
					<div class="col-lg-6 col-md-8">
						<h2 class="page-section-h2"><?php the_field('naglowek_sekcja_3'); ?></h2>
						<p class="page-text pt-4 pb-4"><?php the_field('opis_sekcja_3'); ?></p>
					</div>
					<div class="col-lg-6 col-md-4"></div>
				</div>
				<!-- Team -->
				<div class="row pt-5">
					<?php
					if( have_rows('zespol_czlonkowie') ):
					    while( have_rows('zespol_czlonkowie') ) : the_row();
					        $zdjecie_tm = get_sub_field('zdjecie_tm');
					        $imie_i_nazwisko_tm = get_sub_field('imie_i_nazwisko_tm');
					        $funkcja_tm = get_sub_field('funkcja_tm');
					        $opis_tm = get_sub_field('opis_tm');
					        ?>

					        <!-- Member item -->
							<div class="col-md-4 col-sm-6 col-12">
								
								<div class="team-member-item">
									<div class="tm-image text-center">
										<img src="<?php echo esc_url($zdjecie_tm['url']); ?>" alt="<?php echo esc_attr($zdjecie_tm['alt']); ?>" class="img-fluid">
									</div>
									<div class="tm-person-name text-center">
										<h4><?php echo $imie_i_nazwisko_tm; ?></h4>
										<h5><?php echo $funkcja_tm; ?></h5>
									</div>
									
									<!-- Person short desc -->
									<div class="member-desc-sn pt-4">
										<p class="page-text text-justify">
											<?php echo $opis_tm; ?>
										</p>
									</div>
									
								</div>

							</div>

							<!-- Member item -->

					    <?php endwhile;
					else :
					endif; ?>
					
					<!-- <div class="col-md-4 col-sm-6 col-12">
						
						<div class="team-member-item">
							<div class="tm-image text-center">
								<img src="<?php echo PATH_SN ?>/uploads/team_img.png" class="img-fluid">
							</div>
							<div class="tm-person-name text-center">
								<h4>Aneta Kowalska</h4>
								<h5>Redaktor naczelna</h5>
							</div>
							
							<div class="bio-btn-show">
								<div class="bio-btn-inner d-flex">
									<div class="bio-label pr-1"><span>BIO</span></div>
									<div class="bio-icon">
										<img src="<?php echo PATH_SN ?>/uploads/angle.png" class="img-fluid" alt="Angle">
									</div>
								</div>
							</div>
						
							<div class="tm-short-desc">
								<h4>
									Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
								</h4>
							</div>
							
							<div class="tm-read-prediction pt-3">
								<div class="d-flex justify-content-center">
									<div class="pr-2">
										<img src="<?php echo PATH_SN ?>/uploads/clock_dark.svg" alt="Clock">
									</div>
									<div class="read-time">< 1 minuta</div>
								</div>
							</div>

						
							<div class="tm-bio-collapse">
								<p class="page-text">
									Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undo
								</p>

								<div class="bio-btn-hide">
									<div class="bio-btn-inner d-flex">
										<div class="bio-label pr-1"><span>ZWIŃ</span></div>
										<div class="bio-icon">
											<img src="<?php echo PATH_SN ?>/uploads/angle.png" class="img-fluid" alt="Angle">
										</div>
									</div>
								</div>
							</div>
						</div>

					</div> -->

					<!-- End member item -->

				</div>
				<!-- team end -->
			</section>

			<!-- Products -->
			<?php get_template_part('template-parts/product-grid'); ?>

			<!-- Testimonials slider -->
			
			<?php get_template_part('template-parts/testimonials-slider'); ?>
			
			<!-- Testimonial slider end -->
		</div>
	</main><!-- #main -->


	<script type="text/javascript">
		jQuery(document).ready(function($) {
		   $('.bio-btn-show').on('click', function(event){
		     
				if($(this).hasClass('open')){
					$(this).removeClass('open');
				}else{
					$(this).addClass('open');
				}

		        if($(this).closest('.team-member-item').find('.tm-bio-collapse').hasClass('active')){
		        	$(this).closest('.team-member-item').find('.tm-bio-collapse').slideUp().removeClass('active');
		        }else{
		        	 $(this).closest('.team-member-item').find('.tm-bio-collapse').slideDown().addClass('active');
		        }

		    });

		   // BIO hide
		    $('.bio-btn-hide').on('click', function(event){
		     
		        var accordion = $(this);
		        // var accordionContent = accordion.closest('.tm-bio-collapse');
		        $(this).closest('.team-member-item').find('.tm-bio-collapse').slideUp().removeClass('active');

		        // Remove class open
		         $(this).closest('.team-member-item').find('.bio-btn-show').removeClass('open');
		        
		        
		    });
		})
	</script>

	
<?php
get_footer();
