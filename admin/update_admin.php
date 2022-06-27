<?php
include "../connection_DB.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "select count(*) ADMIN_ID from  ADMIN WHERE id='$id'";
    $result = oci_parse($connect, $query);
    oci_execute($result);
    $num = oci_fetch_all($result, $res);
    $num = $res['ADMIN_ID'][0]; "<br>";

    $sql = "SELECT * FROM admin WHERE id='$id'";
    $res = oci_parse($connect, $sql);
    oci_execute($res);
    if ($num > 0) {
        $row = oci_fetch_assoc($res);
        $username = $row['ADMIN_ID'];
        $full_name = $row['ADMIN_NAME'];
    } else {
        $_SESSION['admin'] = "<span class='error'> admin is not found </span>";
        header("location:manage_admin.php");
    }
}

?>

<link rel="stylesheet" href="../admin.css">
<title> Update Admin</title>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <form action="" method="POST">

            <table class="tbl-40">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input class="inputs" type="text" name="full_name"">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input class="inputs" type="text" name="username"">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input class="inputs" type="hidden" name="hidden" value="<?php echo $id ?>">
                        <input class="inputs" type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php
    if (isset($_POST['submit'])) {
        $id = $_POST['hidden'];
        $New_fullname = $_POST['full_name'];
        $New_username = $_POST['username'];

        $sqll = "UPDATE ADMIN SET ADMIN_NAME='$New_fullname', ADMIN_ID='$New_username' WHERE id='$id'";
        $ress = oci_parse($connect, $sqll);
        oci_execute($ress);

        if ($ress) {
            $_SESSION['admin'] = "<span class = 'success'> Admin is updated </span>";
            header("location:manage_admin.php");
        } else {
            $_SESSION['admin'] = "<span class = 'error'> Admin is not updated </span>";
            header("location:manage_admin.php");
        }
}
include "partials/footer.php"
?>

