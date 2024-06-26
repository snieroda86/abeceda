<?php 
/*
WooCommerce - Show shipping method IDs
*/

class TS_ShowShippingMethodIDs {
// Returns an instance of this class.
public static function get_instance() {
if (null == self::$instance) {
self::$instance = new self;
}
return self::$instance;
}

// Initialize the plugin variables.
public function __construct() {
$this->init();
}

// Set up WordPress specific actions.
public function init() {
// Print the table with Shipping zones, methods and their IDs.
add_action('woocommerce_settings_shipping', array($this, 'ts_add_to_shipping_settings'), 20);
// Add CSS to style the table.
add_action('admin_head', array($this, 'ts_add_shipping_method_ids_css'));
}

// Return whether on the Shipping zones main page.
private function ts_is_shipping_zones_page() {
global $current_section;

if (empty($current_section) && !isset($_GET['zone_id'])) {
return true;
}

return false;
}

public function ts_add_shipping_method_ids_css() {
if ($this->ts_is_shipping_zones_page()) {
?>
<style>
.shipping_method_ids { border: 1px solid #c3c4c7; }
.shipping_method_ids td, .shipping_method_ids th { padding: 5px 10px; background-color: #fff; }
.shipping_method_ids td { border-bottom: 2px solid #f9f9f9; }
.shipping_method_ids ul { margin: 0; }
</style>
<?php
}
}

// Print the table with Shipping zones, methods and their IDs.
public function ts_add_to_shipping_settings() {
if ($this->ts_is_shipping_zones_page()) {
$data_store = WC_Data_Store::load('shipping-zone');
$raw_zones = $data_store->get_zones();
foreach ($raw_zones as $raw_zone) {
$zones[] = new WC_Shipping_Zone($raw_zone);
}
?>
<h4>Shipping Method IDs</h4>
<table class="shipping_method_ids">
<tr>
<th>Zone name</th>
<th>Method name (Type): ID</th>
</tr>
<?php
foreach ($zones as $zone) {
$zone_shipping_methods = $zone->get_shipping_methods();

if (count($zone_shipping_methods)) {
?>
<tr>
<th valign="top"><?php echo $zone->get_zone_name() ?></th>
<td>
<ul>
<?php
foreach ($zone_shipping_methods as $index => $method) {
$method_title = $method->get_method_title();
$method_user_title = $method->get_title();
$method_rate_id = $method->get_rate_id();

printf(
'<li>%s (%s): <strong>%s</strong></li>%s',
$method_user_title,
$method_title,
$method_rate_id,
"\n"
);
}
?>
</ul>
</td>
</tr>
<?php
}
}
?>
</table>
<?php
}
}
}

$TS_ShowShippingMethodIDs = new TS_ShowShippingMethodIDs();

/*
** Show payment gateways IDS
*/
add_filter( 'woocommerce_gateway_title', 'ts_display_payment_method_id_for_admins_on_checkout', 10, 2 );
function ts_display_payment_method_id_for_admins_on_checkout( $title, $payment_id ){
if( is_checkout() && ( current_user_can( 'administrator') || current_user_can( 'shop_manager') ) ) {
$title .= ' <code style="border:solid 1px #ccc;padding:2px 5px;color:red;">' . $payment_id . '</code>';
}
return $title;
}