<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<body>
    <?php include "head.php";?>

    
    <div class="container">
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div align="center">

            <?php
            include "connectdb.php";
            $id=$_SESSION['sid'];
            $sqlm="SELECT * from member where m_id='$id'";
            $resultm=mysqli_query($con,$sqlm);
            $rowm=mysqli_fetch_assoc($resultm);
           
            ?>
            <img src="img_m/<?php echo $rowm['m_img'];?>" class="img-responsive" alt="Image">
            <hr>
                <p align="left">
                    <label>ชื่อ : </label>
                    <?php echo $rowm['m_name'];?><br>
                    <label>เบอร์โทร : </label>
                    <?php 
                    if(empty($rowm['m_mobile']))
                    {
                        echo "ไม่มี";
                    }else
                    {
                        echo $rowm['m_mobile'];
                    }
                        ?><br>
                    <label>ที่อยู่ : </label>
                    <?php  if(empty($rowm['m_address']))
                    {
                        echo "ไม่มี";
                    }else
                    {
                        echo $rowm['m_address'];
                    }
                    ?><br>
                    <label>อีเมล์ : </label>
                    <?php echo $rowm['m_email'];?><br>
                </p>

            </div>
        </div>
        
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">แก้ไขข้อมูลส่วนตัว</a>
                    </li>
                    <li role="presentation">
                        <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">เปลี่ยนรูปโปรไฟล์</a>
                    </li>
                    <li role="presentation">
                        <a href="#tab1" aria-controls="tab" role="tab" data-toggle="tab">แก้ไขรหัสผ่าน</a>
                    </li>
                </ul>
            
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        
                        <form action="editpro.php" method="POST" class="form-horizontal" role="form">
                               <br>
                               <label>ชื่อ  : </label>
                               
                               <input type="text" name="name" id="inputname" class="form-control" value="<?php echo $rowm['m_name'];?>" required="required">
                               <br>
                               <label>เบอร์โทร  : </label>
                               
                               <input type="text" name="mobile" id="inputname" class="form-control" value="<?php echo $rowm['m_mobile'];?>" >
                               <br>
                               <label>ที่อยู่  : </label>
                               
                               <input type="text" name="address" id="inputname" class="form-control" value="<?php echo $rowm['m_address'];?>">
                               <br>
                               
                               
                        
                                
                        
                                <div class="form-group">
                                    <div class="col-sm-12 btn-sm">
                                        <button type="submit" class="btn btn-primary">อัปเดต</button>
                                    </div>
                                </div>
                        </form>
                        
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab">
                    <form action="changeimg.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                               <br>
                               <label>รูปภาพ  : </label>
                               
                               <input type="file" name="img" id="inputname" >
                               <br>
                         
                               
                               
                        
                                
                        
                                <div class="form-group">
                                    <div class="col-sm-12 btn-sm">
                                        <button type="submit" class="btn btn-primary">อัปเดต</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab1">

                     <form action="savepwd.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                               <br>
                               <label>รหัสผ่าน  : </label>
                               
                               <input type="text" name="pwd" id="inputpwd" class="form-control" >
                               <br>
                         
                               
                               
                        
                                
                        
                                <div class="form-group">
                                    <div class="col-sm-12 btn-sm">
                                        <button type="submit" class="btn btn-primary">อัปเดต</button>
                                    </div>
                                </div>
                        </form>

                    </div>
                 
                </div>
            </div>
            
        </div>
        
    </div>
    
</body>
</html>