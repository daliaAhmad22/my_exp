<?php
include "../connection_DB.php";
include "partials/menu.php"
?>
    <link rel="stylesheet" href="../admin.css">
    <title>Manage Cylinder</title>

    <div class="main-content">
        <div class="wrapper">
            <h1 class="title">Manage Cylinder</h1>

            <br>
            <?php
            if (isset($_SESSION['cylinder'])) {
                echo $_SESSION['cylinder'];
                unset($_SESSION['cylinder']);
            }
            ?>
            <br>

            <a href="addCylinder.php" class="btn-primary">Add Cylinder</a>

            <br><br>
            <table class="tbl-full" border="1">
                <tr>
                    <th>Cylinder_id</th>
                    <th>Amount</th>
                    <th>Actions</th>
                </tr>

                <?php
                $q = "select count(*) CYLINDER_ID from  CYLINDER";
                $re = oci_parse($connect, $q);
                oci_execute($re);
                $cylinders_num = oci_fetch_all($re , $res);
                $cylinders_num = $res['CYLINDER_ID'][0]; "<br>";

                $sql = "SELECT * FROM CYLINDER";
                $result = oci_parse($connect, $sql);
                oci_execute($result);

                if ($cylinders_num > 0) {
                    while ($row = oci_fetch_assoc($result)) {
                        $id = $row['CYLINDER_ID'];
                        $amount = $row['AMOUNT'];
                        ?>
                        <tr>
                            <td> <?php echo $id ?></td>
                            <td> <?php echo $amount ?></td>
                            <td>
                                <center>
                                    <a href="update_cylinder.php?id=<?php echo $id ?>" class="update-btn">Update Cylinder</a>
                                    <a href="delete_cylinder.php?id=<?php echo $id ?>" class="delete-btn">Delete Cylinder</a>
                                </center>
                            </td>
                        </tr>
                        <?php
                    }
                } else { ?>
                    <tr>
                        <td colspan="5">
                            <div class="error">No Cylinder Added</div>
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