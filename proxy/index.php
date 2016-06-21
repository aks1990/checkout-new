<?php

session_start();
$shop = "asters-2.myshopify.com";
include_once '../includes/utils/Shopify.php';
include_once '../includes/db/Stores.php';
header("Content-Type: application/liquid");

if (isset($_POST['shop']) && !empty($_POST['shop'])) {
    require_once 'process-payment.php';
} elseif (isset($_REQUEST['page']) && $_REQUEST['page'] == 'thankyou') {
    $shopify = new Shopify();
    $store = new Stores();
    $store_info = $store->validateStoreByStoreURL($shop);
    $order = $shopify->getOrderInfo($shop, $store_info['access_token'], $_REQUEST['order_id']);
    echo "<pre>";
    print_r($order);
    echo "</pre>";
    require_once 'thankyou.php';
} elseif (isset($_REQUEST['page']) && $_REQUEST['page'] == 'error') {
    require_once 'error.php';
} else {
    require_once 'checkout.php';
}
