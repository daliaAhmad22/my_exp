<?php
include '../connection_DB.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM cylinder WHERE CYLINDER_ID = '$id'";
    $result = oci_parse($connect, $query);
    oci_execute($result);

    if ($result) {
        $_SESSION['cylinder'] = "<span class='success' '> Cylinder is deleted </span>";
        header("location:manage_cylinder.php");
    } else {
        $_SESSION['cylinder'] = "<span class='error' '> Cylinder is not deleted </span>";
        header("location:manage_cylinder.php");
    }
}
?>
