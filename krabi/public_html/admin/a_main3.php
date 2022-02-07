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
        
        <div class="panel panel-danger">
              <div class="panel-heading">
                    <h3 class="panel-title">ยกเลิก</h3>
              </div>
              <div class="panel-body">
                    <?php
                        if($n3==0){
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
                                    <th>อีเมล์</th>
                                    <th>เบอร์โทร</th>
                                    <th>คืนค่าการใช้งาน</th>
                                </tr>
                            </thead>
                            <?php 
                            $n=1;
                                while($row=mysqli_fetch_assoc($result3)){
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
                                    <td>
                                    <a class="btn btn-warning" href="a_changstatus3.php?m_id=<?php echo $row['m_id']; ?>" role="button">คืนค่าการใช้งาน</a>
                                    </td>
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