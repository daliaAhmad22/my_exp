<?php
if(isset($_SESSION['login'])){

}else{
    $_SESSION['login_error']=" you must login first";
    header("location:".SITE_URL."admin/login.php");
}
?>

