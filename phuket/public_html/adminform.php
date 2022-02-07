<?php 
    require("conn.php");
    session_start();
    $sql="SELECT * FROM member";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

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
        <tr class="table-dark"> <td align="center " colspan="8"><h1>รายงานข้อมูลสมาชิก</h1></td> </tr>
        <tr class="table-success"><td><a href="reportpost.php">รายงานข้อมูลการโพสต์</a></td> <td colspan="7" align="right"><a href="logout.php">ออกจากระบบ</a></td></tr>
        <tr class="table-success"> 
            <td>รหัสมาชิก</td>
            <td>ชื่อสมาชิก</td>
            <td>รหัสผ่าน</td>
            <td>ชื่อผู้ใช้</td>
            <td>สถานะการใช้งาน</td>
            <td>สถานะผู้ใช้</td>
            <td>เเก้ไขข้อมูล/เปลียนรหัสผ่าน/การอนุมัติเเละยกเลิกการใช้งาน</td>
            <td>ลบข้อมูลผู้ใช้</td>
        </tr>
        <?php foreach($result as $row) {?>
        <tr class="table-success">
            <td><?php echo $row["idmember"]; ?></td>
            <td><?php echo $row["user"]; ?></td>
            <td><?php echo $row["pass"]; ?></td>
            <td><?php echo $row["namemember"]; ?></td>
            <td><?php echo $row["statususe"]; ?></td>
            <td><?php echo $row["statusmember"]; ?></td>
            <td><a href="editmember.php?idmember=<?php echo $row["idmember"]; ?>">เเก้ไขข้อมูล/เปลียนรหัสผ่าน/การอนุมัติเเละยกเลิกการใช้งาน</td>
            <td><a href="deletemember.php?idmember=<?php echo $row["idmember"]; ?>">ลบข้อมูลผู้ใช้</td>
</tr>
            <?php  }?>

</table>
    
</body>
</html>