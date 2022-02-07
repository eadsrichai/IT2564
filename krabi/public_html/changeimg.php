<?php
session_start();
include "connectdb.php";
$id=$_SESSION['sid'];
$img="$id.jpg";
COPY($_FILES['img']['tmp_name'],"./img_m/".$img);

$sql="UPDATE member set m_img='$img' where m_id='$id'";
mysqli_query($con,$sql);
mysqli_close($con);

echo "<meta http-equiv='refresh' content='0;URL=profile.php'>";

?>