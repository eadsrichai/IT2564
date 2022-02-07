<?php  
    require("conn.php");
    session_start();
    $idpost = $_GET["idpost"];
    $sql = "SELECT * FROM post WHERE idpost = '$idpost'";
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
        <tr class="table-dark"> <td align="center " colspan="8"><h1>โชว์รูปภาพ</h1></td> </tr>
        <tr class="table-success"><td align="center"><?php echo $row["namemember"]; ?></td></tr>
        <tr class="table-success"><td align="center"><img src="<?php echo $row["imgname"];?>"></td></tr>
        <tr class="table-success"><td align="center"><a href="reportpost.php">ย้อนกลับ</a></td></tr>
</table>
    
</body>
</html>