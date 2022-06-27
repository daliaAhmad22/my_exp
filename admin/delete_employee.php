<?php
include '../connection_DB.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM employee WHERE id = '$id'";
    $result = oci_parse($connect, $query);
    oci_execute($result);

    if ($result) {
        $_SESSION['employee'] = "<span class='success' '> Employee is deleted </span>";
        header("location:manage_employee.php");
    } else {
        $_SESSION['employee'] = "<span class='error' '> Employee is not deleted </span>";
        header("location:manage_employee.php");
    }
}
?>
