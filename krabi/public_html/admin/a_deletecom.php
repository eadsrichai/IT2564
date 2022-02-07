<?php
    include "../connectdb.php";
    $id=$_GET['c_id'];
    $pid=$_GET['p_id'];
    $sql="DELETE from comments where c_id='$id'";
    $re=mysqli_query($con,$sql);
    echo "<meta http-equiv='refresh' content='0;url=a_showpost.php?p_id=$pid'>";
?>