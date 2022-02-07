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
    ?>
    
    <div class="container">
        
        <div class="panel panel-primary">
              <div class="panel-heading">
                    <h3 class="panel-title">ผู้ใช้งานทั้งหมด</h3>
              </div>
              <div class="panel-body">
                    <?php
                        if($n4==0){
                            ?>
                                
                                <div class="alert alert-warning">
                                   
                                    <h4>ไม่พบผู้ใช้งานอยู่ในสถานะนี้!</h4>
                                </div>
                                
                            <?php
                        }else{
                    ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ-สกุล</th>
                                    <th>อีเมล</th>
                                    <th>เบอร์โทร</th>
                                    <th>จำนวนครั้งเข้าใช้งาน</th>
                                    <th>สถานะ</th>
                                    <th>รายละเอียด</th>
                                </tr>
                            </thead>
                            <?php 
                            $n=1;
                                while($row=mysqli_fetch_assoc($result4)){
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $n++; ?></td>
                                    <td><?php echo $row['m_name']; ?></td>
                                    <td><?php echo $row['m_email']; ?></td>
                                    <td>
                                        <?php  
                                            if($row['m_mobile']=="")
                                            {
                                                echo " - ";
                                            }else{
                                                ?>
                                                <?php echo $row['m_mobile']; ?>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $row['m_count']; ?></td>
                                    <td>
                                        <font size="3">
                                        <?php 
                                        if($row['m_status']==0){
                                            ?>
                                            <span class="label label-warning">รออนุมัติ</span>
                                            <?php
                                        } elseif($row['m_status']==1){
                                            ?>
                                            <span class="label label-success">ผู็ใช้งานทั้วไป</span>
                                            <?php
                                        }else{
                                            ?>
                                            <span class="label label-danger">ยกเลิก</span>
                                            <?php
                                        }
                                        ?>
                                        </font>
                                        
                                    </td>
                                    <td><a href="a_profilemem.php?m_id=<?php echo $row['m_id']; ?>" class="btn btn-primary">
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