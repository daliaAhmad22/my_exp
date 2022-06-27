<?php
include "../connection_DB.php";
include "partials/menu.php"
?>

<link rel="stylesheet" href="../admin.css">
<title> Add Admin</title>

<div class="main-content">
    <div class="wrapper">
        <h1 class = 'title'>Add Admin</h1>

        <br><br>

        <form action="" method="POST" >
            <table class="tbl-40">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input class="inputs" type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input class="inputs" type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input class="inputs" type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>


    </div>
</div>

<?php
if(isset($_POST['submit'])){
    $full_name= $_POST['full_name'];
    $username=$_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO admin VALUES ('$username', '$full_name','','','','$password','')";
    $result = oci_parse($connect, $query);
    oci_execute($result);

    if($result){
        $_SESSION['admin']="<span class='success'> Admin is added </span>";
        header("location:manage_admin.php");
    }
    else   {
        $_SESSION['admin']="<span class='error'> Admin is not added </span>";
        header("location:manage_admin.php");
    }
}
include "partials/footer.php";
?>

