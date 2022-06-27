<?php
include "connection_DB.php";
if (@isset($_POST['submit'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['pass']);

    $sql = "SELECT * FROM EMPLOYEE WHERE EMPLOYEE_ID ='$uname' AND PASSWORD = '$pass' AND GROUP_ID ='2'";
    $result = oci_parse($connect, $sql);
    oci_execute($result);
    if (oci_fetch_all($result,$rst) === 1) {
        header("Location: EMPDashboard.php");
    }else{
        header("Location: employeeLOGIN.php?error=Incorect User name or password");
        exit();
    }


}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel= "stylesheet" href="style.css">
    <title>Login Page</title>
    <style>
        .str1{
            background-color: #C0C0C0;
        }

        .str5{
            background-color: white;
            margin-left: 25%;
            margin-right: 25%;
            height: 420px;
        }
    </style>
</head>
<body class="str1">

<center>
    <div class="str5">
        <form class="login" action=" " method="POST">
            <h4 class="head_text">User Login</h4>
            <input class="form-control" type="text" name="uname" placeholder="Username" autocomplete="off">
            <br>
            <input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-password">
            <br>
            <input class="btn_str" type="submit" name="submit" value="Login" >
            <input  class="btn_str" type="reset" name="reset" value="reset">
        </form>
    </div>
</center>
</body>
</html>

