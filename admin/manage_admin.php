<?php
include "../connection_DB.php";
include "partials/menu.php"
?>

    <title>Manage Admin</title>
    <link rel="stylesheet" href="../admin.css">
<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1 class="title">Manage Admin</h1>

        <br/>
        <?php
        if (isset($_SESSION['admin'])) {
            echo $_SESSION['admin'];
            unset($_SESSION['admin']);
        }
        ?>
        <br><br><br>

        <!-- Button to Add Admin -->
        <a href="addAdmin.php" class="btn-primary">Add Admin</a>

        <br/><br/><br/>

        <table class="tbl-full" border ="1">
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php
            $q = "select count(*) ADMIN_ID from  ADMIN";
            $re = oci_parse($connect, $q);
            oci_execute($re);
            $admin_num = oci_fetch_all($re , $res);
            $admin_num = $res['ADMIN_ID'][0]; "<br>";

            $query = "SELECT * FROM admin";
            $result = oci_parse($connect, $query);
            oci_execute($result);
            if($result){
            if( $admin_num > 0){
                while ($row = oci_fetch_assoc($result)){
                    $id = $row['ID'];
                    $full_name = $row['ADMIN_NAME'];
                    $username = $row['ADMIN_ID'];
                    ?>

            <tr>
                <td><?php echo $id?></td>
                <td><?php echo $full_name?></td>
                <td><?php echo $username?></td>
                <td>
                    <a href="update_admin.php?id=<?php echo $id?>" class="update-btn"> update </a> &nbsp;
                    <a href="delete_admin.php?id=<?php echo $id?>" class="delete-btn"> delete </a>&nbsp;
                    <a href="change_password.php?id=<?php echo $id?>" class="change-pass"> change password </a>&nbsp;
                </td>
            </tr>
<?php }} else {?>
            <tr>
                <td>
                    <p class="error"> No admin yet ! </p></td>
            </tr>
<?php }}?>
        </table>

    </div>
</div>
<!-- Main Content Setion Ends -->

<?php
include "partials/footer.php";
?>