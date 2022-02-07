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
    ?>
    
    <div class="container">
        
        <div class="panel panel-info">
              <div class="panel-heading">
                    <h3 class="panel-title">โพสต์</h3>
              </div>
              <div class="panel-body">
                    <?php
                        if($n5==0){
                            ?>
                                
                                <div class="alert alert-warning">
                                    
                                    <h4>ไม่พบผู้ใช้งานโพสต์!</h4>
                                </div>
                                
                            <?php
                        }else{
                    ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ข้อความ</th>
                                    <th>ผู้โพสต์</th>
                                    <th>วันเวลาที่โพสต์</th>
                                    <th>สถานะ</th>
                                    <th>รายละเอียด</th>
                                </tr>
                            </thead>
                            <?php 
                            $n=1;
                                while($row=mysqli_fetch_assoc($result5)){
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $n++; ?></td>
                                    <td><?php echo $row['p_text']; ?></td>
                                    <td><?php echo $row['m_name']; ?></td>
                                    <td>
                                                <?php echo $row['p_date']; ?>
                                    </td>
                                    <td><?php echo $status[$row['p_status']]; ?></td>
                                    <td>
                                    <a class="btn btn-info" href="a_showpost.php?p_id=<?php echo $row['p_id']; ?>" role="button">
                                    
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </a></td>
                                </tr>
                            </tbody>
                                    <?php } ?>
                        </table>
                    </div>
                    <?php } ?>
              </div>
        </div>
        
    </div>
    
</body>
</html>