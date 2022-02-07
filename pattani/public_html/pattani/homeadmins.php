<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.js">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    <title>User login</title>
</head>
<body style="background-color: rgb(63, 63, 63);" >
<!-- Nav tabs -->
<ul class="nav nav-tabs bg-light " id="navId">
    <li class="nav-item">
        <a href="#tab1Id" class="nav-link active">Active</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#tab2Id">Action</a>
            <a class="dropdown-item" href="#tab3Id">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#tab4Id">Action</a>
        </div>
    </li>
    <li class="nav-item">
        <a href="#tab5Id" class="nav-link">Another link</a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link disabled">Disabled</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane fade show active" id="tab1Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
</div>

<script>
    $('#navId a').click(e => {
        e.preventDefault();
        $(this).tab('show');
    });
</script>




    <div class="container" >
        <div class="row" " >
            <div class="col text-center container  " style="width: 100px;" >
                <form class="form-control mt-4 " action="chk_admin.php" method="post"  style="width:400px ;margin: 0 auto; border-radius: 25px;">
                   <div><br>

                       <h1>HI YOU'R ADMIN</h1>  
                       <p class="p-1 mt-2">ยินดีต้อนรับเข้าสู่ระบบแอดมิน...</p>
                      
                       <a href="index.php" class="btn btn-outline-danger btn-lg mt-3 mx-3"  >Logout</a>
                   
                   
            </div>

                </form>





            </div>
        </div>
    </div>
</body>
</html>