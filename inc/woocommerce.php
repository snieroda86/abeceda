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