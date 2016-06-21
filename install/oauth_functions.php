<?php

include_once '../../includes/config/config.php.inc';
include_once '../../includes/utils/Shopify.php';

class ShopifyOAuth extends Shopify {

    public function getAuthUrl($shop) {
        $scopes = "write_shipping,read_orders,write_orders,write_script_tags";
        return 'https://' . $shop . '/admin/oauth/authorize?scope='.$scopes.'&client_id=' . $this->getAppKey() . '&redirect_uri=http://128.199.211.213/install';
    }

    public function getManualInstallationUrl($shop) {
        return '/error.php?error=wrong-format&shop=' . $shop . '';
    }

    public function getConfigurePanelUrl($shop) {
        return '/backpanel?shop=' . $shop;
    }

    public function getErrorTokenUrl($shop) {
        return '/error.php?error=permanent-token-not-received&shop=' . $shop . '';
    }

    public function redirectUser($REDIRECT_URL) {
        header("Location: $REDIRECT_URL");
        exit();
    }

    public function validateMyShopifyName($shop) {
        $subject = $shop;
        $pattern = '/^(.*)?(\.myshopify\.com)$/';
        preg_match($pattern, $subject, $matches);

        return $matches[2] == '.myshopify.com';
    }

    public function validateRequestOriginIsShopify($code, $shop, $timestamp, $signature) {
        $get_params_string = 'code=' . $code . 'shop=' . $shop . 'timestamp=' . $timestamp . '';
        $calculated_signature = md5(SHOPIFY_APP_PASSWORD . $calculated_signature);

        if ($calculated_signature == $signature) {
            return true;
        } else if ($_GET["origin"] == 'shopify') {
            return true;
        } else {
            return false;
        }
    }

}

?>
