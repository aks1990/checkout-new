<?php

include_once 'db_connection.php';

class Stores extends DB_connect {
    protected $_name = "stores";
    protected $_primary = "store_id";
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * this method is used to add new data to the table `users`
     * @param array $data field->value pairs
     * @return int store_id of the last added data
     */
    public function add($data) {
        foreach($data as $column => $value) {
            // skip the primary id/column since it's an auto_increment
            if ($column != $this->_primary) {
                $columns[] = $column;
                // enclosed all string values with quotes
                if (is_string($value)) {
                    $value = "'".$value."'";
                }
                $values[] = $value;
            }
        }
        return $this->insert($this->_name, $columns, $values);
    }
    
    /**
     * this method is used to update the store info
     * @param int $store_id the store id of the store to be updated
     * @param array $data field->value pirs that will be updated
     */
    public function updateStore($store_id, $data) {
        $where = "store_id = $store_id";
        return $this->update($this->_name, $data, $where);
    }


    /**
     * this method is used to validate the $access_token is correct/existing
     * @param varchar $access_token the access token to validate with
     * @return boolean returns true if the access_token is correct, otherwise it returns false
     */
    public function validateStoreByaccess_token($access_token) {
        $where = "access_token = '$access_token'";
        return $this->select($this->_name, '*', $where, 1);
    }
    
    /**
     * this method is used to validate the $store_url is correct/existing
     * @param varchar $store_url the store URL to validate with
     * @return boolean returns true if the store_url is correct, otherwise it returns false
     */
    public function validateStoreByStoreURL($store_url) {
        $where = "store_url = '$store_url'";
        return $this->select($this->_name, '*', $where, 1);
    }
    
    /**
     * this method is used to get the store information by access_token
     * @param varchar $access_token the access token of the store to check with
     * @return array
     */
    public function getStoreInfoByAccessToken($access_token) {
        $where = "access_token = '$access_token'";
        return $this->select($this->_name, '*', $where, 1);
    }
    
    /**
     * this method is used to get the store information by store_id
     * @param int $store_id the store_id of the user to select
     * @return array
     */
    public function getStoreInfoByStoreID($store_id) {
        $where = "store_id = $store_id";
        return $this->select($this->_name, '*', $where, 1);
    }
    
    /**
     * this method is used to delete a specific store from the database
     * @param varchar $store_url the store's shopif domain
     */
    public function deleteStore($store_url) {
        $where = "store_url = '$store_url'";
        $this->delete($this->_name, $where);
    }
    
}

?>
