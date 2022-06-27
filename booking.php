<?php
include "include.html";
include "connection_DB.php";

if (isset($_SESSION['booking'])) {
    echo $_SESSION['booking'];
    unset($_SESSION['booking']);
}
?>
    <html>
    <style>
        .success{
            color: #fff;
            background: #2ed573;
            padding:5px;
            width: fit-content;
        }
        .error{
            color: #fff;
            background: red;
            padding:5px;
            width: fit-content;
        }

    </style>

<?php

if (isset($_COOKIE["customerID"])) {
    $cust_id = $_COOKIE["customerID"];
    if (isset($_COOKIE["cylinderid"])) {
        $cylin_id = $_COOKIE["cylinderid"];
        if (isset($_COOKIE["custname"])) {
            $custname = $_COOKIE["custname"];

            if (isset($_POST['submit'])) {

                $query = "INSERT INTO booking VALUES ('','$cust_id','$custname','$cylin_id',SYSDATE,'active')";
                $result = oci_parse($connect, $query);
                oci_execute($result);

                if ($result) {
                    echo "<span class='success'>Booking Done</span>";
                    //header("location:manage_employee.php");
                } else {
                    echo "<span class='error'> Booking Not Done </span>";
                    //header("location:manage_employee.php");
                }
            }
        }
    }
}
?>