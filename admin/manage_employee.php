<?php
include "../connection_DB.php";
include "partials/menu.php"
?>
    <link rel="stylesheet" href="../admin.css">
    <title>Manage Employee</title>

    <div class="main-content">
        <div class="wrapper">
            <h1 class="title">Manage Employee</h1>

            <br>
            <?php
            if (isset($_SESSION['employee'])) {
                echo $_SESSION['employee'];
                unset($_SESSION['employee']);
            }
            ?>
            <br>
            <!-- Button to Add Admin -->
            <a href="addEmployee.php" class="btn-primary">Add Employee</a>

            <br><br>
            <table class="tbl-full" border="1">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Empoloyee Name</th>
                    <th>Designation</th>
                    <th>Actions</th>
                </tr>
                <?php
                $q = "select count(*) EMPLOYEE_ID from  EMPLOYEE";
                $re = oci_parse($connect, $q);
                oci_execute($re);
                $employees_num = oci_fetch_all($re , $res);
                $employees_num = $res['EMPLOYEE_ID'][0]; "<br>";

                $sql = "SELECT * FROM employee";
                $result = oci_parse($connect, $sql);
                oci_execute($result);

                if ($employees_num > 0) {
                    while ($row = oci_fetch_assoc($result)) {
                        $id = $row['ID'];
                        $username = $row['EMPLOYEE_ID'];
                        $name = $row['EMPLOYEE_NAME'];
                        $Designation = $row['DESIGNATION'];
                        ?>
                        <tr>
                            <td> <?php echo $id ?></td>
                            <td> <?php echo $username ?></td>
                            <td><?php echo $name ?></td>
                            <td><?php echo $Designation ?></td>
                            <td>
                                <center>
                                <a href="update_employee.php?id=<?php echo $id ?>" class="update-btn">Update Employee</a>
                                <a href="delete_employee.php?id=<?php echo $id ?>" class="delete-btn">Delete Employee</a>
                                </center>
                            </td>
                        </tr>
                        <?php
                    }
                } else { ?>
                    <tr>
                        <td colspan="6">
                            <div class="error">No Employee Added</div>
                        </td>
                    </tr>

                    <?php
                }
                ?>
            </table>
        </div>

    </div>

<?php
include "partials/footer.php"
?>