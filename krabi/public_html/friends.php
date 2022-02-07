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
    <?php
    include "head.php";
    ?>
    <div class="container">
    <div class="panel panel-primary">
          <div class="panel-heading">
                <h3 class="panel-title">เพื่อน</h3>
          </div>
          <div class="panel-body">
                <?php
                    include "connectdb.php";
                    $sql="SELECT * from friends where f_ownerid='$id' and f_status='2'";
                    $result=mysqli_query($con,$sql);
                    $num=mysqli_num_rows($result);
                    if($num==0){
                        ?>
                        
                        <div class="alert alert-warning">
                            
                            <strong>ไม่พบคำขอเป็นเพื่อน!</strong>
                        </div>
                   <div class="row">
                        <?php
                        }else{
                    
                    while($row1=mysqli_fetch_assoc($result)){
                        $mid=$row1['f_friendid'];
                        $sqlm="SELECT * from member where m_id='$mid'";
                        $resultm=mysqli_query($con,$sqlm);
                        $row=mysqli_fetch_assoc($resultm);


                    
                ?>
                
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <p align="center">
                            <a href="mainf.php?mid=<?php echo $row['m_id'];?>">   <img src="img_m/<?php echo $row['m_img']; ?>" class="img-responsive" alt="Image" width="100%">
                        </a>
                     
                   
                        <?php echo $row['m_name']; ?><br>
                    
                    
                    
                        
                        
                          
                            <a href="delf.php?mid=<?php echo $row['m_id'];?>" class="btn btn-danger btn-block btn-sm">
                            ยกเลิกเพื่อน
                            </a>
                            </p>
                        
                        
                    </div>
                    <?php }  ?>
                </div>
                <?php } ?>
          </div>
    </div>
    
    </div>
    
    
</body>
</html>