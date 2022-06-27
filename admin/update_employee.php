<?php
include "../connection_DB.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "select count(*) EMPLOYEE_ID from  EMPLOYEE WHERE id='$id'";
    $result = oci_parse($connect, $query);
    oci_execute($result);
    $num = oci_fetch_all($result, $res);
    $num = $res['EMPLOYEE_ID'][0]; "<br>";

    $sql = "SELECT * FROM EMPLOYEE WHERE id='$id'";
    $res = oci_parse($connect, $sql);
    oci_execute($res);

    if ($num > 0) {
        $row = oci_fetch_assoc($res);
        $OLD_DESIGNATION = $row['DESIGNATION'];
    }
    else {
        $_SESSION['employee'] = "<span class='error'> Employee is not found </span>";
        header("location:manage_employee.php");
    }
}

?>

<link rel="stylesheet" href="../admin.css">
<title> Update Employee</title>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Employee</h1>

        <br><br>

        <form action="" method="POST">

            <table class="tbl-40">
                <tr>
                    <td> OLD_DESIGNATION: </td>
                    <td>
                        <input class="inputs" type="text" value="<?php echo$OLD_DESIGNATION ?>">
                    </td>
                </tr>

                <tr>
                    <td>NEW_DESIGNATION:</td>
                    <td>
                        <input class="inputs" type="text" name="newDESIGNATION">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input class="inputs" type="hidden" name="hidden" value="<?php echo $id ?>">
                        <input class="inputs" type="submit" name="submit" value="Update Employee" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['hidden'];
    $New_DESIGNATION = $_POST['newDESIGNATION'];


    $sqll = "UPDATE EMPLOYEE SET DESIGNATION='$New_DESIGNATION' WHERE id='$id'";
    $ress = oci_parse($connect, $sqll);
    oci_execute($ress);

    if ($ress) {
        $_SESSION['employee'] = "<span class = 'success'> Employee is updated </span>";
        header("location:manage_employee.php");
    } else {
        $_SESSION['employee'] = "<span class = 'error'> Employee is not updated </span>";
        header("location:manage_employee.php");
    }
}
include "partials/footer.php"
?>

