<?php  
    require("conn.php");
    session_start();
    $idmember = $_GET["idmember"];
    $sql = "SELECT * FROM member WHERE idmember = '$idmember'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
        if(isset($_POST) && !empty($_POST)){
        $sql1="DELETE FROM member WHERE idmember='$idmember'";
        $result1 =  mysqli_query($conn,$sql1);
        if($result1){
        echo "<script>";
        echo "alert('คุณได้ทำกาลบสมาชิก');";
        echo "window.location='adminform.php';";
        echo "</script>";
     }
     else{
        echo "<script>";
        echo "alert('คุณไม่สามารถลบสมาชิก');";
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
    <tr class="table-dark"> <td align="center " colspan="2"><h3>เเก้ไขข้อมูล/เปลียนรหัสผ่าน/การอนุมัติเเละยกเลิกการใช้งาน</h3></td> </tr>
    <tr class="table-success">
        <td>รหัสสมาชิก :</td>
        <td><input type="text" name="idmember" readonly value="<?php echo $row["idmember"]; ?>"></td>
    </tr>
    <tr class="table-success">
        <td>ชื่อผู้ใช้ :</td>
        <td><input type="text" name="user"  readonly value="<?php echo $row["user"]; ?>"></td>
    </tr>
    <tr class="table-success">
        <td>รหัสผ่าน :</td>
        <td><input type="text" name="pass" readonly value="<?php echo $row["pass"]; ?>"></td>
    </tr>
    <tr class="table-success">
        <td>ชื่อสมาชิก :</td>
        <td><input type="text" name="namemember" readonly value="<?php echo $row["namemember"]; ?>"></td>
    </tr>
    <tr class="table-success">
        <td>สถานะการใช้งาน :</td>
        <td><select name="statususe" > <option value="yes">yes</option><option value="no">no</option></select></td>
    </tr>
    <tr  class="table-success"><td align="center" colspan="2"> <input type="submit" value="Delete" > <br><a href="adminform.php" >ยกเลิก</a></td>
    </tr>
</table>
</form>
    
</body>
</html>