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

			<!-- Desktop -->
            <div class="shop-cat-banner-wrapper blog-banner-wrapper pos-relative d-sm-block d-none">
                <div class="shop-cat-banner" style="background-image: url(<?php echo PATH_SN ?>/uploads/banner-kategoria.jpg);background-size:cover;background-position: right top;">
                    <div class="shop-cat-banner-inner">
                        <h1>
                           Blog
                        </h1>

                        
                        <div class="shop-cat-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                        </div>    
                        
                    </div> 
                    
                </div>
                <div class="shop-cat-banner-shadow"></div>
            </div>

            <!-- Mobile -->
            <div class="shop-cat-banner-mobile blog-mobile-banner-wrapper pos-relative d-sm-none d-block">
                <div class="shop-cat-banner-inner">
                    <h1>
                        Blog
                    </h1>
                    
                        <div class="shop-cat-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</p>
                        </div>    
                   
                </div> 
                <div class="shop-cat-mobile-img-wrap pos-relative">
                    <div class="shop-cat-banner" style="background-image: url( <?php echo PATH_SN ?>/uploads/banner-kategoria.jpg);background-size:cover;background-position: right top;">
                    
                    </div>
                    <div class="shop-cat-banner-shadow"></div>    
                </div>
                
            </div>
			
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
