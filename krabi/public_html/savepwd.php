<?php
session_start();
include "connectdb.php";
$id=$_SESSION['sid'];
$pwd=$_POST['pwd'];
$sql="UPDATE member set m_password='$pwd' where m_id='$id'";
mysqli_query($con,$sql);
mysqli_close($con);

echo "<meta http-equiv='refresh' content='0;URL=profile.php'>";

?>