<?php
include "../connection_DB.php";
include "partials/menu.php"
?>

<link rel="stylesheet" href="../admin.css">
<title>Add Employee</title>

<div class="main-content">
    <div class="wrapper">
        <h1 class = 'title'>Add Employee</h1>

        <br><br>

        <form action="" method="POST" >
            <table class="tbl-40">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input class="inputs" type="text" name="full_name" placeholder="Enter Employee Name">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input class="inputs" type="text" name="username" placeholder="employee Username">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input class="inputs" type="password" name="password" placeholder="employee default Password">
                    </td>
                </tr>

                <tr>
                    <td>Designation:</td>
                    <td>
                        <input class="inputs" type="text" name="Designation" placeholder="employee Designation">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Employee" class="btn-secondary">
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
    $Designation = $_POST['Designation'];

    $query = "INSERT INTO employee VALUES ('$username','$full_name','','','$Designation','$password','','2')";
    $result = oci_parse($connect, $query);
    oci_execute($result);

    if($result){
        $_SESSION['employee']="<span class='success'> Employee is added </span>";
        header("location:manage_employee.php");
    }
    else   {
        $_SESSION['employee']="<span class='error'> Employee is not added </span>";
        header("location:manage_employee.php");
    }
}
include "partials/footer.php";
?>

