<?php
include "../connection_DB.php";
include "partials/menu.php"
?>

<?php
if (isset($_POST['submit1'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['psw']);

    $re_pass = validate($_POST['psw-repeat']);
    $name = validate($_POST['name']);

    $user_data = 'uname=' . $uname . '&name=' . $name;

    if ($pass !== $re_pass) {
        header("Location: ../signUp.php?error=The confirmation password  does not match&$user_data");
       // header("Location: ../signUp.php");
        exit();
    }
    $sql = "SELECT * FROM CUSTOMER WHERE CUSTOMER_ID='$uname' ";
    $result = oci_parse($connect, $sql);
    oci_execute($result);
    if (oci_fetch_all($result, $rst) > 0) {
        header("Location: ../signUp.php?error=The username is taken try another&$user_data");
        exit();
    }
}
?>


<link rel="stylesheet" href="../admin.css">
<title>Add Customer</title>

<div class="main-content">
    <div class="wrapper">
        <h1 class = 'title'>Add Customer</h1>

        <br><br>

        <form action="" method="POST" >
            <table class="tbl-40">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input class="inputs" type="text" name="full_name" value ="<?php echo $name ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input class="inputs" type="text" name="username" value ="<?php echo $uname ?>">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input class="inputs" type="password" name="password" value ="<?php echo $pass ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Customer" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>


    </div>
</div>

<?php
if(isset($_POST['submit'])){
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO customer VALUES ('$username','$full_name','','','','','','',$password,'1')";
    $result = oci_parse($connect, $query);
    oci_execute($result);

    if($result){
        $_SESSION['customer']="<span class='success'> Customer is added </span>";
        header("location:manage_customer.php");
    }
    else   {
        $_SESSION['customer']="<span class='error'> Customer is not added </span>";
        header("location:manage_customer.php");
    }
}
include "partials/footer.php";
?>

