<?php
if(empty($_SESSION['sid']))
{
    header("location:index.php");
}
include "connectdb.php";
$id=$_SESSION['sid'];
$sql="SELECT * from member where m_id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bs3/css/bootstrap.min.css">
    <script src="bs3/jq.min.js"></script>
    <script src="bs3/js/bootstrap.min.js"></script>
    <title>FindFriends</title>
</head>
<body>
    
    <nav class="navbar navbar-default" role="navigation" style="border-bottom:solid 2px gray;">
        <!-- Brand and toggle get grouped for better mobile display -->
        
        <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="main.php" style="color:#4588f5"> <b>FindFriends</b> </a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
           
            <ul class="nav navbar-nav navbar-right">
                <li><a href="mainself.php">
                <img src="img_m/<?php echo $row['m_img'];?>" class="img-responsive" alt="Image" width="45px;">
                </a></li>
                <li><a href="#"><?php echo $row['m_name'];?></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">การตั้งค่า <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="friends.php">เพื่อน</a></li>
                        <li><a href="searchfriends.php">ค้นหาเพื่อน</a></li>
                        <li><a href="send.php">การส่งคำขอเพิ้อน</a></li>
                        <li><a href="profile.php">แก้ไขโปรไฟล์</a></li>
                        <li><a href="logout.php">ออกจากระบบ</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
        </div>
        
        
    </nav>
    
</body>
</html>