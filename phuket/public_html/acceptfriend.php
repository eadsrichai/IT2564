<?php 
    require("conn.php");
    session_start();
    $idaddfriend=$_GET["idaddfriend"];
    if(isset($_POST)&& !empty($_POST)){
        $idmemberadd=$_POST["idmemberadd"];
        $namememberadd=$_POST["namememberadd"];
        $addfriend="yes";
        $friendaccept="yes";
        $addidmember=$_SESSION["addidmember"];
        $addnamemember=$_SESSION["addnamemember"];
        $sql="UPDATE addfriend SET idaddfriend='$idaddfriend',idmemberadd='$idmemberadd',namememberadd='$namememberadd',
        addfriend='$addfriend',friendaccept='$friendaccept',addidmember='$addidmember',addnamemember='$addnamemember'";
        $result=mysqli_query($conn,$sql);
        
    }

?>