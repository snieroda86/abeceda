<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package web14devsn
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<div class="container-lg">
				<div class="row">
					<div class="col-12 ptb-60">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! Taka strona nie istnieje.', 'web14devsn' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content text-center">
							<img class="img-fluid"  style="max-width: 700px;" src="<?php echo PATH_SN ?>/uploads/not-found.jpg"  alt="Not found">	
						</div>
					</div>
				</div>
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
