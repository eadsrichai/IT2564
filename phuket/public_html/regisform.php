<?php 
    require("conn.php");
    session_start();
    if(isset($_POST)&& !empty($_POST)){
        $user=$_POST["user"];
        $pass=$_POST["pass"];
        $statusmember="1";
        $statususe="yes";
        $sql="SELECT * FROM member WHERE user='$user'AND pass='$pass'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "<select>";
            echo "alert ('คุณได้สมัครสมาชิกเรียบร้อยแล้ว');";
            echo "window.location='regisform.php' ";
            echo "</select>";
        }
        else {
            echo "<select>";
            echo "alert ('ไม่สามารถสมัครสมาชิกได้');";
            echo "window.location='regisform.php' ";
            echo "</select>";
        }
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
    <table border="2" align="center" style="width:60%" class="table font1">
        <tr class="table-dark" align="center">
            <td colspan="2">
                <h2>ลงทะเบียน</h2></td>
</tr>
         
        <tr align="center" class="table-success">
            <form action="" method="POST">
            <td>ชื่อ :</td> 
            <td>     <input type="text" name="user"></td></tr>
        <tr align="center" class="table-success">
        <td>    username : </td> 
        <td>     <input type="text" name="namemember"></td>
</tr>
        <tr  align="center" class="table-success">
        <td>
        รหัสผ่าน :</td>
        <td>    <input type="password" name="pass"></td>
</tr>
        <tr align="center" class="table-success">
        <td colspan="2"> <input type="submit" value="  ลงทะเบียน  "><br>
        <a href="welcome.php">ย้อนกลับ</a>
    </td>
</form>
</tr>

</table>
</body>
</html>