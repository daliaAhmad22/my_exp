<?php
include "../connection_DB.php";
include "partials/menu.php"

?>
    <link rel="stylesheet" href="../admin.css">
    <title>DASHBOARD</title>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1 class="title">DASHBOARD</h1>
        <br><br>

        <br><br>


        <div class="col-4 text-center" id = "number3">
            <h1>ADMINS</h1>
            <br />
            <?php
            $query = "select count(*) ADMIN_ID from  ADMIN";
            $result = oci_parse($connect, $query);
            oci_execute($result);
            $admin_num = oci_fetch_all($result , $res);
            echo $res['ADMIN_ID'][0], "<br>";
            ?>
        </div>

        <div class="col-4 text-center" id = "number4">
            <h1>CYLINDERS</h1>
            <br />
            <?php
            $query = "select count(*) CYLINDER_ID from  Cylinder";
            $result = oci_parse($connect, $query);
            oci_execute($result);
            $Cylinder_num = oci_fetch_all($result , $res);
            echo $res['CYLINDER_ID'][0], "<br>";
            ?>
        </div>


        <div class="col-4 text-center" id = "number1">
            <h1> EMPLOYEES</h1>
            <br />
            <?php
            $query = "select count(*) EMPLOYEE_ID from  employee";
            $result = oci_parse($connect, $query);
            oci_execute($result);
            $employees_num = oci_fetch_all($result , $res);
            echo $res['EMPLOYEE_ID'][0], "<br>";
            ?>
        </div>


        <div class="col-4 text-center" id = "number2">
            <h1>CUSTOMERS</h1>
            <br />
            <?php
            $query = "select count(*) CUSTOMER_ID from  CUSTOMER";
            $result = oci_parse($connect, $query);
            oci_execute($result);
            $employees_num = oci_fetch_all($result , $res);
            echo $res['CUSTOMER_ID'][0], "<br>";
            ?>
        </div>


    </div>
        <div class="clearfix"></div>
</div>

<!-- Main Content Setion Ends -->
<?php
include "partials/footer.php"

?>