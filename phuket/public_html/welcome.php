<?php 
    require("conn.php");
    session_start();
    if(isset($_POST)&& !empty($_POST)){
    $user=$_POST["user"];
    $pass=$_POST["pass"];
    $statusmember="1";
    $statususe="yes";
    $sql="SELECT * FROM member WHERE user='$user' AND pass='$pass' ";
    $result=mysqli_query($conn,$sql); 
    if((($statusmember)==1) AND (($statususe)=="yes")){
        echo "<script>";
        echo "alert ('ยินดีต้อนรับ');";
        echo "window.location='postform.php'; ";
        echo "</script>";
    }
    elseif((($statusmember)==0) AND  (($statususe)=="yes")){
        echo "<script>";
        echo "alert ('ยินดีต้อนรับ'); ";
        echo "window.location='adminform.php'; ";
        echo "</script>";
    }
    else {
        echo "<script>";
        echo "alert ('ไม่สามารถเข้าสู่ระบบได้');";
        echo "window.location='regisform.php'; ";
        echo "</script>";
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
        <tr class="table-success">
            <form action="" method="POST">
            <td align="center"><img src="img/" align="center"  ><br>
            <h2> DEK IT </h2><br>
            ช่วยคุณเชื่อมต่อ<br>
            และแชร์กับผู้คนมากมาย <br>
            </td>
            <td align="center">
                <h2>Log In </h2>
                User name:<br>
                <input type="text" name="user"><br>
                Password :<br>
                <input type="password" name="pass"><br>
                <input type="submit" value="  ลงชื่อเข้าใช้  " class="btn btn-dark">
                <hr size="3" cols="53">
                <a href="regisform.php">สมัครสมาชิก </a>
            </td>
        </form>
        </tr>

</table>
</body>
</html>