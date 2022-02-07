<?php
    include "../connectdb.php";
    session_start();
    $id=$_SESSION['aid'];
    $p=$_POST['password'];
    $sql="UPDATE admin set a_password='$p' where a_id='$id'";
    $re=mysqli_query($con,$sql);
    echo "<meta http-equiv='refresh' content='0;url=a_profile.php'>";
?>