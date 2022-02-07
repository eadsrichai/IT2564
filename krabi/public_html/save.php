<?php
include "connectdb.php";
$n=$_POST['name'];
$e=$_POST['email'];
$p=$_POST['password'];
$sql="SELECT * from member where m_email='$e'";
$re=mysqli_query($con,$sql);
$num=mysqli_num_rows($re);
if($num==1)
{
    echo "<meta http-equiv='refresh' content='0;URL=error4.php'>";
}
else
{
    $sql="INSERT INTO member(m_name,m_email,m_password) VALUES ('$n','$e','$p')";
    //$sql="INSERT into member(m_name,m_email,m_password)values('$n','$e','$p')";
    mysqli_query($con,$sql);

    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}

?>