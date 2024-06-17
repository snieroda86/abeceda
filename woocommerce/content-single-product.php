<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

?>

<div class="container-lg">
	<?php 

	/**
	 * Hook: woocommerce_before_single_product.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 */
	do_action( 'woocommerce_before_single_product' );

	if ( post_password_required() ) {
		echo get_the_password_form(); // WPCS: XSS ok.
		return;
	}
	?>	
</div>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<div class="container-lg">
		<div>
			<?php woocommerce_breadcrumb(); ?>
		</div>
		<div>
			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>


			<div class="summary entry-summary">
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
				?>

				<div class="product-specification-box-sn">
					
					<div class="ps-box-item-sn">
						<?php
						$specyfikacja_pdf = get_field('specyfikacja_pdf');
						if( $specyfikacja_pdf ): ?>
						    <a target="_blank" class="sp-box-button btn-main-sn btn-transparent-sn" href="<?php echo $specyfikacja_pdf['url']; ?>">
						    	<?php _e('Specyfikacja pdf' , 'web14devsn'); ?>
						    </a>
						<?php endif; ?>
					</div>

					<!-- Ask for product form -->
					<div class="ps-box-item-sn">
						

						<!-- Button trigger modal -->
						<a type="button" class="sp-box-button btn-main-sn btn-transparent-sn" data-toggle="modal" data-target="#askForProduct">
						  <?php _e('Zapytaj o produkt' , 'web14devsn'); ?>
						</a>

						<!-- Modal -->
						<div class="modal fade" id="askForProduct" tabindex="-1" aria-labelledby="askForProductLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title-sn" id="askForProductLabel">
						        	<?php _e('Zapytaj o produkt' , 'web14devsn'); ?>
						        </h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <div>
						        	<?php echo do_shortcode('[wpforms id="169"]'); ?>
						        </div>
						      </div>
						     
						    </div>
						  </div>
						</div>




					</div>
				</div>
			</div>


		</div>
	</div>


	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
