<?php
include "../connection_DB.php";
?>
    <html>
    <head>
        <title>Login - ADMIN PANEL</title>
        <link rel="stylesheet" href="../admin.css">
    </head>

<body>
<div class="login">
    <div><img src="../image_gas/login.png" width="100px"></div>
    <h1 class="text-center">ADMIN PANEL</h1>
<br>
    <?php
    if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if(isset($_SESSION['login_error'])){
        echo $_SESSION['login_error'];
        unset($_SESSION['login_error']);
    }

    ?>
    <br><br>

    <!-- Login Form Starts HEre -->
    <form action="" method="POST" class="text-center">
        Username: <br>
        <input type="text" name="username" placeholder="Username"><br><br>

        Password: <br>
        <input type="password" name="password" placeholder="Password"><br><br>

        <input type="submit" name="submit" value="Login" class="btn-login">
        <br><br>
    </form>
    <!-- Login Form Ends HEre -->

</div>

<?php
if(isset($_POST['submit'])) {
    $ADMIN_ID = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * from ADMIN WHERE ADMIN_ID = '$ADMIN_ID' and PASSWORD = '$password'";
    $result = oci_parse($connect, $query);
    oci_execute($result);
    $tmpcount = oci_fetch($result);

    if ($tmpcount > 0) {
        $_SESSION['login']=$username;
        header("location:index.php");
    }else{
        $_SESSION['login']="<span class='error'> incorrect username or password </span>";
        header("location:login.php");
    }
}

