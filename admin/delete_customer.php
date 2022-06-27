<?php
include '../connection_DB.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM customer WHERE id = '$id'";
    $result = oci_parse($connect, $query);
    oci_execute($result);

    if ($result) {
        $_SESSION['customer'] = "<span class='success' '> Customer is deleted </span>";
        header("location:manage_customer.php");
    } else {
        $_SESSION['customer'] = "<span class='error' '> Customer is not deleted </span>";
        header("location:manage_customer.php");
    }
}
?>
