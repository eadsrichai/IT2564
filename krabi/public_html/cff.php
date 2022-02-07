<?php
session_start();
include "connectdb.php";
$midd=$_GET['id'];
$id=$_SESSION['sid'];
$sql="UPDATE friends set f_status='2' where f_ownerid='$midd' and f_friendid='$id' and f_status='1'";
mysqli_query($con,$sql);
$sql="INSERT into friends(f_ownerid,f_friendid,f_status)values('$id','$midd','2')";
mysqli_query($con,$sql);
$page=$_SESSION['page'];
$mid=$_GET['mid'];
if($page==1)
{
echo "<meta http-equiv='refresh' content='0;URL=main.php'>";
}elseif($page==2)
{
    echo "<meta http-equiv='refresh' content='0;URL=mainself.php'>";
}elseif($page==3)
{
    echo "<meta http-equiv='refresh' content='0;URL=mains.php?mid=$mid'>";
}elseif($page==4)
{
    echo "<meta http-equiv='refresh' content='0;URL=mainf.php?mid=$mid'>";
}else
{
    echo "<meta http-equiv='refresh' content='0;URL=all.php'>";
}
?>