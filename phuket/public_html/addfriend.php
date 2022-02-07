<?php 
    require("conn.php");
    session_start();
    $idmember=$_GET["idmember"];
    if(isset($_POST)&& !empty($_POST)){
        $idmemberadd=$_POST["idmemberadd"];
        $namememberadd=$_POST["namememberadd"];
        $addfriend="yes";
        $friendaccept="yes";
        $addidmember=$_SESSION["idmember"];
        $addnamemember=$_SESSION["namemember"];
        $sql="SELECT * FROM addfriend WHERE (idaddfriend='yes' AND friendaccept='$friendaccept')
        AND (idaddfirend='$idaddfriend')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "<script>";
            echo "alert('คุณได้เเก้ไขข้อมูลส่วนตัวเรียบร้อยแล้ว');";
            echo "window.location='postform.php';";
            echo "</script>";
        }
        else{
            echo "<script>";
            echo "alert('ไม่สามารถทำการเเก้ไขข้อมูลส่วนตัวได้');";
            echo "</script>";
        }
    }
?>