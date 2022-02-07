<?php 
    require("conn.php");
    session_start();
    $sql="SELECT * FROM post";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if(isset($_POST) && !empty($_POST)){
        $namemember=$_POST["namemember"];
        $sql = "SELECT * FROM post WHERE namemember LIKE '%$namemember%'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
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
    <table border="2" align="center" style="width:60%" class="table font1">
        <tr class="table-dark"> <td align="center " colspan="10"><h1>รายงานข้อมูลการโพสต์</h1></td> </tr>
        <tr class="table-success"><td colspan="5" ><a href="adminform.php">ย้อนกลับ</a></td><td><a href="reportpost.php">เเสดงทั้งหมด</a></td>
        <td colspan="4">ค้นหาชื่อ<input type ="text" name="namemember" ><input type="submit" value="search"></td>
    </tr>
        <tr class="table-success"> 
            <td>รหัสโพสต์</td>
            <td>รหัสมาชิก</td>
            <td>ชื่อผู้ใช้</td>
            <td>ข้อมูลการโพสต์</td>
            <td>สถานะการโพสต์</td>
            <td>ชื่อรูปภาพ</td>
            <td>วันที่เเละเวลา</td>
            <td>โชว์รูปภาพ</td>
            <td>ลบโพสต์</td>
            <td>รายงานข้อมูลการคอมเมนต์</td>
        </tr>
        <?php foreach($result as $row) {?>
        <tr class="table-success">
            <td><?php echo $row["idpost"]; ?></td>
            <td><?php echo $row["idmember"]; ?></td>
            <td><?php echo $row["namemember"]; ?></td>
            <td><?php echo $row["post"]; ?></td>
            <td><?php echo $row["statuspost"]; ?></td>
            <td><?php echo $row["imgname"]; ?></td>
            <td><?php echo $row["today"]; ?></td>
            <td><a href="showimg.php?idpost=<?php echo $row["idpost"]; ?>">โชว์รูปภาพ</a></td>
            <td><a href="deletepost.php?idpost=<?php echo $row["idpost"]; ?>">ลบข้อมูลการโพสต์</a></td>
            <td><a href="reportcomment.php">รายงานการคอมเม้น</a></td>
</tr>
            <?php  }?>

</table>
        </form>
    
</body>
</html>