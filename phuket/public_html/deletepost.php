<?php  
    require("conn.php");
    session_start();
    $idpost = $_GET["idpost"];
    $sql="DELETE FROM post WHERE idpost='$idpost'";
    $result =  mysqli_query($conn,$sql);
        if($result){
        echo "<script>";
        echo "alert('คุณได้ทำการโพสต์');";
        echo "window.location='reportpost.php';";
        echo "</script>";
     }
     else{
        echo "<script>";
        echo "alert('คุณไม่สามารถลบโพสต์');";
        echo "</script>";
     }
    
