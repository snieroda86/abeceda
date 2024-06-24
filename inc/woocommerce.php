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

/*
** Single product - display categories
*/
function single_product_display_category(){
    global $product;
    echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' );
}
add_action('woocommerce_single_product_summary' , 'single_product_display_category' , 7);

/*
** Remove price from single product
*/
function remove_price_from_single_product(){
    global $product;
    if( $product && $product->is_type('simple')){
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
    }
}
add_action('woocommerce_before_single_product_summary', 'remove_price_from_single_product', 9);
/*
** Additional information - product page
*/
function get_cheapest_shipping_cost() {
    WC()->shipping->calculate_shipping(WC()->cart->get_shipping_packages());
    $packages = WC()->shipping()->get_packages();
    $cheapest_cost = null;

    foreach ($packages as $package) {
        $available_methods = $package['rates'];

        foreach ($available_methods as $method) {
            if ($method->method_id !== 'free_shipping' && ($cheapest_cost === null || $method->cost < $cheapest_cost)) {
                $cheapest_cost = $method->cost;
            }
        }
    }

    return $cheapest_cost;
}


function product_additional_info_table(){
    if (!is_product()) {
        return;
    }

    global $product;
    $availability = $product->is_in_stock() ? 'Dostępny' : 'Niedostępny';
    $cheapest_cost = get_cheapest_shipping_cost();
    ?>
    <table class="product-additional-info-table">
        <tr>
            <th>
                <span class="pe-1"><img src="<?php echo PATH_SN ?>/uploads/dostepnosc.png" alt="Dostępność"></span>
                <span>
                    <?php _e('Dostępność:', 'web14devsn'); ?>
                </span>
            </th>
            <td>
                <p class="product-status <?php if (strtolower($availability) == 'niedostępny') { echo ' product-out-of-stock'; } ?>"><?php echo $availability; ?></p>          
            </td>
        </tr>
        <tr>
            <th>
                <span class="pe-1"><img src="<?php echo PATH_SN ?>/uploads/czas-wysylki.png" alt="Czas wysyłki"></span>
                <span>
                    <?php _e('Czas wysyłki:', 'web14devsn'); ?>
                </span>
            </th>
            <td>
                <p><?php _e('24 godziny', 'web14devsn'); ?></p>          
            </td>
        </tr>
        <tr>
            <th>
                <span class="pe-1"><img src="<?php echo PATH_SN ?>/uploads/koszt-wysylki.png" alt="Koszt wysyłki"></span>
                <span>
                    <?php _e('Koszt wysyłki:', 'web14devsn'); ?>
                </span>
            </th>
            <td>
                <p><?php if (!is_null($cheapest_cost)) {
                    echo wc_price($cheapest_cost);
                } ?>
                    <span class="shipping-info-i" 
                    data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-custom-class="custom-tooltip"
                    data-bs-title="Darmowa wysyłka od zamówienia powyżej 100zł"
                    >
                        <img src="<?php  echo PATH_SN ?>/uploads/info-empty.png" alt="Info">
                    </span>
                </p>          
            </td>
        </tr>

        <!-- EAN -->
        <?php if( $ean = get_field('kod_ean' , $product->get_id() )): ?>
        <tr>
            <th>
                <span class="pe-1"><img src="<?php echo PATH_SN ?>/uploads/kod-ean.png" alt="Kod ean"></span>
                <span>
                    <?php _e('Kod EAN:', 'web14devsn'); ?>
                </span>
            </th>
            <td>
                <p><?php echo $ean; ?></p>          
            </td>
        </tr>
        <?php endif; ?>
        <!-- Stan produktu -->
        <?php if( $stan_produktu = get_field('stan_produktu' , $product->get_id() )): ?>
        <tr>
            <th>
                <span class="pe-1"><img src="<?php echo PATH_SN ?>/uploads/stan-produktu.png" alt="Stan produktu"></span>
                <span>
                    <?php _e('Stan produktu:', 'web14devsn'); ?>
                </span>
            </th>
            <td>
                <p><?php echo $stan_produktu; ?></p>          
            </td>
        </tr>
        <?php endif; ?>
    </table>
    <?php
}
add_action('woocommerce_single_product_summary', 'product_additional_info_table', 23);
/*
** Display product price
*/

function display_single_product_price(){
    global $product;
    if ( ! empty( $product ) ) {
        echo '<p class="product-price">' . $product->get_price_html() . '</p>';
    }
}
add_action('woocommerce_single_product_summary' , 'display_single_product_price', 29);

/*
** Remove "Additional information"  tab
*/
add_filter( 'woocommerce_product_tabs', 'sn_remove_additional_info_product_tabs', 9999 );
  
function sn_remove_additional_info_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); 
    return $tabs;
}

/*
** Custom tabs - product page
*/
add_filter( 'woocommerce_product_tabs', 'sn_add_custom_product_tabs', 9999 );

function sn_add_custom_product_tabs( $tabs ) {
    global $product;

    // Check if the product object is available
    if ( ! is_a( $product, 'WC_Product' ) ) {
        return $tabs;
    }

    $product_id = $product->get_id();
    $dodatkowe_zakladki_produktu = get_field( 'dodatkowe_zakladki_produktu', $product_id );

    // Linki
    if ( ! empty( $dodatkowe_zakladki_produktu['linki_add_tab'] ) ) {
        // Linki
        $tabs['linki'] = array(
            'title'    => __( 'Linki', 'web14devsn' ),
            'priority' => 65, // TAB SORTING (DESC 10, ADD INFO 20, REVIEWS 30)
            'callback' => 'sn_product_tab_linki',
        );
    }

    // Pliki do pobrania
     if ( ! empty( $dodatkowe_zakladki_produktu['pliki_do_pobrania_add_tab'] ) ) {
        $tabs['pliki_do_pobrania'] = array(
            'title'    => __( 'Do pobrania', 'web14devsn' ),
            'priority' => 20, // TAB SORTING (DESC 10, ADD INFO 20, REVIEWS 30)
            'callback' => 'sn_product_tab_pliki_do_pobrania',
        );
    }

    return $tabs;
}

// Linki callback
function sn_product_tab_linki() {
    global $product;
    $product_id = $product->get_id();
    $dodatkowe_zakladki_produktu = get_field( 'dodatkowe_zakladki_produktu', $product_id );
    $linki = $dodatkowe_zakladki_produktu['linki_add_tab'];
    if($linki){
         echo wp_kses_post( $linki );
    }
    
}

// Pliki do pobrania callback
function sn_product_tab_pliki_do_pobrania() {
     global $product;
    $product_id = $product->get_id();
    $dodatkowe_zakladki_produktu = get_field( 'dodatkowe_zakladki_produktu', $product_id );
    $do_pobrania = $dodatkowe_zakladki_produktu['pliki_do_pobrania_add_tab'];
    if($do_pobrania){
        echo wp_kses_post( $do_pobrania );
    }
}

/*
** Checkout form labels as placeholder
*/
add_filter( 'woocommerce_checkout_fields', 'sn_labels_inside_checkout_fields', 9999 );
   
function sn_labels_inside_checkout_fields( $fields ) {
   foreach ( $fields as $section => $section_fields ) {
      foreach ( $section_fields as $section_field => $section_field_settings ) {
         $fields[$section][$section_field]['placeholder'] = $fields[$section][$section_field]['label'];
         $fields[$section][$section_field]['label'] = '';
      }
   }
   return $fields;
}