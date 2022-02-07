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
        $status=array("","สาธารณะ","เพื่อน","ส่วนตัว");
        $id=$_GET['p_id'];
        $sql="SELECT * from member,post where m_id=p_memid and p_id='$id' ";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
    ?>
    
    <div class="container">
        
        <div class="panel panel-primary">
              <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $row['m_name']."<br>".$row['p_date']." : ".$status[$row['p_status']]; ?></h3>
              </div>
              <div class="panel-body">
                  <h4><?php echo $row['p_text']; ?><a href="a_deletepost.php?p_id=<?php echo $id?>" style="color:red;">
                   <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                   </a></h4>
                   <hr>
                   
                   <!-- SHOW IMG -->
                <?php
                
                $e=explode(",",$row['p_img']);
                $c=$row['p_count'];
                for($a=0;$a<$c;$a++)
                {
                    if($c==1)
                    {
                        ?>

                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <br>
                            <?php
                            if(strchr($e[$a],".")==".mp4")
                            {
                                ?>
                                <video controls style="width:100%;height: auto;">
                                    <source src="../file_post/<?php echo $e[$a];?>" type="video/mp4">
                                </video>
                                <?php
                            }else
                            {
                                ?>
                
                <img src="../file_post/<?php echo $e[$a];?>" class="img-responsive" alt="Image" style="width:100%;height: auto;">
                
                                <?php
                                
                            }
                            ?>
                        </div>
                        

                        <?php
                    }else
                    {
                    ?>

                        
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <br>
                            <?php
                            if(strchr($e[$a],".")==".mp4")
                            {
                                ?>
                                <video controls style="width:100%;height: auto;">
                                    <source src="../file_post/<?php echo $e[$a];?>" type="video/mp4">
                                </video>
                                <?php
                            }else
                            {

                                ?>
                
                <img src="../file_post/<?php echo $e[$a];?>" class="img-responsive" alt="Image" style="width:100%;height: auto;">
                
                                <?php
                            }
                            ?>
                        </div>
                        

                    <?php
                    }
                }
                ?>
                    

                   <!--END SHOW IMG -->
                   
<?php  

$sql1="SELECT * from comments where c_postid='$id' ";
$result1=mysqli_query($con,$sql1);
$numc=mysqli_num_rows($result1);
echo "ความคิดเห็น ";
while($rowc=mysqli_fetch_assoc($result1)){

    
      $cid=$rowc['c_memid'];
    
    $sql="SELECT * from member where m_id='$cid'";
    $result=mysqli_query($con,$sql);
    $rowc1=mysqli_fetch_assoc($result);
    ?>
     <hr>
     <div class="media">
        <div class="media-body">
            <h5 class="media-heading"><b><?php echo $rowc1['m_name']." ".$rowc['c_date']; ?>
            <a href="a_deletecom.php?c_id=<?php echo $rowc['c_id'];?>&p_id=<?php echo $id ?>" style="color:red;">
                   <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                   </a></b></h5>
            <h5 class="media-heading"><?php echo  $rowc['c_text']; ?></h5>
        </div>
    </div>
    
    <?php

}
?>
                    

              </div>
        </div>
        
    </div>
    
</body>
</html>