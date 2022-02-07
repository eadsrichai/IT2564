<?php 
    require("conn.php");
    session_start();
    $idpost=$_POST["idpost"];
    $idmember=$_POST["idmember"];
    $namemember=$_POST["namemember"];
    $post=$_POST["post"];
    $dir="img/";
    $filename=$dir.basename($_FILES["file"]["name"]);
    if(move_uploaded_file($_FILES["file"]["name"]),$filename){}
    $imgname="img/".$imgname;
    $newimg="img/";
    $date=$date DateTime();
    $today=(DateTime::RFC1123);
    $sql="SELECT * FROM post WHERE idpost='$idpost'";
    $result=mysqli_query($conn,$sql);
    if($require){
        echo "<script>";
        echo "alert('คุณได้โพสต์เรียบร้อยแล้ว');";
        echo "window.location='postform.php';";
        echo "</script>";
    }
    else{
        echo "<script>";
        echo "alert('ไม่สามารถทำการโพสต์ได้');";
        echo "</script>";
    }
?>