<?php
session_start();
$id=$_SESSION['sid'];
include "connectdb.php";
$t=$_POST['cmm'];
$d=date("Y-m-d H:i:s");
$pid=$_POST['pid'];
$mid=$_POST['mid'];
$sql="INSERT into comments(c_text,c_date,c_postid,c_memid)values('$t','$d','$pid','$id')";
mysqli_query($con,$sql);
mysqli_close($con);

echo "<meta http-equiv='refresh' content='0;URL=mains.php?mid=$mid'>";
?>