<?php
include '../connection_DB.php';
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "select count(*) ADMIN_ID from  ADMIN WHERE ID ='$id'";
    $result = oci_parse($connect, $query);
    oci_execute($result);
    $admin_num = oci_fetch_all($result , $res);
    $admin_num = $res['ADMIN_ID'][0]; "<br>";

    $sql = "SELECT * FROM admin WHERE id='$id'";
    $ress = oci_parse($connect,$sql);
    oci_execute($ress);

  if($admin_num > 0){
        $row = oci_fetch_assoc($ress);
        $old_password = $row['PASSWORD'];
    }
}
?>

    <link rel="stylesheet" href="../admin.css">
    <title>Change Password</title>

    <div class="main-content">
        <div class="wrapper">
            <h1>Change Password</h1>
            <br><br>
            <?php
            if(isset($_SESSION['admin'])){
                echo $_SESSION['admin'];
                unset ($_SESSION['admin']);
            }
            ?>

            <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Current Password:</td>
                        <td>
                            <input type="password" name="current_password" placeholder="Current Password">
                        </td>
                    </tr>

                    <tr>
                        <td>New Password:</td>
                        <td>
                            <input type="password" name="new_password" placeholder="New Password">
                        </td>
                    </tr>

                    <tr>
                        <td>Confirm Password:</td>
                        <td>
                            <input type="password" name="confirm_password" placeholder="Confirm Password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input class="inputs" type="hidden" name="hidden" value="<?php echo $id ?>">
                            <input class="inputs" type="hidden" name="hidden1" value="<?php echo $old_password ?>">
                            <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                        </td>
                    </tr>

                </table>

            </form>

        </div>
    </div>


<?php
if(isset($_POST['submit'])){
    $id = $_POST['hidden'];
    $old_password = $_POST['hidden1'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if($old_password == $current_password){
        if($new_password == $confirm_password){

            $sql="UPDATE admin SET PASSWORD='$new_password' WHERE id='$id'";
            $res = oci_parse($connect,$sql);
            oci_execute($res);

            if($res){
                $_SESSION['admin']="<span class='success'> Password is changed </span>";
                header("location:manage_admin.php");
            }
            else {
                $_SESSION['admin']="<span class='error'> Passwords can not be changed </span>";
                header("location:manage_admin.php");
            }
        }
        else{
            $_SESSION['admin']="<span class='error'> Passwords are not matched </span>";
            header("location:change_password.php");
        }
    }
    else{
        $_SESSION['admin']="<span class='error'> Password is not correct </span>";
        header("location:change_password.php");
    }
}
include "partials/footer.php";

