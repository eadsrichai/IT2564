<?php
    include "../connectdb.php";
    session_start();
    $id=$_SESSION['aid'];
    $n=$_POST['name'];
    $u=$_POST['username'];
    $sql="UPDATE admin set a_name='$n', a_username='$u' where a_id='$id'";
    $re=mysqli_query($con,$sql);
    echo "<meta http-equiv='refresh' content='0;url=a_profile.php'>";
?>