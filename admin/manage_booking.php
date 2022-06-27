<?php
include "../connection_DB.php";
include "partials/menu.php"
?>
    <link rel="stylesheet" href="../admin.css">
    <title>Manage Booking</title>

    <div class="main-content">
        <div class="wrapper">
            <h1 class="title">Manage Booking</h1>

            <br>
            <?php
            if (isset($_SESSION['booking'])) {
                echo $_SESSION['booking'];
                unset($_SESSION['booking']);
            }
            ?>
            <br>


            <br><br>
            <table class="tbl-full" border="1">
                <tr>
                    <th>BOOKING_ID</th>
                    <th>CUSTOMER_ID</th>
                    <th>CYLINDER_ID</th>
                    <th>STATUS</th>
                    <th>Actions</th>
                </tr>

                <?php
                $q = "select count(*) BOOKING_ID from  BOOKING";
                $re = oci_parse($connect, $q);
                oci_execute($re);
                $cylinders_num = oci_fetch_all($re , $res);
                $cylinders_num = $res['BOOKING_ID'][0]; "<br>";

                $sql = "SELECT * FROM BOOKING";
                $result = oci_parse($connect, $sql);
                oci_execute($result);

                if ($cylinders_num > 0) {
                    while ($row = oci_fetch_assoc($result)) {
                        $BOOKING_ID = $row['BOOKING_ID'];
                        $CUSTOMER_ID = $row['CUSTOMER_ID'];
                        $CYLINDER_ID = $row['SYLINDER_ID'];
                        $STATUS = $row['STATUS'];
                        ?>
                        <tr>
                            <td> <?php echo $BOOKING_ID ?></td>
                            <td> <?php echo $CUSTOMER_ID ?></td>
                            <td> <?php echo $CYLINDER_ID ?></td>
                            <td> <?php echo $STATUS ?></td>
                            <td>
                                <center>
                                    <a href="update_booking.php?id=<?php echo $BOOKING_ID ?>" class="update-btn">Update Status</a>
                                    <a href="delete_booking.php?id=<?php echo $BOOKING_ID ?>" class="delete-btn">Delete Order</a>
                                </center>
                            </td>
                        </tr>
                        <?php
                    }
                } else { ?>
                    <tr>
                        <td colspan="5">
                            <div class="error">No Order Is Added Yet!</div>
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