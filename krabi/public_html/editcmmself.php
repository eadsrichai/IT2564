<?php
include "connectdb.php";
$t=$_POST['cmm'];
$cid=$_POST['cid'];
$sql="UPDATE comments set c_text='$t' where c_id='$cid'";
mysqli_query($con,$sql);
mysqli_close($con);

echo "<meta http-equiv='refresh' content='0;URL=mainself.php'>";

?>