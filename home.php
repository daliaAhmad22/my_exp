<?php
include "connection_DB.php";
?>
<html>
<style>
    #number1 {
        background: antiquewhite;
        width: 18%;
        margin-left: 18%;
    }

    #number2 {
        background: antiquewhite;
        width: 18%;
        margin-left: 20%;
    }
    .col-4{
        /*width: 40%;
        background-color: white;*/
        margin: 2%;
        padding: 7%;
        float: left;
    }
    .text-center{
        text-align: center;
    }


</style>
<body>
<center>
    <br><br><br>
    <br><br><br>
    <br><br><br>

<h1>YOU WANT TO LOGIN AS:</h1>

<b>

    <form method="post" action="employeeLOGIN.php">
        <input type="submit"  value= "EMPLOYEE" class="col-4 text-center" id = "number1">
    </form>

    <form method="post" action="login.php">
         <input type="submit"  value=" CUSTOMER" class="col-4 text-center" id = "number2">
    </form>
</b>

</center>
</body>
</html>
