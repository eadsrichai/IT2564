<?php
    include "../connectdb.php";
    $id=$_GET['m_id'];
    $sql="UPDATE member set m_status='2' where m_id='$id'";
    $re=mysqli_query($con,$sql);
    echo "<meta http-equiv='refresh' content='0;url=a_main2.php'>";
?>