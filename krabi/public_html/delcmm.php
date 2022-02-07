<?php
include "connectdb.php";
$cid=$_GET['mid'];
$sql="DELETE from comments where c_id='$cid'";
mysqli_query($con,$sql);
mysqli_close($con);

echo "<meta http-equiv='refresh' content='0;URL=main.php'>";

?>