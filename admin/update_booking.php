<?php
include "../connection_DB.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT count(*) BOOKING_ID FROM  BOOKING WHERE BOOKING_ID ='$id'";
    $result = oci_parse($connect, $query);
    oci_execute($result);
    $num = oci_fetch_all($result, $res);
    $num = $res['BOOKING_ID'][0];
    "<br>";

    $sql = "SELECT * FROM BOOKING WHERE BOOKING_ID = '$id'";
    $res = oci_parse($connect, $sql);
    oci_execute($res);

    if ($num > 0) {
        $row = oci_fetch_assoc($res);
        $status = $row['STATUS'];
    }
    else {
        $_SESSION['booking'] = "<span class='error'> There is no such order </span>";
        header("location:manage_booking.php");
    }
}


?>

<link rel="stylesheet" href="../admin.css">
<title> Update Order Status </title>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order Status</h1>

        <br><br>

        <form action="" method="POST">

            <table class="tbl-40">
                <tr>
                    <td>status:</td>
                    <td>
                        <input class="inputs" type="text" name="status">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input class="inputs" type="hidden" name="hidden" value="<?php echo $id ?>">
                        <input class="inputs" type="submit" name="submit" value="Update Order Status" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['hidden'];
    $status = $_POST['status'];


    $sqll = "UPDATE BOOKING SET STATUS='$status' WHERE BOOKING_ID ='$id'";
    $ress = oci_parse($connect, $sqll);
    oci_execute($ress);

    if ($ress) {
        $_SESSION['booking'] = "<span class = 'success'> Status is updated </span>";
        header("location:manage_booking.php");
    } else {
        $_SESSION['booking'] = "<span class = 'error'> Status is not updated </span>";
        header("location:manage_booking.php");
    }
}
include "partials/footer.php"
?>
