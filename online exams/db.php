<?php


$_CONF = array();
$_CONF['host'] = "localhost";
$_CONF['db_user'] = "root";
$_CONF['db_name'] = "online_exam";
$_CONF['db_pass'] =  "";


// Create connection
    $conn = new mysqli($_CONF['host'], $_CONF['db_user'], $_CONF['db_pass'],$_CONF['db_name']);


    // if error come out when try connection`
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

 ?>
