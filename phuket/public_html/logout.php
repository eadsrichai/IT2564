<?php 
    session_start();
    unset($_SESSION["idmember"]);
    unset($_SESSION["namemember"]);
    header("location:welcome.php")
?>