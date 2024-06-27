<?php
/*
** Woocommerce customization 
*/

/*
** SHow shipping methods IDS
*/
require get_template_directory().'/inc/TS_ShowShippingMethodIDs.php';

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
// add_filter( 'woocommerce_checkout_fields', 'sn_labels_inside_checkout_fields', 9999 );
   
// function sn_labels_inside_checkout_fields( $fields ) {
//    foreach ( $fields as $section => $section_fields ) {
//       foreach ( $section_fields as $section_field => $section_field_settings ) {
//          $fields[$section][$section_field]['placeholder'] = $fields[$section][$section_field]['label'];
//          $fields[$section][$section_field]['label'] = '';
//       }
//    }
//    return $fields;
// }

/*
** Add NIP filed to checokut form 
*/

add_filter('woocommerce_checkout_fields', 'display_nip_field_in_checkout_form');

function display_nip_field_in_checkout_form($fields) {
    $fields['billing']['billing_nip'] = array(
        'type'        => 'text',
        'label'       => __('NIP', 'woocommerce'),
        'placeholder' => _x('Podaj NIP', 'placeholder', 'woocommerce'),
        'required'    => false,
        'class'       => array('form-row-wide'),
        'clear'       => true,
        'priority'    => 999,  // Wysoki priorytet, aby pole było na końcu
    );

    return $fields;
}

// add_action('woocommerce_checkout_order_review', 'display_nip_field_in_order_review', 20);

function display_nip_field_in_order_review() {
    $checkout = WC()->checkout();
    woocommerce_form_field('billing_nip', array(
        'type'        => 'text',
        'class'       => array('form-row-wide'),
        'label'       => __('NIP', 'woocommerce'),
        'placeholder' => __('Podaj NIP', 'woocommerce'),
    ), $checkout->get_value('billing_nip'));
}

add_action('woocommerce_checkout_update_order_meta', 'save_nip_checkout_field');

function save_nip_checkout_field($order_id) {
    if (!empty($_POST['billing_nip'])) {
        update_post_meta($order_id, 'billing_nip', sanitize_text_field($_POST['billing_nip']));
    }
}

add_action('woocommerce_admin_order_data_after_billing_address', 'display_nip_in_admin_order_meta', 10, 1);

function display_nip_in_admin_order_meta($order) {
    echo '<p><strong>' . __('NIP') . ':</strong> ' . get_post_meta($order->get_id(), 'billing_nip', true) . '</p>';
}

add_filter('woocommerce_email_order_meta_fields', 'add_nip_to_order_emails', 10, 3);

function add_nip_to_order_emails($fields, $sent_to_admin, $order) {
    $fields['billing_nip'] = array(
        'label' => __('NIP'),
        'value' => get_post_meta($order->get_id(), 'billing_nip', true),
    );
    return $fields;
}

/*
** Add stars to required fields - chcekout form
*/

add_filter('woocommerce_checkout_fields', 'customize_checkout_fields', 9999);

function customize_checkout_fields($fields) {
    foreach ($fields as $section => $section_fields) {
        foreach ($section_fields as $field => $settings) {
            // Dodanie gwiazdki do placeholderów pól obowiązkowych
            if (isset($settings['label']) && isset($settings['required']) && $settings['required']) {
                $fields[$section][$field]['placeholder'] = $settings['label'] . ' *';
            } elseif (isset($settings['label'])) {
                $fields[$section][$field]['placeholder'] = $settings['label'];
            }

            // Usunięcie tekstu z etykiet, jeśli nie są potrzebne
            $fields[$section][$field]['label'] = '';
        }
    }

    return $fields;
}


/*
** Placeholder for billing address field
*/

function sn_new_address_one_placeholder( $fields ) {
    $fields['address_1']['placeholder'] = 'Nazwa ulicy,numer budynku / numer lokalu *';
    // $fields['address_2']['placeholder'] = 'Ciąg dalszy adresu';

    return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'sn_new_address_one_placeholder' );

/*
** Change fields order - checkout form
*/
add_filter('woocommerce_checkout_fields', 'customize_checkout_field_order');

function customize_checkout_field_order($fields) {
    // Przykładowe ustawienia priorytetów dla pól
    $fields['billing']['billing_first_name']['priority'] = 10;
    $fields['billing']['billing_last_name']['priority'] = 20;
    $fields['billing']['billing_email']['priority'] = 30;
    $fields['billing']['billing_phone']['priority'] = 40;
    $fields['billing']['billing_city']['priority'] = 50;
    $fields['billing']['billing_postcode']['priority'] = 60;
    $fields['billing']['billing_address_1']['priority'] = 70;
    // $fields['billing']['billing_address_2']['priority'] = 50;
    $fields['billing']['billing_country']['priority'] = 80;
    $fields['billing']['billing_state']['priority'] = 90;
    $fields['billing']['billing_company']['priority'] = 100;
    $fields['billing']['billing_nip']['priority'] = 110; 

    return $fields;
}


