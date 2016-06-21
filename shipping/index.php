<?php

// items to check: destination, quantity

// get the current time
$current_time = date("H");
$today = new DateTime("now");
$tomorrow = new DateTime("tomorrow");

// shipping rate
$shipping_rate = 0;

// get the total purchase amount
$total_purchase = $_REQUEST['total_amount'];

// check the destination and set the shipping rate and delivery date
$shipping_destination = strtoupper(trim($_REQUEST['shipping_destination']));
if ($shipping_destination == "MALE") {
    $shipping_rate = $total_purchase >= 100 ? 0 : 25;
    $delivery_date = $current_time <= 18 ? $today : $tomorrow; 
} else if ($shipping_destination == "HULHUMALE" || $shipping_destination == "VILLINGILI") {
    $shipping_rate = $total_purchase >= 250 ? 0 : 50;
    $delivery_date = $current_time <= 12 ? $today : $tomorrow;
} else {
    $shipping_rate = $total_purchase >= 100 ? 0 : 25;
    $delivery_date = $today;
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');
header("access-control-allow-origin: *");
header('content-type: application/json; charset=utf-8');
echo json_encode(array("rates" => array(
    "service_name" => $shipping_rate > 0 ? "Flat rate shipping" : "Free delivery",
    "service_code" => $shipping_rate > 0 ? "FLATRATE" : "FREE",
    "total_price" => $shipping_rate,
    "min_delivery_date" => $delivery_date,
    "max_delivery_date" => $delivery_date->modify("+1 day")
)));
