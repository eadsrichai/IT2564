<?php 
    require("conn.php");
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <tr align="center">
            <td  colspan="2" class="table-dark"> </td></tr>
            <tr>
            <td class="table-success">
                <?php 
                    $idmember=$_GET["idmember"];
                    $sql="SELECT * FROM personal WHERE idmember='$idmember' ";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_array($result);
                    if(isset($_POST)&& !empty($_POST)){
                    $idmember=$_SESSION["idmember"];
                    $namemember=$_SESSION["namemember"];
                    ?>
                    <img src="<?php echo $row['imgprofile/']?>" width="50" higth="50">
                       
                <?php echo $row["idmember"];
                         echo $row["namemember"]; 
                    }   ?>
                    <br><br>
            <a href="editpersonal.php?idmember=<?php echo $idmember ; ?> ">แก้ไขข้อมูลส่วนตัว </a><br>
            <a href="editimg.php?idmember=<?php echo $idmember; ?> "> เปลี่ยนรูปประจำตัว </a><br>
            <a href="changpass.php?idmember=<?php echo $idmember; ?> ">เปลี่ยนรหัสผ่าน </a><br>
            <a href="logout.php?idmember=<?php echo $idmember; ?> ">ออกจากระบบ </a><br>
            </td>
            <form action="" methaod="POST" enctype="multipart/form-data">
            <td align="right" class="table-success" >
            <h2> Public Post </h2>
            <textarea name="post" value="<?php echo $row["post"]?>" rows='6' cols='60' ></textarea><br>
            <input type="file" name="file" class=""><br>
            สถานะการโพสต์<br>
            <select name="post" class="">
                <option value="0">สาธารณะ</option>
                <option value="1">เพื่อน</option>
                <option value="2">เฉพาะฉัน</option>
                <br>
                <input type="submit" value="  โพสต์  " class="btn btn-dark">
                </form>
            </td>
        </tr>
        <tr>
            <td class="table-success">
            <a href="postform.php">แสดงทั้งหมด</a><br>
            ค้นหาเพื่อน<br>
            <input type="text" name="namemember"><br>
            <?php
               $sql2="SELECT * FROM member WHERE idmember LIKE '%$idmember%'  ";
               $result2=mysqli_query($conn,$sql2);
               $row2=mysqli_fetch_array($result2);
               if(isset($_POST)&& !empty($_POST)){
                $namemember=$_SESSION["namemember"];
                $idmember=$_SESSION["idmember"];
               } ?>
            ยอมรับเพื่อน
            <?php 
            $sql3="SELECT * FROM addfriend WHERE (addfriend='yes' AND addidmember='$idmember') AND
            (idmemberadd='$idmember') ";
            $result3=mysqli_query($conn,$sql3);
            $row3=mysqli_fetch_array($result3);
            if(isset($_POST)&& !empty($_POST)){
                $addfriend=$_POST["addfriend"];
                $friendaccept=$_POST["friendaccept"];
            } 

            foreach($result3 as $row3){
                   echo $row3["namememberadd"];
               }
            ?>
            <br>
            <a href="addfriend.php?idmember=<?php echo $row3["$idmember"] ?>">ยอมรับเพื่อน</a><br>
            เพื่อน
            <?php 
            $sql4="SELECT * FROM addfriend WHERE (addfriend='yes' AND addidmember='$idmember') AND
            (idmemberadd='$idmember') ";
            $result4=mysqli_query($conn,$sql4);
            $row4=mysqli_fetch_array($result4);
            if(isset($_POST)&& !empty($_POST)){
                $addfriend=$_POST["addfriend"];
                $friendaccept=$_POST["friendaccept"];
            } 

            foreach($result3 as $row3){
                   echo $row3["namememberadd"];
               }
            ?>

</td>
            <td class="table-success"></td>
        </tr>
              
</table>
</body>
</html>