<?php
    $s = "192.168.10.254";
    $u = "pattani";
    $p = ".nfqQT6L9ur*x*pV";
    $d = "pattani_it";
    $conn = mysqli_connect($s,$u,$p,$d);
    mysqli_set_charset($conn,"utf8");
    if($conn){
        echo"เชื่อมต่อระบบได้";
    }else{
        echo"เชื่อมต่อระบบไม่ได้";
    }

?>