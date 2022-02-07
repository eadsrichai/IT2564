<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    
    <div class="panel panel-primary">
          <div class="panel-heading">
                <h3 class="panel-title">คำขอเป็นเพื่อน <a href="all.php">ดูคำขอทั้งหมด</a></h3>
          </div>
          <div class="panel-body">
                <?php
                    include "connectdb.php";
                    $sql1="SELECT * from friends where f_friendid='$id' and f_status='1' limit 5";
                    $result1=mysqli_query($con,$sql1);
                    $num1=mysqli_num_rows($result1);
                    if($num1==0){
                        ?>
                        
                        <div class="alert alert-warning">
                            
                            <strong>ไม่พบคำขอเป็นเพื่อน!</strong>
                        </div>
                   
                        <?php
                        }else{
                    
                    while($rowf=mysqli_fetch_assoc($result1)){
                        $mid=$rowf['f_ownerid'];
                        $sqlm="SELECT * from member where m_id='$mid'";
                        $resultm=mysqli_query($con,$sqlm);
                        $row1=mysqli_fetch_assoc($resultm);

                    
                ?>
                <div class="row">
                    
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        
                        <img src="img_m/<?php echo $row1['m_img']; ?>" class="img-responsive" alt="Image" width="50px">
                        
                    </div>
                    
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <?php echo $row1['m_name']; ?>
                    </div>
                    
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        
                        <div class="btn-group">
                            <a href="cff.php?id=<?php echo $row1['m_id'];?>&mid=<?php echo $page;?>" class="btn btn-default">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </a>
                            <a href="delcff.php?id=<?php echo $row1['m_id'];?>&mid=<?php echo $page;?>" class="btn btn-default">
                            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                    </a>
                            
                        </div>
                        
                    </div>
                    
                </div>
                <hr>
                <?php }}  ?>
          </div>
    </div>
    
</body>
</html>