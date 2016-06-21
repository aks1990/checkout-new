<?php

echo "RESPONSE FROM BML: ";
var_dump($_POST);

if ($_POST) {
    file_put_contents('trxn' . DIRECTORY_SEPARATOR . $_POST['OrderID'] . '.RESPONSE.json', json_encode($_POST));
}
