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
        $id=$_SESSION['aid'];
        $sql="SELECT * from admin where a_id='$id' ";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
    ?>
    
    <div class="container">
        
        <div class="panel panel-primary">
              <div class="panel-heading">
                    <h3 class="panel-title">Admin Profile</h3>
              </div>
              <div class="panel-body">
                 
                 <div class="row">
                     <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                         
                         <img src="img_a/defa.jpg" class="img-responsive" alt="Image">
                         
                     </div>
                     
                     <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                         <?php 
                         echo "ชื่อ : ".$row['a_name']."<br>";
                         echo "ชื่อผู้ใช้ : ".$row['a_username']."<br>"; 
                         ?>
                     </div>
                     
                     <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                         
                         <div role="tabpanel">
                             <!-- Nav tabs -->
                             <ul class="nav nav-tabs" role="tablist">
                                 <li role="presentation" class="active">
                                     <a href="#home" aria-controls="home" role="tab" data-toggle="tab">แก้ไขข้อมูลส่วนตัว</a>
                                 </li>
                                 <li role="presentation">
                                     <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">แกไขรหัสผ่าน</a>
                                 </li>
                             </ul>
                         
                             <!-- Tab panes -->
                             <div class="tab-content">
                                 <div role="tabpanel" class="tab-pane active" id="home">
                                     
                                     <form action="a_updatepro.php" method="POST" class="form-horizontal" role="form">
                                             
                                            
                                            <div class="form-group">
                                                
                                                <div class="col-sm-12">
                                                    <input type="text" name="name" id="input" class="form-control" value="<?php echo $row['a_name']; ?>" required="required" >
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                
                                                <div class="col-sm-12">
                                                    <input type="text" name="username" id="input" class="form-control" value="<?php echo $row['a_username']; ?>" required="required" >
                                                </div>
                                            </div>
                                     
                                             <div class="form-group">
                                                 <div class="col-sm-12">
                                                     <button type="submit" class="btn btn-primary">บันทึก</button>
                                                 </div>
                                             </div>
                                     </form>
                                     
                                 </div>
                                 <div role="tabpanel" class="tab-pane" id="tab">
                                 <form action="a_updatepass.php" method="POST" class="form-horizontal" role="form">
                                             
                                            
                                             <div class="form-group">
                                                 
                                                 <div class="col-sm-12">
                                                     <input type="text" name="password" id="input" class="form-control" required="required" placeholder="New Password">
                                                 </div>
                                             </div>
                                             
                                             
                                      
                                              <div class="form-group">
                                                  <div class="col-sm-12">
                                                      <button type="submit" class="btn btn-primary">บันทึก</button>
                                                  </div>
                                              </div>
                                      </form>
                                 </div>
                             </div>
                         </div>
                         
                     </div>
                     
                 </div>
                 
                    

              </div>
        </div>
        
    </div>
    
</body>
</html>