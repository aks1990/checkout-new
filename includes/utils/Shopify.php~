<?php

set_time_limit(0);

class Shopify {

    protected $_APP_KEY;
    protected $_APP_SECRET;
    protected $_APP_HOST;

    public function __construct($env = 'prod') {
        $this->initializeKeys($env);
    }

    protected function initializeKeys($env) {
        if ($env == 'dev') {
            $this->_APP_KEY = "aa6df2c12937d0c82923a7ea109cf872";
            $this->_APP_SECRET = "4a43c074b00a9c3ee3c51ad7747dd4cd";
            $this->_APP_HOST = "bml-app.herokuapp.com";
        } else {
            $this->_APP_KEY = "524ddd7d3993d837f41cfc1a4d020c80";
            $this->_APP_SECRET = "13a74bf2ba0e95093f20f64ecb80726b";
            $this->_APP_HOST = "128.199.211.213";
        }
    }

    /**
     * this method is used to exchange the temporary access code into a permanent access token
     * @param varchar $shop the store URL of store owner
     * @param varchar $TempCode the temp code returned by Shopify
     * @return json the access_token
     */
    public function exchangeTempTokenForPermanentToken($shop, $TempCode) {
        // encode the data
        $data = json_encode(array("client_id" => $this->_APP_KEY, "client_secret" => $this->_APP_SECRET, "code" => $TempCode));

        // the curl url
        $curl_url = "https://$shop/admin/oauth/access_token";
        // set curl options
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $curl_url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json"));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        // execute curl
        $response = json_decode(curl_exec($ch));

        // close curl
        curl_close($ch);

        return $response;
    }

    /**
     * this method is used to add new carrier service to meet the client's requirements for the shipping options/rates
     * @param varchar $shop the store URL of store owner
     * @param varchar $token the access token returned by Shopify
     * @param varchar $Email the email of the user
     */
    public function addCarrierService($shop, $token) {
        // encode the data
        $data = json_encode(array("carrier_service" => array(
                "name" => "BML Shipping",
                "callback_url" => "https://bml-app.herokuapp.com/shipping",
                "format" => "json",
                "service_discovery" => true
        )));

        // the curl url
        $curl_url = "https://$shop/admin/carrier_services.json";
        
        return $this->curlRequest($curl_url, $token, $data);
    }

    /**
     * this method is used to get the list of carrier services
     * @param varchar $shop the store URL of store owner
     * @param varchar $token the access token returned by Shopify
     * @param varchar $Email the email of the user
     */
    public function getCarrierServices($shop, $token) {
        // the curl url
        $curl_url = "https://$shop/admin/carrier_services.json";
        
        return $this->curlRequest($curl_url, $token);
    }

    /**
     * this method is used to get the list of carrier services
     * @param varchar $shop the store URL of store owner
     * @param varchar $token the access token returned by Shopify
     * @param varchar $Email the email of the user
     */
    public function getCheckouts($shop, $token) {
        // the curl url
        $curl_url = "https://$shop/admin/checkouts.json";
        
        return $this->curlRequest($curl_url, $token);
    }

    /**
     * this method is used to get the list of carrier services
     * @param varchar $shop the store URL of store owner
     * @param varchar $token the access token returned by Shopify
     * @param varchar $Email the email of the user
     */
    public function createOrder($shop, $token, $order) {
        // the curl url
        $curl_url = "https://$shop/admin/orders.json";

	 

         $data = json_encode($order);
       
        
         
	 //print_r($data);
         //die;
        return $this->curlRequest($curl_url, $token, $data);
    }

    /**
     * this method is used to get the list of carrier services
     * @param varchar $shop the store URL of store owner
     * @param varchar $token the access token returned by Shopify
     * @param varchar $Email the email of the user
     */
    public function getOrders($shop, $token) {
        // the curl url
        $curl_url = "https://$shop/admin/orders.json";
        
        return $this->curlRequest($curl_url, $token);
    }

    /**
     * this method is used to get the list of carrier services
     * @param varchar $shop the store URL of store owner
     * @param varchar $token the access token returned by Shopify
     * @param varchar $Email the email of the user
     */
    public function getOrderInfo($shop, $token, $order_id) {
        // the curl url
        $curl_url = "https://$shop/admin/orders/$order_id.json";
        
        return $this->curlRequest($curl_url, $token);
    }

     /**
     * this method is used to get the list of discounts
     */
    public function getDiscounts($shop, $token) {
        // the curl url
        $curl_url = "https://$shop/admin/discounts.json";
        
        return $this->curlRequest($curl_url, $token);
    }

    /**
     * this method is used to check if the app script already exists in the store to prevent duplicate scripts being added to the store
     * @param varchar $shop the store URL of store owner
     * @param varchar $token the access token returned by Shopify
     * @return boolean - true if count > 0 otherwise false
     */
    public function isScriptTagExists($shop, $token) {
        // the curl url
        $curl_url = "https://$shop/admin/script_tags/count.json";

        // execute curl
        $response = $this->curlRequest($curl_url, $token);
        
        return isset($response->count) && $response->count > 0 ? true : false;
    }
    /**
     * this method is used to deploy the app script the store owner's website
     * @param varchar $shop the store URL of store owner
     * @param varchar $token the access token returned by Shopify
     */
    public function deployScriptTag($shop, $token) {
        // we check first if we have already installed the script to store, if not we create it otherwise we skip this step
        if(!$this->isScriptTagExists($shop, $token)) {
            // encode the data
            $src = "//" . $this->_APP_HOST."/scripts/bml-scripts.js";
            $data = json_encode(array("script_tag" => array("src" => $src, "event" => "onload")));

            // the curl url
            $curl_url = "https://$shop/admin/script_tags.json";

            return $this->curlRequest($curl_url, $token, $data);
        }
    }

    public function getAppKey() {
        return $this->_APP_KEY;
    }

    public function getAppSecret() {
        return $this->_APP_SECRET;
    }

    public function curlRequest($url, $token = false, $data = false) {
        $ch = curl_init(); //create a new cURL resource handle
        curl_setopt($ch, CURLOPT_URL, $url); // Set URL to download

        $http_headers = array("Content-Type:application/json");
        if ($token) {
            $http_headers = array("Content-Type:application/json", "X-Shopify-Access-Token: $token");
        }

        curl_setopt($ch, CURLOPT_HEADER, false); // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HTTPHEADER, $http_headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        $output = curl_exec($ch); // Download the given URL, and return output

        if ($output === false) {
            return 'Curl error: ' . curl_error($ch);
        }

        curl_close($ch); // Close the cURL resource, and free system resources

        return json_decode($output);
    }

}

