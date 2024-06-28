<?php
/**
 * The template for displaying post index pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

get_header();
?>

	<main id="primary" class="site-main section-bg-grey">

		<div class="container-lg">
			
			<section class="featured-articles-blog pb-100 pt-5">
				<div class="row g-lg-5 gy-5">
					<div class="col-md-6">
						<div class="shadow-img-box pos-relative">
							<img class="img-fluid pos-relative z-2 shadow-img-left" src="<?php echo PATH_SN ?>/uploads/shadow-left.jpg" alt="O nas">
							<div class="shadow-img-shadow-left"></div>
							<div class="shadow-box-content">
								<h2>Tytuł artykułu wyróżnionego</h2>
								<a href="#" class="btn">
									<span class="pe-2 text-white">Zobacz</span>
									<span><img src="<?php echo PATH_SN ?>/uploads/arrow-more-link-white.png" alt="Więcej"></span>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="shadow-img-box pos-relative">
							<img class="img-fluid pos-relative z-2 shadow-img-right" src="<?php echo PATH_SN ?>/uploads/img-cropped.jpg" alt="O nas">
							<div class="shadow-img-shadow-right"></div>
							<div class="shadow-box-content">
								<h2>Tytuł artykułu wyróżnionego</h2>
								<a href="#" class="btn">
									<span class="pe-2 text-white">Zobacz</span>
									<span><img src="<?php echo PATH_SN ?>/uploads/arrow-more-link-white.png" alt="Więcej"></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<?php if ( have_posts() ) : ?>
				<div class="row post-grid-row-sn g-lg-5">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post(); ?>
						<div class="article-col-sn col-lg-4 col-md-6 col-sm-6 col-12 mb-4 mb-lg-0">
							<?php get_template_part( 'template-parts/content'); ?>	
						</div>
						
					<?php endwhile; ?>

				</div>
				<?php get_template_part('template-parts/post-pagination'); ?>
			<?php
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
				
		</div>

		
	</main><!-- #main -->

<?php

get_footer();
