<?php
session_start();
    include "../connectdb.php";
    $u=$_POST['username'];
    $p=$_POST['password'];
    $sql="SELECT * from admin where a_username='$u' and a_password='$p'";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        $row=mysqli_fetch_assoc($result);
            $_SESSION['aid']=$row['a_id'];
            echo "<meta http-equiv='refresh' content='0;url=a_main1.php'>";
      
    }else{
        echo "<meta http-equiv='refresh' content='0;url=error1.php'>";
    }
?>