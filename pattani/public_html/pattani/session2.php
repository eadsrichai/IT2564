<?php
    include('config.php');
    session_start();

    if($_POST['email'] ==""){
        echo"Please Login";
        exit();
    }
    $sql = "SELECT * FROM users WHERE email='".$_POST['email']."'";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($query);
    $_SESSION['id'] = $result['id']

?>