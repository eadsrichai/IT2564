<?php
session_start();
$id=$_SESSION['sid'];
;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <?php
    include "head.php";
    ?>
    <div class="container">
    <div class="panel panel-default">
          <div class="panel-heading">
                <h3 class="panel-title">
                <form action="" method="POST" class="form-inline" role="form" align="right">
                
                    <div class="form-group">
                        <label class="sr-only" for="">label</label>
                        <input type="text" name="search" class="form-control" id="" placeholder="ค้นหาเพื่อน">
                    </div>
                
                    
                
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </form>
                </h3>
          </div>
          <div class="panel-body">
                <?php
                    include "connectdb.php";
                    if(empty($_POST['search']))
                        $s="";
                    else
                        $s=$_POST['search'];
                    
                    $sql="SELECT * from member where m_name like '%$s%' and m_id!='$id'";
                    $result=mysqli_query($con,$sql);
                    $num=mysqli_num_rows($result);
                    if($num==0){
                        ?>
                        
                        <div class="alert alert-warning">
                            
                            <strong>ไม่พบผู้ใช้งานชื่อ " <?php echo $s; ?> "!</strong>
                        </div>
                   <div class="row">
                        <?php
                        }else{
                    
                    while($row=mysqli_fetch_assoc($result)){
                        $id=$_SESSION['sid'];
                        $mid=$row['m_id'];
                        $sqlf="SELECT * from friends where f_ownerid='$id' and f_friendid='$mid' and (f_status='2' or f_status='1')";
                        $resultf=mysqli_query($con,$sqlf);
                        $numf=mysqli_num_rows($resultf);
                        
                        if($numf!=1){
                           
                            

                    
                ?>
                
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <p align="center">
                            <a href="mains.php?mid=<?php echo $row['m_id'];?>"><img src="img_m/<?php echo $row['m_img']; ?>" class="img-responsive" alt="Image" width="100%"></a>
                        
                        
                   
                        <?php echo $row['m_name']; ?><br>
                    
                    
                    
                        
                        
                          
                            <a href="addf.php?mid=<?php echo $row['m_id'];?>" class="btn btn-success btn-block btn-sm">
                            เพิ่มเพื่อน
                            </a>
                            </p>
                        
                        
                    </div>
                    <?php }
                    }
                      ?>
                </div>
                <?php } ?>
          </div>
    </div>
    </div>
    
    
    
</body>
</html>