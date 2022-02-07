<?php
include "connectdb.php";
$pid=$_POST['pid'];
$sql="SELECT * from post where p_id='$pid'";
$re=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($re);
$n=$row['p_love']+1;
$sqlp="UPDATE post set p_love='$n' where p_id='$pid'";
mysqli_query($con,$sqlp);
mysqli_close($con);

echo "<meta http-equiv='refresh' content='0;URL=main.php'>";

?>
