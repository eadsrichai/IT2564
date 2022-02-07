<?php 
require("conn.php");
session_start();
$idmember=$_GET["idmember"];
$sql ="SELECT * FROM member WHERE idmember = '$idmember'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
if(isset($_POST) && !empty($_POST)){
    $pass=$_POST["pass"];
    $repass=$_POST["repass"];
    $newpass=$_POST["newpass"];
    $oldpass=$_POST["pass"];
    $user=$row["user"];
    $namemember=$row["namemember"];
    $statusmember=$row["statusmember"];
    $statususe=$row["statususe"];
    $check="SELECT * FROM member WHERE idmember='$idmember',user='$user',pass='$pass',namemember='$namemember',
    statusmember='$statusmember',statususe='$statususe' ";
    $resultcheck=mysqli_query($conn,$check);
    $num=mysqli_num_rows($resultcheck);
    if($num!=$oldpass)){
        echo "<script>";
        echo "alert('รหัสผ่านไม่ถูกต้อง');";
        echo "</script>";
    }
   else($num!=$repass){
        echo "<script>";
        echo "alert('รหัสผ่านใหม่ไม่ถูกต้อง');";
        echo "</script>";
    }
}

    $sql2="UPDATE member SET idmember='$idmember',pass='$pass'";
    $result2=mysqli_query($conn,$sql2);
    if($result){
        echo "<script>";
        echo "alert('คุณได้เปลี่ยนรหัสผ่านไปแล้ว');";
        echo "</script>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <style font="text">
    @font-face{
        font-family:title;
        font:url("fonts/Mali-BoldItalic.ttf")
    }
    .font1{
        font-family:title;
        font-size:16px;
    }
        </style>
</head>
<body>
<form action="" method="POST">
        <table border="2" align="center" style="width:40%" class="table font1">
        <tr class="table-dark">
            <td colspan="2" align="center"><h2>เปลี่ยนรหัสผ่าน</h2></td></tr>
    <tr class="table-success">
        <td>รหัสผ่านเก่า :</td>
        <td><input type="password" name="pass"></td>
    </tr>
    <tr class="table-success">
        <td>รหัสผ่านใหม่ :</td>
        <td><input type="password" name="repass"></td>
    </tr>
    <tr class="table-success">
        <td>รหัสผ่านใหม่ อีกครั้ง :</td>
        <td><input type="password" name="newpass"></td>
    </tr>
    <tr class="table-success">
        <td colspan="2"  align="center"><input type="submit" value=" เปลี่ยนรหัสผ่าน  "><br>
        <a href="postform.php">ย้อนกลับ</a></td>
    </tr>
</body>
</html>