<?php
session_start();
include "connectdb.php";
$id=$_SESSION['sid'];
$t=$_POST['tpost'];
$s=$_POST['status'];
$d=date("Y-m-d H:i:s");
$img="1.jpg";
//COPY($_FILES['img']['tmp_name'][0],"./file_post/".$img);

    

    if(empty($_FILES['img']['name'][0]))
    {
        $txt="";
        $c=0;
    }else
    {
        $txt="";
        $c=count($_FILES['img']['tmp_name']);
        for($a=0;$a<$c;$a++)
        {
            $f_name=$_FILES['img']['name'][$a];
            if(strchr($f_name,".")==".png")
            {
              

                $h=date("His");
                $img="$h$a.png";
              //  echo $img."png";
                COPY($_FILES['img']['tmp_name'][$a],"./file_post/".$img);

                $txt="$txt$img,";

            }
            elseif(strchr($f_name,".")==".mp4")
            {
                $h=date("His");
                $mp="$h$a.mp4";
                echo $mp."OK";
                COPY($_FILES['img']['tmp_name'][$a],"./mp/".$mp);

                $txt="$txt$mp,";
                
            }
            else
            {
                $h=date("His");
                $png="$h$a.jpg";
             //   echo $png."jpg";
                COPY($_FILES['img']['tmp_name'][$a],"./file_post/".$png);

                $txt="$txt$png,";
            }
            

        }
    }
  //  echo $txt;
    $sql="INSERT into post(p_text,p_img,p_count,p_date,p_status,p_memid)values('$t','$txt','$c','$d','$s','$id')";
    mysqli_query($con,$sql);
    mysqli_close($con);
    echo "<meta http-equiv='refresh' content='0;URL=main.php'>";
    ?>