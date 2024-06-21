<?php
/*
** Woocommerce customization 
*/

// Update cart count
add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

function iconic_cart_count_fragments( $fragments ) {
    
    $fragments['div.header-cart-count'] = '<div class="header-cart-count">' . WC()->cart->get_cart_contents_count() . '</div>';
    
    return $fragments;
    
}

// remove "SALE" badge
add_filter('woocommerce_sale_flash', 'custom_remove_sale_badge');
function custom_remove_sale_badge() {
    return '';
}

// Display category on shop loop product
add_action('woocommerce_shop_loop_item_title' , 'shop_loop_display_product_cat' , 10);

function shop_loop_display_product_cat(){
   global $product;  
   echo wc_get_product_category_list( $product->get_id(), ', ', '<p class="shop-loop-categories">', '</p>' );
}
/*
// Display "NOWOŚĆ" badge
*/

add_action('woocommerce_after_shop_loop_item_title', 'shop_loop_display_new_badge', 11);

function shop_loop_display_new_badge() {
    global $product;

    // Pobranie wartości pola niestandardowego ACF 'product_nowosc' dla danego produktu
    $is_new = get_field('produkt_nowosc', $product->get_id());

    // Sprawdzenie czy pole 'product_nowosc' ma wartość prawdziwą (true)
    if ($is_new) {
        echo '<div class="new-product-badge">' . __('Nowość', 'web14devsn') . '</div>';
    }
}

/*Remove product ratind - loop */
remove_action('woocommerce_after_shop_loop_item_title' , 'woocommerce_template_loop_rating' , 5);
remove_action('woocommerce_before_shop_loop','woocommerce_result_count'  , 20);
remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering'  , 30);
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );

/*
** Woocommerce pagination - custom arrows
*/
add_filter( 'woocommerce_pagination_args',  'web14dev_woo_pagination' );
function web14dev_woo_pagination( $args ) {

    $args['prev_text'] = '<svg xmlns="http://www.w3.org/2000/svg" height="16" width="8" viewBox="0 0 320 512"><path  fill="#222222" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>';
    $args['next_text'] = '<svg xmlns="http://www.w3.org/2000/svg" height="16" width="8" viewBox="0 0 320 512"><path  fill="#222222" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg>';

    return $args;
}

/* 
** Remove cross-sells on cart page
*/
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

/*
** Contunue shipping button - cart page
*/
function continue_shopping_btn_sn(){
   $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
   
   if($shop_page_url){
        echo '<a href="'.esc_url($shop_page_url).'" class="btn btn-bordered w-100">'.__('Kontynuuj zakupy', 'web14devsn').'</a>';
   } 
}
add_action('woocommerce_proceed_to_checkout' , 'continue_shopping_btn_sn',20);
/*
** Cart nwsletter
*/

function display_newsletter_on_cart_page(){
    get_template_part('template-parts/global/newsletter');
}
add_action('woocommerce_cart_newsletter' , 'display_newsletter_on_cart_page');