<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package web14devsn
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container-lg">
		
		<!-- Post content -->
		<div class="row g-lg-5 gy-5 gx-4 pt-5">
			<div class="col-lg-8">
				<?php
				while ( have_posts() ) : the_post(); ?>

					<div class="sp-content-wrapper-sn ptb-80">
						<?php if(has_post_thumbnail()):
							$thumb_url = get_the_post_thumbnail_url();
						?>
						<div class="s-post-thumbnail pb-5">
							<div class="shadow-img-box pos-relative">
								<img class="img-fluid pos-relative z-2 shadow-img-right" src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title(); ?>">
								<div class="shadow-img-shadow-right"></div>
								
							</div>
						</div>
						<?php endif; ?>
						<div class="s-post-title">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="s-post-meta">
							<span><?php _e('Kategoria: ','web14devsn'); ?></span>
							<span><?php  the_category(' , ') ?></span>
						</div>
						<div class="sp-content-sn pt-3">
							<?php the_content(); ?>
						</div>
						<div class="blog-backward pt-5">
							<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn btn-main-sn">
								<?php _e('Powrót na bloga' , 'web14devsn'); ?>
							</a>
						</div>
					</div>

				<?php endwhile; ?>

			</div>
			<!-- Sidebar -->
			<div class="col-lg-4">
				<?php get_sidebar(); ?>
			</div>

		</div>
	</div>

</main><!-- #main -->

<?php
get_footer();
