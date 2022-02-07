<?php
    include "../connectdb.php";
    $id=$_GET['p_id'];
    $sql="DELETE from post where p_id='$id'";
    $re=mysqli_query($con,$sql);
    $sql="DELETE from comments where c_postid='$id'";
    $re=mysqli_query($con,$sql);
    echo "<meta http-equiv='refresh' content='0;url=a_main5.php'>";
?>