<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */

?>

<div class="account-area-sn ptb-60">
    <div class="row">
        <div class="col-12">
            <h1><?php single_post_title(); ?></h1>
        </div>      

    </div>
    <div class="row">
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="account-nav-sn">
                <?php do_action( 'woocommerce_account_navigation' ); ?>
                <?php $redirect_url = get_permalink( get_option('woocommerce_myaccount_page_id') ) ?>
                <a href="<?php echo wp_logout_url( $redirect_url ); ?>" class="btn-main-sn">
                    Wyloguj się
                </a>
            </div>        
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="account-content-sn pl-lg-5">
                <div class="woocommerce-MyAccount-content">
                    <?php
                        /**
                         * My Account content.
                         *
                         * @since 2.6.0
                         */
                        do_action( 'woocommerce_account_content' );
                    ?>
                </div>            
            </div>
        </div>
    </div>
</div>

