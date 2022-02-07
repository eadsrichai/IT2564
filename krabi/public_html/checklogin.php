<?php
session_start();
    include "connectdb.php";
    $e=$_POST['email'];
    $p=$_POST['password'];
    $sql="SELECT * from member where m_email='$e' and m_password='$p'";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        $row=mysqli_fetch_assoc($result);
        if($row['m_status']==0){
            echo "<meta http-equiv='refresh' content='0;url=error2.php'>";
        }elseif($row['m_status']==1){
            $c=$row['m_count'];
            $c++;
            $sql="UPDATE member set m_count='$c' where m_email='$e' and m_password='$p'";
            $result=mysqli_query($con,$sql);
            $_SESSION['sid']=$row['m_id'];
            echo "<meta http-equiv='refresh' content='0;url=main.php'>";
        }else{
            echo "<meta http-equiv='refresh' content='0;url=error3.php'>";
        }
    }else{
        echo "<meta http-equiv='refresh' content='0;url=error1.php'>";
    }
?>