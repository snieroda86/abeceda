<?php
/**
 * The template for displaying all WooCommerce pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="<?php  echo( is_product() ) ? 'full-container-sn' : ' container-lg '; ?> page-container-sn woocommerce-sn">
        <div class="row">
            <?php

            if (is_shop() || is_product_category()) :
                
                ?>
                <div class="shop-sidebar-sn">
                    <?php // echo do_shortcode('[categories_sidebar_sn]'); ?>
                </div>
            <?php endif; ?>

            <div class="<?php echo is_shop() || is_product_category() ? 'slider-home-col' : 'col-12'; ?>">
                <?php woocommerce_content(); ?>
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php get_footer();
