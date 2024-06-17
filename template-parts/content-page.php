<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (   is_plugin_active( 'woocommerce/woocommerce.php' )  && is_cart() && WC()->cart->is_empty()) : ?>
		
	<?php else: ?>
		<header class="entry-header pt-5 pb-4">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</header><!-- .entry-head -->
	<?php endif; ?>

	<div class="entry-content pb-3 pb-lg-5">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</div><!-- #post-<?php the_ID(); ?> -->
