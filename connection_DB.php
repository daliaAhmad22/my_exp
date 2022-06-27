<?php
session_start();
ob_start();
$connect = oci_pconnect("gas_booking", "123456", "//localhost:1521/orclpdb");

?>

