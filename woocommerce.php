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
            <?php if(is_shop()): ?>
            <div class="shop-cat-banner-wrapper pos-relative">
                <div class="shop-cat-banner" style="background-image: url(<?php echo PATH_SN ?>/uploads/banner-kategoria.jpg);background-size:cover;background-position: right top;">
                    <div class="shop-cat-banner-inner">
                        <h1>
                            <?php 
                                $shop_page_id = woocommerce_get_page_id('shop');
                                $shop_page_title = get_the_title($shop_page_id);
                                echo $shop_page_title;
                             ?>

                        </h1>
                        <div class="shop-cat-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. </p>
                        </div>    
                    </div> 
                    
                </div>
                <div class="shop-cat-banner-shadow"></div>
            </div>
            <?php endif; ?>
            <!-- Category banner -->
            <?php if(is_product_category()): ?>
            <?php 
            $term = get_queried_object();
            $category_description = term_description($term->term_id, 'product_cat');
            $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
            if ($thumbnail_id) {
                $cat_bg_image = wp_get_attachment_url($thumbnail_id);
            }else{
                $cat_bg_image = PATH_SN.'/uploads/banner-kategoria.jpg';
            }
            ?>
            <div class="shop-cat-banner-wrapper pos-relative">
                <div class="shop-cat-banner" style="background-image: url( <?php echo esc_url($cat_bg_image) ?>);background-size:cover;background-position: right top;">
                    <div class="shop-cat-banner-inner">
                        <h1>
                           <?php echo single_term_title(); ?>
                        </h1>

                        <?php if($category_description): ?>
                        <div class="shop-cat-description">
                            <p><?php echo $category_description; ?></p>
                        </div>    
                        <?php endif; ?>
                    </div> 
                    
                </div>
                <div class="shop-cat-banner-shadow"></div>
            </div>
            <?php endif; ?>

            <!-- Category banner end -->

            <!-- main categories -->
            <?php if (is_product_category()) : ?>
                <?php get_template_part('template-parts/woocommerce/main-categories'); ?>
            <?php endif; ?>

            <?php

            if (is_shop() || is_product_category()) : ?>
                <div class="shop-sidebar-sn">

                    <!-- Categories -->
                    <?php if(is_shop() ): ?>
                        <h2>Kategorie</h2>
                        <?php get_template_part('template-parts/woocommerce/categories'); ?>
                    <?php elseif(is_product_category()): ?>
                        <h2>Kategorie</h2>
                        <?php get_template_part('template-parts/woocommerce/subcategories'); ?>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'sidebar-shop' ) ) { ?>
                        <?php dynamic_sidebar('sidebar-shop'); ?>
                    <?php } ?>
                </div>
            <?php endif; ?>

            <div class="<?php echo is_shop() || is_product_category() ? 'loop-products-col' : 'col-12'; ?>">
                <?php woocommerce_content(); ?>
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php get_footer();
