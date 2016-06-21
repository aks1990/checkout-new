<?php

// include db classes
include_once '../includes/db/Stores.php';
$Stores = new Stores();

// include shopify
include_once '../includes/utils/Shopify.php';
$shopify = new Shopify();

if ($_POST && !empty($_POST['shop'])) {
    $shop = $_POST['shop'];
    $checkout = $_POST['checkout'];
    //dump($_POST);
    
    if (empty($checkout['payment_gateway'])) {
        // return an error message
        $error = "Please select a payment method.";
    }
    
    // get the store information basedfrom the shop
    $store_info = $Stores->validateStoreByStoreURL($shop);
    
    $billing_address = array(
        'id',
        'address1',
        'address2',
        'city',
        'company',
        'country',
        'first_name',
        'last_name',
        'phone',
        'province',
        'zip',
        'name',
        'province_code',
        'country_code',
        'default' => true
    );
    
    
    // get the shipping address
    $country_codes = array('Maldives' => 'MV', 'India' => 'IN');
    $shipping_address = array(
        'address1' => $checkout['shipping_address']['address1'],
        'address2' => $checkout['shipping_address']['address2'],
        'city' => $checkout['shipping_address']['city'],
        'company' => $checkout['shipping_address']['company'],
        'country' => $checkout['shipping_address']['country'],
        'first_name' => $checkout['shipping_address']['first_name'],
        'last_name' => $checkout['shipping_address']['last_name'],
        'phone' => $checkout['shipping_address']['phone'],
        'province' => $checkout['shipping_address']['province'],
        'zip' => $checkout['shipping_address']['zip'],
        'name' => $checkout['shipping_address'][''],
        'country_code' => $country_codes[$checkout['shipping_address']['country']],
    );
    
    
    // get the shipping method and rate
    $shipping_rate = $checkout['shipping_method']['price'];
    $shipping_lines = array();
    $shipping_lines[] = array(
        'code' => $checkout['shipping_method']['name'],
        'price' => $shipping_rate,
        'title' => $checkout['shipping_method']['name'],
    );
    
    
    // get the note attributes, the mandatory contact information
    $note_attributes = array();
    foreach($checkout['note_attributes'] as $key => $value) {
        $note_attributes[] = array('name' => ucfirst(str_replace("_", " ", $key)), 'value' => $value);
    }

    
    // compute the subtotal_price and set the line_items
    $subtotal_price = 0;
    $total_tax = 0;
    $total_limit = 0;
    $count_limit = 1;
    
    $line_items = array();
    $checkout_line_items = $checkout['line_items'];
    $total_limit = count($checkout_line_items['product_id']);
    //echo $total_limit;
    //die;
    foreach($checkout_line_items['product_id'] as $line_item) {
     
	$subtotal_price += round(str_replace(",", "", $checkout_line_items['price'][$line_item]) * $checkout_line_items['quantity'][$line_item],2);

     
    }

    $total_tax = $subtotal_price * .06;
    foreach($checkout_line_items['product_id'] as $line_item) {
        if($count_limit==$total_limit){
		$line_items[] = array(
		    'product_id' => $line_item,
		    'title' => $checkout_line_items['product_title'][$line_item],
		    'variant_id' => $checkout_line_items['variant_id'][$line_item],
		    'variant_title' => $checkout_line_items['variant_title'][$line_item],
		    'quantity' => $checkout_line_items['quantity'][$line_item],
		    'price' => (float)str_replace(",", "", $checkout_line_items['price'][$line_item]),
		    'tax_lines' => array([
			 'price' => round($total_tax,2),
			 'rate' => 0.06,
			 'title' => 'Flat rate tax'
		    ])
		);
	}else{

		$line_items[] = array(
		    'product_id' => $line_item,
		    'title' => $checkout_line_items['product_title'][$line_item],
		    'variant_id' => $checkout_line_items['variant_id'][$line_item],
		    'variant_title' => $checkout_line_items['variant_title'][$line_item],
		    'quantity' => $checkout_line_items['quantity'][$line_item],
		    'price' => (float)str_replace(",", "", $checkout_line_items['price'][$line_item])
		);
	}
        $count_limit++;
       
    }
    
    
    // compute the total tax: total of all products * .06 flat rate tax
   
  
   
    
    
    // compute the total price, including the shipping rate
    $total_price = $subtotal_price + $total_tax + $shipping_rate;
    
    
    // create the order properties
    $email = $checkout['email'];
    $order_data = array(
        // 'billing_address' => $billing_address,
        'buyer_accepts_marketing' => isset($checkout['buyer_accepts_marketing']) ? true : false,
        // 'cart_token',
        // 'created_at',
        'currency' => 'MVR', //The three letter code (ISO 4217) for the currency used for the payment.
        // 'customer',
        'email' => $email,
        'line_items' => $line_items,
        // 'name',
        'note_attributes' => $note_attributes,
        // 'number',
        // 'order_number',
        'payment_gateway_names' => array("BML", "Cash on Delivery (COD)"),
        // 'processed_at',
        'processing_method' => 'manual',
        // 'referring_site',
        // 'refunds',
        'shipping_address' => $shipping_address,
        'shipping_lines' => $shipping_lines,
        // 'source_name' => 'api',
        //'subtotal_price' => (float)$subtotal_price, // Price of the order before shipping and taxes
        //'tax_lines' => $tax_lines,
        // 'taxes_included' => false, // States whether or not taxes are included in the order subtotal. Valid values are "true" or "false".
        // 'token', // Unique identifier for a particular order.
        // 'total_discounts' => "0.00", //The total amount of the discounts to be applied to the price of the order.
        //'total_line_items_price' => (float)$subtotal_price, //The sum of all the prices of all the items in the order.
        'transactions' => array([
		"kind"=> "sale",
		"status"=> "pending",
		"amount"=> round($total_price,2)	 
         ]),
        'financial_status' => 'pending',
	'total_tax' => round($total_tax,2),        
	'total_price' => round($total_price,2), //The sum of all the prices of all the items in the order, taxes and discounts included (must be positive).
        // 'total_tax', //The sum of all the taxes applied to the order (must be positive).
        // 'total_weight', //The sum of all the weights of the line items in the order, in grams.
        // 'updated_at', //The date and time when the order was last modified. The API returns this value in ISO 8601 format.
    );
    //dump($line_items);
    
    // create the order thru Shopify API
    $order = $shopify->createOrder($shop, $store_info['access_token'], array('order' => $order_data));
    //dump($order);
    
    // process payment based from the selected payment method
    if (!isset($order->errors)) {
        if ($checkout['payment_gateway'] == 'BML') {
            require_once '../includes/utils/MPI/MPI.php';
            $bml_checkout = array(
                'version' => '1.0.0',
                'merchantId' => '9809680275',
                'acquirerId' => '407387',
                'merchantResponseUrl' => 'https://bml-app.herokuapp.com/proxy/bml/response',
                'purchaseCurrency' => 462,
                'purchaseCurrencyExponent' => 2,
                'orderId' => $order->order->id,
                'signatureMethod' => 'SHA1',
                'transactionPassword' => 'J9fLcF3B',
                'amount' => $total_price,
                'requestSignature'
            );
            $mpi = new MPI($bml_checkout);
            //dump($bml_checkout);
            require_once 'bml-checkout.php';
        } else if ($checkout['payment_gateway'] == 'COD') {
            header("Content-Type: application/liquid");
            require_once 'thankyou.php';
        } else if ($checkout['payment_gateway'] == 'Paypal') {
            require_once 'thank-you.php';
        }
    }
}

function dump($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}
