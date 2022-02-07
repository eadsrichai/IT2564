<?php
session_start();
$_SESSION['page']=1;
$page=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<body>
    <?php include "head.php";  ?>

    
    <div class="container">
        
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <!--POST-->

    
    <div class="panel panel-primary">
          <div class="panel-heading">
                <h3 class="panel-title">โพสต์</h3>
          </div>
          <div class="panel-body" align="right">
                คุณกำลังคิดอะไรอยู่ . . .     <a class="btn btn-primary btn-sm" data-toggle="modal" href='#modal-id'>โพสต์</a>
          </div>
    </div>
    

    <!--END POST-->

    <!--SHOW POST-->

    <?php
    include "connectdb.php";
    $id=$_SESSION['sid'];
    $sqlp="SELECT * from post where p_status!='3' and (p_memid='$id' or p_memid in (SELECT f_friendid from friends inner join member on m_id=f_friendid where f_ownerid='$id' and f_status='2')) ORDER by p_id desc";
    $resultp=mysqli_query($con,$sqlp);
    
    while($rowp=mysqli_fetch_assoc($resultp)){
            $mid=$rowp['p_memid'];
            $sqlm="SELECT * from member where m_id='$mid'";
            $resultm=mysqli_query($con,$sqlm);
            $rowm=mysqli_fetch_assoc($resultm);
  
    ?>
    
    <div class="panel panel-primary">
          <div class="panel-heading">
                
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="img_m/<?php echo $rowm['m_img'];?>" alt="Image" width="45px;">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $rowm['m_name'];?></h4>
                        <p><?php echo $rowp['p_date'];?> : <?php
                        if($rowp['p_status']==1)
                        {
                            echo "สาธารณะ";
                        }elseif($rowp['p_status']==2)
                        {
                            echo "เพื่อน";
                        }else
                        {
                            echo "ส่วนตัว";
                        }
                        
                        ?><p>
                    </div>
                </div>
                
          </div>
          <div class="panel-body">
                <p><?php echo $rowp['p_text'];?></p>
                <!-- SHOW IMG -->
                <?php
                
                $e=explode(",",$rowp['p_img']);
                $c=$rowp['p_count'];
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
                                    <source src="file_post/<?php echo $e[$a];?>" type="video/mp4">
                                </video>
                                <?php
                            }else
                            {
                                ?>
                
                <img src="file_post/<?php echo $e[$a];?>" class="img-responsive" alt="Image" style="width:100%;height: auto;">
                
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
                                    <source src="file_post/<?php echo $e[$a];?>" type="video/mp4">
                                </video>
                                <?php
                            }else
                            {
                                ?>
                
                <img src="file_post/<?php echo $e[$a];?>" class="img-responsive" alt="Image" style="width:100%;height: auto;">
                
                                <?php
                            }
                            ?>
                        </div>
                        

                    <?php
                    }
                }
                ?>
                    

                   <!--END SHOW IMG -->
          </div>
          <!-- LOVE -->
                    <hr>
                    
                    <form action="savelove.php" method="POST" class="form-horizontal" role="form">
                         
                    
                            
                    
                            <div class="form-group" style="margin-left:10px;">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-heart" aria-hidden="true"><?php echo " ".$rowp['p_love'];?></span>
                                    </button>
                                    <input type="hidden" name="pid" value="<?php echo $rowp['p_id'];?>">
                                </div>
                            </div>
                    </form>
                    
          <!--END LOVE -->




          <!-- CMM -->

                    
                    <form action="savecmm.php" method="POST" class="form-inline" role="form" align="right" style="margin-right:20px;">
                    
                        <div class="form-group">
                            <label class="sr-only" for="">label</label>
                            <input type="text" name="cmm" class="form-control" id="" placeholder="แสดงความคิดเห็น">
                        </div>
                    
                        <input type="hidden" name="pid" value="<?php echo $rowp['p_id'];?>">
                    
                        <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                        </button>
                    </form>
                    
<hr>    
          <!-- END CMM -->
          

          <!-- SHOW CMM -->
                <?php
                $pid=$rowp['p_id'];
                $sqlc="SELECT * from comments,member where m_id=c_memid and c_postid='$pid'";
                $resultc=mysqli_query($con,$sqlc);
                while($rowc=mysqli_fetch_assoc($resultc))
                {
                    ?>
                        
                        <div class="media" style="margin-left:10px;">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="img_m/<?php echo $rowc['m_img'];?>" alt="Image" width="45px;">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $rowc['m_name'];?>
                            
                                <?php
                                
                                if($rowc['m_id']==$_SESSION['sid']){
                                ?>
                                <a href="delcmm.php?mid=<?php echo $rowc['c_id'];?>">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a>
                                <a data-toggle="collapse" data-target="#demo<?php echo $rowc['c_id'];?>">
                                    
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    
                                </a>
                                            <?php } ?>
                                <!--COLLAPSE-->

                                <div class="collapse" id="demo<?php echo $rowc['c_id'];?>">
                                
                                <form action="editcmm.php" method="POST" class="form-inline" role="form">
                                
                                    <div class="form-group">
                                        <label class="sr-only" for="">label</label>
                                        <input type="text" name="cmm" value="<?php echo $rowc['c_text'];?>" class="form-control" id="" placeholder="แก้ไขความคิดเห็น">
                                    </div>
                                <input type="hidden" name="cid" value="<?php echo $rowc['c_id'];?>">
                                    
                                
                                    <button type="submit" class="btn btn-primary">แก้ไข</button>
                                </form>
                                
                                </div>

                                <!--ENDCOLLAPSE-->
                                </h4>
                                <p><?php echo $rowc['c_text'];?><p>
                            </div>
                        </div>
                        
                    <?php
                }
                ?>

           <!-- END  SHOW CMM -->
    </div>
    
        <?php } ?>
    <!--END SHOW POST-->
        </div>
        
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?php
            include "accfriends.php";
            ?>
        </div>
        
        
    </div>
    <!-- MODAL -->
    

    <div class="modal fade" id="modal-id">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">โพสต์</h4>
                </div>
                <div class="modal-body">
                    
                    <form action="savepost.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                        
                        <input type="text" name="tpost" id="inputtpost" class="form-control" value="" required="required"> 
                        <br>
                        <input type="file" name="img[]" id="" multiple>
                        <hr>
                        
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" id="inputstatus" value="1" checked="checked">
                                สาธารณะ
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" id="inputstatus" value="2">
                                เพื่อน
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" id="inputstatus" value="3">
                                ส่วนตัว
                            </label>
                        </div>
                        
                        <hr>
                            
                    
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-sm">โพสต์</button>
                                </div>
                            </div>
                    </form>
                    
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    
    <!-- END MODAL -->
</body>
</html>