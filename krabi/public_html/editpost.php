<?php
include "connectdb.php";
$t=$_POST['tpost'];
$pid=$_POST['pid'];
$sql="UPDATE post set p_text='$t' where p_id='$pid'";
mysqli_query($con,$sql);
mysqli_close($con);

echo "<meta http-equiv='refresh' content='0;URL=mainself.php'>";

?>