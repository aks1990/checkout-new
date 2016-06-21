<?php

session_cache_limiter("none");
session_start();
ob_start();

error_reporting(E_ALL);

// include shopify class
require_once "../includes/utils/Shopify.php";

// include table classes
require_once "../includes/db/Stores.php";
require_once "oauth_functions.php";

$shopify = new ShopifyOAuth();
$Stores = new Stores();

$shop = isset($_GET["shop"]) ? $_GET["shop"] : false;
$code = isset($_GET["code"]) ? $_GET["code"] : false;

if ($shop && !$code) {
    // validate the shop name
    if(!$shopify->validateMyShopifyName($shop)) {
        // shop name is not valid display an error
        $shopify->redirectUser($shopify->getManualInstallationUrl($shop));
    }

    // shop name is valid, we check if store exists in our db
    $store_info = $Stores->validateStoreByStoreURL($shop);
    
    if (!empty($store_info)) {
        $token = $store_info['access_token'];

        // let's make a test call to Shopify to check whether the access token is upto date
        $shop_info = $shopify->getShopInfo($shop, $token);
        
        if (isset($shop_info->shop)) {
            // validate if request origin is shopify
            $validate_request_origin_is_shopify = $shopify->validateRequestOriginIsShopify($code,$shop,$_GET["timestamp"],$_GET["signature"]);

            if(!$validate_request_origin_is_shopify) {
                // request origin is not from shopify, redirect user to the auth login
                $redirectUrl = $shopify->getAuthUrl($shop);
                $shopify->redirectUser($redirectUrl);
            }

            /* get the redirect uri, in this case we redirect user to the configure page */
            $redirectUrl = $shopify->getConfigurePanelUrl($shop);
        } else {
            /* get the redirect url, in this case we redirect user to the scope permissions page */
            $redirectUrl = $shopify->getAuthUrl($shop);

            /* we do the redirect */
            $shopify->redirectUser($redirectUrl);
        }
    } else {
        /* get the redirect url, in this case we redirect user to the scope permissions page */
        $redirectUrl = $shopify->getAuthUrl($shop);

        /* we do the redirect */
        $shopify->redirectUser($redirectUrl);
    }

} /* end if ($shop && !$code) */

if ($code) {
    /* Exchange Temp Token For Permanent Token */
    $exchange_token_response = $shopify->exchangeTempTokenForPermanentToken($shop, $code);

    // validate access token
    if(!isset($exchange_token_response->access_token) && isset($exchange_token_response->errors)) {
        // access token is not valid, redirect user to error page
        $redirectUrl = $shopify->getErrorTokenUrl($shop);
        $shopify->redirectUser($redirectUrl);
    }

    $permanent_token = $exchange_token_response->access_token;
    
    $Stores = new Stores();
    $store_info = $Stores->validateStoreByStoreURL($shop);

    if (count($store_info)) {
        $Stores->updateStore($store_info["store_id"], array(
            "access_token" => $permanent_token
        ));
        
        $carrier_services = $shopify->getCarrierServices($shop, $store_info['access_token']);
        if (empty($carrier_services)) {
            // add the carrier service for the BML shipping rates
            $carrier_service = $shopify->addCarrierService($shop, $permanent_token);
        }
        
        // deploy the script tag
        $script_tag = $shopify->deployScriptTag($shop, $permanent_token);
    } else { // add new record
        // store the permanent access token
        $Stores->add(array(
            "store_url" => $shop,
            "access_token" => trim($permanent_token),
        ));
        
        // add the carrier service for the BML shipping rates
        $carrier_service = $shopify->addCarrierService($shop, $permanent_token);
        
        // deploy the script tag
        $script_tag = $shopify->deployScriptTag($shop, $permanent_token);
    }
    
    /* get the redirect url, in this case we redirect user to the configure page */
    $redirectUrl = $shopify->getConfigurePanelUrl($shop);
    
    /* we're good to go, so redirect the user to the configure page */
    $shopify->redirectUser("https://$shop");
}

function dump($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre><br><br>";
}
?>

<link rel="stylesheet" type="text/css" href="//oss.maxcdn.com/semantic-ui/2.1.6/semantic.min.css">
<div class="ui container">
    <div class="ui grid">
        <div class="column">
            <form class="ui form" method="get" action="">
                <div class="field">
                    <input type="text" name="shop" value="" placeholder="your-shop-name.myshopify.com" />
                </div>
                <button class="ui blue button" type="submit">Install</button>
            </form>
        </div>
    </div>
</div>
<style>
    .ui.form {
        width: 40%;
        margin-top: 5em;
    }
</style>