<?php
include "../connection_DB.php";
include "partials/menu.php"
?>

<link rel="stylesheet" href="../admin.css">
<title>Add Cylinder</title>

<div class="main-content">
    <div class="wrapper">
        <h1 class = 'title'>Add Cylinder</h1>

        <br><br>

        <form action="" method="POST" >
            <table class="tbl-40">
                <tr>
                    <td>Cylinder Type:</td>
                    <td>
                        <input class="inputs" type="text" name="type" placeholder="Enter Type Of Cylinder">
                    </td>
                </tr>

                <tr>
                    <td>Cylinder Wight:</td>
                    <td>
                        <input class="inputs" type="text" name="wight" placeholder="Enter Wight Of Cylinder">
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Cylinder" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>


    </div>
</div>

<?php
if(isset($_POST['submit'])){
    $Type = $_POST['type'];
    $Wight = $_POST['wight'];

    $query = "INSERT INTO cylinder VALUES ('$Type','$Wight','','','','')";
    $result = oci_parse($connect, $query);
    oci_execute($result);

    if($result){
        $_SESSION['cylinder']="<span class='success'> Cylinder is added </span>";
        header("location:manage_cylinder.php");
    }
    else   {
        $_SESSION['cylinder']="<span class='error'> Cylinder is not added </span>";
        header("location:manage_cylinder.php");
    }
}
include "partials/footer.php";
?>

