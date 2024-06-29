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
			<div class="section-wrapper-sn pt-100">
				<div class="container-lg">
					<div class="row g-5">
						<div class="col-md-6">
							<h2 class="section-title-sn pb-4">
								O nas
							</h2>
							<div class="about-desc-area">
								<p>
									ABECEDA jest centrum językowym świadczącym usługi związane z językiem czeskim (tłumaczenia, kursy językowe, obsługa polskich firm na czeskim rynku), a także sprzedażą książek do nauki rzadkich języków. Nasz zespół tworzą tłumacze, nauczyciele oraz korektorzy – również czescy native speakerzy. Tłumaczymy, uczymy i pomagamy firmom.
								</p>
								<p>
								Nie sprzedajemy wszystkich pozycji dostępnych na rynku. Jeżeli prowadzimy sprzedaż danej książki, masz 100% pewności, że jest to pozycja wartościowa, do której warto sięgnąć. Gwarantujemy to jako lektorzy i tłumacze z wieloletnim doświadczeniem. Jeżeli nie wiesz, jakiej książki potrzebujesz, od czego zacząć – skontaktuj się z nami. Polecimy odpowiedni podręcznik, dostosowany do preferencji ucznia oraz jego potrzeb.
								</p>

								<div class="pt-3">
									<a href="#" class="btn btn-bordered">
										Dowiedz się więcej
									</a>
								</div>
							</div>		
						</div>

						<div class="col-md-6">
							<div class="about-img-home pos-relative">
								<img class="img-fluid pos-relative z-2 about-img" src="<?php echo PATH_SN ?>/uploads/about-ftr.jpg" alt="O nas">
								<div class="about-img-shadow"></div>
							</div>
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
										<img class="img-fluid" src="<?php echo PATH_SN ?>/uploads/mam-napad.jpg" alt="Książka">
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
									Mam napad!
								</h2>
								<div class="about-desc-area">
									<p class="pb-2">
										Mám nápad! to seria podręczników do nauki języka czeskiego dedykowana dla użytkowników języka polskiego. Jedyna tego typu seria na tak wysokim poziomie. Autorką tej serii jest Jana Kępska – Czeszka, która ponad 15 lat pracuje jako lektor i tłumacz i od kilkunastu lat mieszka w Polsce. Księgarnia ABECEDA jest jednym z patronów medialnych!
									</p>
									
									<div class="pt-4">
										<a href="#" class="btn">
											Dowiedz się więcej
										</a>
									</div>
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
