<?php
session_start();
include "connectdb.php";
$id=$_SESSION['sid'];
$mid=$_GET['mid'];
$sql="INSERT into friends(f_ownerid,f_friendid,f_status)values('$id','$mid','1')";
mysqli_query($con,$sql);
mysqli_close($con);

echo "<meta http-equiv='refresh' content='0;URL=searchfriends.php'>";
?>