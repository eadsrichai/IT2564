<?php 
    require("conn.php");
    session_start();
    $sql="SELECT * FROM comment ";
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
<form action="" method="POST">

    <table border="2" align="center" style="width:60%" class="table font1">
    <tr class="table-dark"> <td align="center " colspan="6"><h1>รายงานข้อมูลการคอมเมนต์</h1></td> </tr>
        <tr class="table-success"><td colspan="6"><a href="reportpost.php">ย้อนกลับ</a></td></tr>

    </tr>
        <tr class="table-success"> 
            <td>รหัสคอมเม้น</td>
            <td>รหัสมาชิก</td>
            <td>รหัสโพสต์</td>
            <td>ชื่อผู้ใช้</td>
            <td>ข้อมูลการคอมเม้น</td>
            <td>ลบข้อมูลการคอมเม้น</td>
        </tr>
        <?php foreach($result as $row) {?>
        <tr class="table-success">
            <td><?php echo $row["idcomment"]; ?></td>
            <td><?php echo $row["idmember"]; ?></td>
            <td><?php echo $row["idpost"]; ?></td>
            <td><?php echo $row["namemember"]; ?></td>
            <td><?php echo $row["comment"]; ?></td>

            <td><a href="deletecomment.php?idcomment=<?php echo $row["idcomment"]; ?>">ลบข้อมูลการคอมเม้น</td>

</tr>
            <?php  }?>

</table>
        </form>
    
</body>
</html>