<?php
include "connectdb.php";
$pid=$_GET['pid'];
$sql="DELETE from post where p_id='$pid'";
mysqli_query($con,$sql);
mysqli_close($con);

echo "<meta http-equiv='refresh' content='0;URL=mainself.php'>";

?>