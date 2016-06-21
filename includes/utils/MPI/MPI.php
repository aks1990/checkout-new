<?php

Class MPI {

    private $values = array(
        'version'                  => '1.0.0',
        'merchantId'               => null,
        'acquirerId'               => '407387',
        'merchantResponseUrl'      => null,
        'purchaseCurrency'         => '462',
        'purchaseCurrencyExponent' => '2',
        'orderId'                  => null,
        'signatureMethod'          => 'SHA1',
        'transactionPassword'      => null,
        'amount'                   => null,
        'requestSignature'         => null);

    public function __construct(Array $config) {
        foreach ($config as $key => $value) {
            if (in_array($key, array_keys($this->values))) {
                $this->values[$key] = $value;
            }
        }
        $this->values['amount'] = $this->formatAmount($this->values['amount']);
        $this->values['requestSignature'] = $this->generateSignature($this->values['requestSignature']);
        // print_r($this->values);
        if (file_exists('trxn' . DIRECTORY_SEPARATOR . $this->values['orderId'] . '.REQUEST.json')) {
            var_dump("duplicate order id");
            exit;
        } else {
            file_put_contents('trxn' . DIRECTORY_SEPARATOR . $this->values['orderId'] . '.REQUEST.json', json_encode($this->values));
        }

    }

    public function __get($name) {
        return $this->values[$name];
    }

    private function formatAmount($amount) {
        $amount = number_format($amount, 2, '.', '');
        $amount = str_replace('.', '', $amount);
        $amount = str_pad($amount, 12, '0', STR_PAD_LEFT);
        return $amount;
    }

    private function generateSignature() {
        $signature = $this->values['transactionPassword']
                   . $this->values['merchantId']
                   . $this->values['acquirerId']
                   . $this->values['orderId']
                   . $this->values['amount']
                   . $this->values['purchaseCurrency'];
        return base64_encode(sha1($signature, true));
        
    }

}