<?php
    session_start();
    if(empty($_SESSION)){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bs3/css/bootstrap.min.css">
    <script src="../bs3/jq.min.js"></script>
    <script src="../bs3/js/bootstrap.min.js"></script>
    <title>Admin FindFriends</title>
</head>
<body>
    
    <nav class="navbar navbar-default" role="navigation">
        
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="color:#4588f5">FindFriends</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            
            <ul class="nav navbar-nav navbar-right">
                <li><a href="a_logout.php">ออกจากระบบ</a></li>
                
            </ul>
        </div><!-- /.navbar-collapse -->
        </div>
        
        
    </nav>
     
    
    <div class="container">
        <?php
        include "../connectdb.php";
        $sql1="SELECT * FROM member where m_status='0' order by m_id desc";
        $result1=mysqli_query($con,$sql1);
        $n1=mysqli_num_rows($result1);
        $sql2="SELECT * FROM member where m_status='1' order by m_id desc";
        $result2=mysqli_query($con,$sql2);
        $n2=mysqli_num_rows($result2);
        $sql3="SELECT * FROM member where m_status='2' order by m_id desc";
        $result3=mysqli_query($con,$sql3);
        $n3=mysqli_num_rows($result3);
        $sql4="SELECT * FROM member order by m_id desc";
        $result4=mysqli_query($con,$sql4);
        $n4=mysqli_num_rows($result4);
        $sql5="SELECT * FROM post,member where m_id=p_memid order by p_id desc";
        $result5=mysqli_query($con,$sql5);
        $n5=mysqli_num_rows($result5);
        ?>
        <div class="row" style="margin-bottom:10px">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                
                <a class="btn btn-warning btn-block" href="a_main1.php" role="button"><h4> รออนุมัติ 
                <span class="badge"><?php echo $n1; ?></span></h4>
                </a>
                
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                
                <a class="btn btn-success btn-block" href="a_main2.php" role="button"><h4> ผู้ใช้งานทั่วไป 
                <span class="badge"><?php echo $n2; ?></span></h4>
                </a>
                
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                
                <a class="btn btn-danger btn-block" href="a_main3.php" role="button"><h4> ยกเลิก 
                <span class="badge"><?php echo $n3; ?></span></h4>
                </a>
                
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                
                <a class="btn btn-primary btn-block" href="a_main4.php" role="button"><h4> ผู้ใช้งานทั้งหมด 
                <span class="badge"><?php echo $n4; ?></span></h4>
                </a>
                
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                
                <a class="btn btn-info btn-block" href="a_main5.php" role="button"><h4> โพสต์ 
                <span class="badge"><?php echo $n5; ?></span></h4>
                </a>
                
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                
                <a class="btn btn-primary btn-block" href="a_profile.php" role="button"><h4> จัดการข้อมูล </h4>
                </a>
                
            </div>
        </div>
        
    </div>
    


</body>
</html>
<?php } ?>