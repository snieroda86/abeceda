<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<div class="row g-lg-5">
		<div class="col-lg-7">
			<div class="cart-table-wrapper">
				<?php if ( $checkout->get_checkout_fields() ) : ?>

					<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

					<div class="col2-set" id="customer_details">
						<div class="col-1">
							<?php do_action( 'woocommerce_checkout_billing' ); ?>
						</div>

						<div class="col-2">
							<?php do_action( 'woocommerce_checkout_shipping' ); ?>
						</div>
					</div>

					<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

				<?php endif; ?>
				
				<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
			</div>

			<!-- Shipping method -->
			<div class="cart-table-wrapper shipping-method-wrapper-sn">
				<div class="accordion" id="shipping-method-accordion">
				 
				  <div class="accordion-item">
				    <h2 class="accordion-header">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseShippingMethod" aria-expanded="false" aria-controls="collapseShippingMethod">
				        Metoda dostawy
				      </button>
				    </h2>
				    <div id="collapseShippingMethod" class="accordion-collapse collapse" data-bs-parent="#shipping-method-accordion">
				      <div class="accordion-body"> 
				        <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

							<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
							<div id="shipping-methods-sn">
								<?php wc_cart_totals_shipping_html(); ?>	
							</div>
							
							<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

						<?php endif; ?>
				        
				      </div>
				    </div>
				  </div>
				  
				</div>
			</div>

			<!-- Payment methods -->
			<div class="cart-table-wrapper payment-method-wrapper-sn">
				<div class="accordion" id="payment-method-accordion">
				 
				  <div class="accordion-item">
				    <h2 class="accordion-header">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePaymentMethod" aria-expanded="false" aria-controls="collapsePaymentMethod">
				        Metoda płatności
				      </button>
				    </h2>
				    <div id="collapsePaymentMethod" class="accordion-collapse collapse" data-bs-parent="#payment-method-accordion">
				      <div class="accordion-body"> 
				        <?php do_action('sn_payment_methods_dropdown'); ?>
				      </div>
				    </div>
				  </div>
				  
				</div>
			</div>

		</div>
		<div class="col-lg-5">
			<div class="cart-table-wrapper">
				<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
		
				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>

				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
			</div>
		</div>
	</div>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
