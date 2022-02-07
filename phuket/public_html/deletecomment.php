<?php  
    require("conn.php");
    session_start();
    $idcomment = $_GET["idcomment"];
    $sql="DELETE FROM comment WHERE idcomment='$idcomment'";
    $result =  mysqli_query($conn,$sql);
        if($result){
        echo "<script>";
        echo "alert('คุณได้ทำการโพสต์');";
        echo "window.location='reportcomment.php';";
        echo "</script>";
     }
     else{
        echo "<script>";
        echo "alert('คุณไม่สามารถลบโพสต์');";
        echo "</script>";
     }
    
