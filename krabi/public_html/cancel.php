<?php
session_start();
include "connectdb.php";
$mid=$_GET['mid'];
$id=$_SESSION['sid'];
$sql="DELETE from friends where f_ownerid='$id' and f_friendid='$mid' and f_status='1'";
mysqli_query($con,$sql);

mysqli_close($con);

echo "<meta http-equiv='refresh' content='0;URL=send.php'>";

?>