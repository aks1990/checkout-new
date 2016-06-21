<?php

error_reporting(E_ALL);

// include the config file
include_once 'config.php';

class DB_connect {
    
    public function __construct() {
        mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
        mysql_select_db(DB_NAME) or die(mysql_error());
    }
    
    /**
     * this method is used to construct and execute SELECT queries
     * @param varchar $table the name of the table
     * @param mixed $columns the list of column(s) to be selected or can be '*" if all columns
     * @param varchar $where the WHERE condition statement
     * @param int $limit the LIMIT
     * @return array
     */
    public function select($table, $columns, $where = null, $limit = null, $raiseError = null, $order_by_column='', $order_by_sequence='DESC') {
        // for the columns if it's still in array form
        if (is_array($columns)) {
            $columns = implode(", ", $columns);
        }
        
        $query = "SELECT $columns FROM $table" . (!empty($where) ? " WHERE $where" : "") . (!empty($order_by_column) ? " ORDER BY $order_by_column $order_by_sequence" : ""). (!empty($limit) ? " LIMIT $limit" : "");
        $result = mysql_query($query);
        
        if ((is_bool($result) && !$result) || (!empty($raiseError) && strpos($raiseError, "database-failure") > -1)) {
            //die(mysql_error()."<br>Whole Query: $query");
            //exit();
            return array("error" => $raiseError);
        }
        
        $rows = array();
        if (!empty($result) && !is_bool($result)) {
            while ($row = mysql_fetch_array($result)) {
                $rows[] = $row;
            }
        
            // free the result source
            mysql_free_result($result);
        }
        
        return !empty($limit) && $limit == 1 ? (isset($rows[0]) ? $rows[0] : array()) : $rows;
    }
    
    /**
     * this method is used to construct and execute INSERT queries
     * @param varchar $table the name of the table
     * @param mixed $columns the columns of the table to be filled with data
     * @param mixed $values the values to be stored in the table columns
     */
    public function insert($table, $columns, $values) {
        // format the columns if it's still in array form
        if (is_array($columns)) {
            $columns = implode(", ", $columns);
        }
        
        // format the values if it's still in array form
        if (is_array($values)) {
            $values = implode(", ", $values);
        }
        
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        $this->execute($query) or die(mysql_error());
        return mysql_insert_id();
    }
    
    /**
     * this method is used to construct and execute UPDATE queries
     * @param varchar $table the name of the table
     * @param mixed $data column=>value pairs of columns to be stored with data/value
     * @param varchar $where the WHERE condition statement
     */
    public function update($table, $data, $where) {
        $query_data = array();
        // construct the set data query string
        foreach($data as $column => $value) {
            $query_data[] = "$column = " . (is_string($value) ? "'".$value."'" : $value);
        }
        $query = "UPDATE $table SET ".  implode(", ", $query_data) . " WHERE $where";
        
        return mysql_query($query);
    }
    
    /**
     * this method is used to construct and execute DELETE queries
     * @param varchar $table the name of the table
     * @param varchar $where the WHERE condition statement
     */
    public function delete($table, $where) {
        $query = "DELETE FROM $table WHERE $where";
        $this->execute($query);
    }
    
    /**
     * this method is used to execute sql queries
     * @param varchar $query
     * @return query result
     */
    public function execute($query) {
        return mysql_query($query) or die(mysql_error()."<br>$query");
    }
    
}
