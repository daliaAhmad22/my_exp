<?php
include '../connection_DB.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM booking WHERE BOOKING_ID = '$id'";
    $result = oci_parse($connect, $query);
    oci_execute($result);

    if ($result) {
        $_SESSION['booking'] = "<span class='success' '> Order is deleted </span>";
        header("location:manage_booking.php");
    } else {
        $_SESSION['booking'] = "<span class='error' '> Order is not deleted </span>";
        header("location:manage_booking.php");
    }
}
?>
