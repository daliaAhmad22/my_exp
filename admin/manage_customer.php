<?php
include "../connection_DB.php";
include "partials/menu.php"
?>
    <link rel="stylesheet" href="../admin.css">
    <title>Manage Customer</title>

    <div class="main-content">
        <div class="wrapper">
            <h1 class="title">Manage Customer</h1>

            <br>
            <?php
            if (isset($_SESSION['customer'])) {
                echo $_SESSION['customer'];
                unset($_SESSION['customer']);
            }
            ?>
            <br>

            <a href="addCustomer.php" class="btn-primary">Add Customer</a>

            <br><br>
            <table class="tbl-full" border="1">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Customer Name</th>
                    <th>Actions</th>
                </tr>

                <?php
                $q = "select count(*) CUSTOMER_ID from  CUSTOMER";
                $re = oci_parse($connect, $q);
                oci_execute($re);
                $customers_num = oci_fetch_all($re , $res);
                $customers_num = $res['CUSTOMER_ID'][0]; "<br>";

                $sql = "SELECT * FROM CUSTOMER";
                $result = oci_parse($connect, $sql);
                oci_execute($result);

                if ($customers_num > 0) {
                    while ($row = oci_fetch_assoc($result)) {
                        $id = $row['ID'];
                        $username = $row['CUSTOMER_ID'];
                        $name = $row['CUSTOMER_NAME'];
                        ?>
                        <tr>
                            <td> <?php echo $id ?></td>
                            <td> <?php echo $username ?></td>
                            <td><?php echo $name ?></td>
                            <td>
                                <center>
                                    <a href="delete_customer.php?id=<?php echo $id ?>" class="delete-btn">Delete Customer</a>
                                </center>
                            </td>
                        </tr>
                        <?php
                    }
                } else { ?>
                    <tr>
                        <td colspan="5">
                            <div class="error">No Customer Added</div>
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