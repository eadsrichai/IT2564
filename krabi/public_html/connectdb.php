<?php
    //$con=mysqli_connect("localhost","root","")or die("error1");
    $con=mysqli_connect("localhost","krabi","F2TOZorh1/[rT4J6")or die("error1");
    mysqli_select_db($con,"krabi_db")or die("error2");
    mysqli_query($con,"SET NAMES utf8");
    date_default_timezone_set("Asia/Bangkok");
?>