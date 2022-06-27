<?php
include "../connection_DB.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT count(*) CYLINDER_ID FROM  CYLINDER WHERE CYLINDER_ID ='$id'";
    $result = oci_parse($connect, $query);
    oci_execute($result);
    $num = oci_fetch_all($result, $res);
    $num = $res['CYLINDER_ID'][0];
    "<br>";

    $sql = "SELECT * FROM CYLINDER WHERE CYLINDER_ID = '$id'";
    $res = oci_parse($connect, $sql);
    oci_execute($res);

    if ($num > 0) {
        $row = oci_fetch_assoc($res);
        $amount = $row['AMOUNT'];
    }
    else {
        $_SESSION['cylinder'] = "<span class='error'> Cylinder is not found </span>";
        header("location:manage_cylinder.php");
    }
}


?>

    <link rel="stylesheet" href="../admin.css">
    <title> Update Cylinder</title>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Cylinder</h1>

            <br><br>

            <form action="" method="POST">

                <table class="tbl-40">
                    <tr>
                        <td>Amount:</td>
                        <td>
                            <input class="inputs" type="text" name="amount">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input class="inputs" type="hidden" name="hidden" value="<?php echo $id ?>">
                            <input class="inputs" type="submit" name="submit" value="Update Cylinder" class="btn-secondary">
                        </td>
                    </tr>

                </table>

            </form>
        </div>
    </div>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['hidden'];
    $amount = $_POST['amount'];


    $sqll = "UPDATE Cylinder SET AMOUNT='$amount' WHERE CYLINDER_ID ='$id'";
    $ress = oci_parse($connect, $sqll);
    oci_execute($ress);

    if ($ress) {
        $_SESSION['cylinder'] = "<span class = 'success'> Cylinder is updated </span>";
        header("location:manage_cylinder.php");
    } else {
        $_SESSION['cylinder'] = "<span class = 'error'> Cylinder is not updated </span>";
        header("location:manage_cylinder.php");
    }
}
include "partials/footer.php"
?>
