<?php
include '../connection_DB.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM admin WHERE id='$id'";
    $result = oci_parse($connect, $query);
    oci_execute($result);

    if ($result) {
        $_SESSION['admin'] = "<span class='success' '> Admin is deleted </span>";
        header("location:manage_admin.php");
    } else {
        $_SESSION['admin'] = "<span class='error' '> Admin is not deleted </span>";
        header("location:manage_admin.php");
    }
}
?>
