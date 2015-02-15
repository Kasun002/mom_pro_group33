<?php

class connectToDb {

    function checkConnection() {
        $connect = mysql_connect('localhost', 'root', '');
        if ($connect) {
            $select = mysql_select_db('momprov');
            if (!$select) {
                die('unable to connect with Database, please check the connection');
            }
        } else {
            die('unable to connect with server, please check the connection');
        }
    }
}

$con = new connectToDb();

echo $con->checkConnection();

?>