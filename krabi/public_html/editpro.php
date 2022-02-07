<?php
session_start();
include "connectdb.php";
$n=$_POST['name'];
$m=$_POST['mobile'];
$a=$_POST['address'];
$id=$_SESSION['sid'];

$sql="UPDATE member set m_name='$n',m_mobile='$m',m_address='$a' where m_id='$id'";
mysqli_query($con,$sql);
mysqli_close($con);

echo "<meta http-equiv='refresh' content='0;URL=profile.php'>";
?>

