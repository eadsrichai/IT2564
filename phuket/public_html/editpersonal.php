<?php 
    require("conn.php");
    session_start();
    $idmember=$_GET["idmember"];
    $sql ="SELECT * FROM member WHERE idmember = '$idmember'";
    $result=mysqli_query($conn,$sql);
    if(isset($_POST) && !empty($_POST)){
        $idmember = $_POST["idmember"];
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        $namemember = $_POST["namemember"];
        $statusmember = "1";
        $statususe = $_POST["statususe"];
        

        $sql1="UPDATE member SET idmember='$idmember',user='$user',pass='$pass',namemember='$namemember',
        statusmember='$statusmember',statususe='$statususe' WHERE idmember='$idmember'";
        $result1 =  mysqli_query($conn,$sql1);
        if($result1){
            echo "<script>";
            echo "alert('คุณได้เเก้ไขข้อมูลส่วนตัวเรียบร้อยแล้ว');";
            echo "window.location='postform.php';";
            echo "</script>";
        }
        else{
            echo "<script>";
            echo "alert('ไม่สามารถทำการเเก้ไขข้อมูลส่วนตัวได้');";
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
        <form action="" method="POST">
        <table border="2" align="center" style="width:40%" class="table font1">
        <tr class="table-dark">
            <td colspan="2" align="center"><h2>แก้ไขข้อมูลส่วนตัว</h2></td></tr>
    <tr class="table-success">
        <td>ชื่อ :</td>
        <td><input type="text"  value="<?php echo $row["user"]; ?>"></td>
    </tr>
    <tr class="table-success">
        <td>รหัสผ่าน :</td>
        <td><input type="text"  value="<?php echo $row["pass"]; ?>"></td>
    </tr>
    <tr class="table-success">
        <td>รูปประจำตัว :</td>
        <td><input type="file"  value="<?php echo $row["file"]; ?>"></td>
    </tr>
    <tr class="table-success">
        <td colspan="2"  align="center"><input type="submit" value=" แก้ไขข้อมูลส่วนตัว "><br>
        <a href="postform.php">ย้อนกลับ</a></td>
    </tr>
</table>
    </body>
    </html>
    