/*
** Required fields info - checkout form 
*/
function sn_required_fields_info_checkout(){ ?>
    <p class="required-fields-info-checkout">
        <span class="pe-1"><img src="<?php echo PATH_SN ?>/uploads/info-empty.png" alt="Informacje"></span>
        <span>Pola onaczone * są obowiązkowe</span>
    </p>
<?php }
add_action('woocommerce_checkout_billing' , 'sn_required_fields_info_checkout' , 9999);

/*
** Move shipping methods
*/
function my_custom_shipping_table_update( $fragments ) {
    ob_start();
    ?>
    <div id="shipping-methods-sn">
        <?php wc_cart_totals_shipping_html(); ?>
    </div>
    <?php
    $woocommerce_shipping_methods = ob_get_clean();
    $fragments['#shipping-methods-sn'] = $woocommerce_shipping_methods;
    return $fragments;
}
add_filter( 'woocommerce_update_order_review_fragments', 'my_custom_shipping_table_update');


/* Chcekout payment move to another location*/

/**
 * Moving the payments
 */
add_action( 'sn_payment_methods_dropdown', 'my_custom_display_payments', 20 );

/**
 * Displaying the Payment Gateways 
 */
function my_custom_display_payments() {
  if ( WC()->cart->needs_payment() ) {
    $available_gateways = WC()->payment_gateways()->get_available_payment_gateways();
    WC()->payment_gateways()->set_current_gateway( $available_gateways );
  } else {
    $available_gateways = array();
  }
  ?>
  <div id="checkout_payments">
    
    <?php if ( WC()->cart->needs_payment() ) : ?>
    <ul class="wc_payment_methods payment_methods methods">
    <?php
    if ( ! empty( $available_gateways ) ) {
      foreach ( $available_gateways as $gateway ) {
        wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
      }
    } else {
      echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
    }
    ?>
    </ul>
  <?php endif; ?>
  </div>
<?php
}


/**
 * Adding the payment fragment to the WC order review AJAX response
 */
add_filter( 'woocommerce_update_order_review_fragments', 'my_custom_payment_fragment' );

/**
 * Adding our payment gateways to the fragment #checkout_payments so that this HTML is replaced with the updated one.
 */
function my_custom_payment_fragment( $fragments ) {
    ob_start();

    my_custom_display_payments();

    $html = ob_get_clean();

    $fragments['#checkout_payments'] = $html;

    return $fragments;
}

/*
** Add custom icons to shipping methods
*/
add_filter( 'woocommerce_cart_shipping_method_full_label', 'filter_woocommerce_cart_shipping_method_full_label', 10, 2 );

function filter_woocommerce_cart_shipping_method_full_label( $label, $method ) { 
  $uploads_dir = get_template_directory_uri() . '/uploads/';
    $delivery_truck_img = $uploads_dir . 'delivery-truck.png';
    $inpost_img = $uploads_dir . 'inpost.png';
    $free_img = $uploads_dir . 'free-delivery.svg';

    if ( $method->id == "inpost_paczkomaty:4" ) {
        $label = '<img src="' . esc_url($inpost_img) . '" alt="Paczka" style="width:20px; height:auto;"> ' . $label;
    } else if ( $method->id == "flat_rate:3" ) {
        $label = '<img src="' . esc_url($delivery_truck_img) . '" alt="Kierowca" style="width:20px; height:auto;"> ' . $label;       
    }else if ( $method->id == "free_shipping:1" ) {
        $label = '<img src="' . esc_url($free_img) . '" alt="Kurier" style="width:20px; height:auto;"> ' . $label;       
    }
    return $label; 
}

/*
** Add custom icons to payment gateways
*/
function custom_woocommerce_gateway_icons( $icon, $gateway_id ) {

    $icon_url = get_template_directory_uri() . '/uploads/';

    switch( $gateway_id ) {
        case 'paypal':
            $icon = '<img src="' . $icon_url . 'paypal.png" alt="PayPal" />';
            break;
        case 'stripe':
            $icon = '<img src="' . $icon_url . 'stripe.png" alt="Stripe" />';
            break;
        case 'bacs':
            $icon = '<img src="' . $icon_url . 'przelew.jpg" alt="Bank Transfer" />';
            break;
        case 'cheque':
            $icon = '<img src="' . $icon_url . 'cheque.png" alt="Cheque" />';
            break;
        case 'cod':
            $icon = '<img src="' . $icon_url . 'za-pobraniem.png" alt="Cash on Delivery" />';
            break;
    }

    return $icon;
}
add_filter( 'woocommerce_gateway_icon', 'custom_woocommerce_gateway_icons', 10, 2 );






