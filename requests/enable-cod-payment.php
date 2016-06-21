<?php

// include shopify class
require_once "../includes/utils/Shopify.php";

// include table classes
require_once "../includes/db/Stores.php";

$shopify = new Shopify();
$Stores = new Stores();

// extract the data needed
$shop = $_REQUEST['shop'];
$current_page = explode("?", $_REQUEST['current_page']);
$checkout_url = $current_page[0];
$enable_cod = false;

// get the store info
$store_info = $Stores->validateStoreByStoreURL($shop);

// get all the list of checkouts, and check with the current checkout
$checkout_list = $shopify->getCheckouts($shop, $store_info['access_token']);

// the list of cities where COD payment option is allowed
$cod_enabled_cities = array('MALE', 'HULHUMALE', 'VILLINGILI');

foreach($checkout_list->checkouts as $checkout) {
    $is_checkout_match = strpos($checkout->abandoned_checkout_url, $checkout_url);
    $shipping_city = strtoupper($checkout->shipping_address->city);
    if ($is_checkout_match !== false && in_array($shipping_city, $cod_enabled_cities)) {
        $enable_cod = true;
        break;
    }
}

// return a json response
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');
header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");

echo json_encode(array(
    'enable_cod' => $enable_cod,
));