<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <?php
        include "a_head.php";
        $id=$_GET['m_id'];
        $sql="SELECT * from member where m_id='$id' ";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
    ?>
    
    <div class="container">
        
        <div class="panel panel-primary">
              <div class="panel-heading">
                    <h3 class="panel-title">Profile</h3>
              </div>
              <div class="panel-body">
                 
                 <div class="row">
                     <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                         
                         <img src="../img_m/<?php echo $row['m_img']; ?>" class="img-responsive" alt="Image">
                         
                     </div>
                     
                     <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                         <?php 
                         echo "ชื่อ : ".$row['m_name']."<br>";
                         if(empty($row['m_mobile'])){
                            echo "เบอร์โทร : ไม่มี <br>";
                         }else{
                             echo "เบอร์โทร : ".$row['m_mobile']."<br>";
                         }
                         if(empty($row['m_address'])){
                            echo "ที่อยู่ : ไม่มี <br>";
                         }else{
                            echo "ที่อยู่ : ".$row['m_address']."<br>";
                         }
                         
                         echo "อีเมล : ".$row['m_email']."<br>";
                         echo "รหัสผ่าน : ".$row['m_password']."<br>";
                         ?>
                     </div>
                     
                    
                     
                 </div>
                 
                    

              </div>
        </div>
        
    </div>
    
</body>
</html>