<?php
/**
 * The template for displaying arvhive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

get_header();
?>

	<main id="primary" class="site-main section-bg-grey">

		<div class="container-lg">
			<header class="page-header cat-header-sn">
				<?php
				if (is_category()) {
				    echo '<h1 class="page-title">' . single_cat_title('', false) . '</h1>';
				}
				?>
				
			</header><!-- .page-header -->
			
			<?php if ( have_posts() ) : ?>
				<div class="row post-grid-row-sn">
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
