<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/js/bootstrap.min.js">
    <link rel="icon" href="../Photo/logo.png">
    <title>Hello people</title>
</head>

<body style="background-color:whitesmoke;">
    <?php
    include("../item_header/header_admin.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card p-1 mt-3" style="background-color:slategrey;">
                    <p class="h5 text-white">คอมเม้นทั้งหมด</p>
                </div>
                <div class="shadow p-3 mb-5 rounded bg-white">
                    <div class="card-body">
                        <div align="right">
                            <input type="button" class="btn btn-danger shadow" value="ลบ">
                        </div>
                        <div>
                            <img src="../Photo/14.jpg" alt="" class="rounded shadow p-1 img-fluid img-thumbnail" style="width: 60px;">
                            &nbsp;
                            <label for="">
                                <h4>Sataporn 400</h4>
                            </label>
                        </div>
                        <br>
                        <div>
                            <p class="h6">สิ่งที่แสดงความคิดเห็น</p>
                        </div>
                        <br>
                        <div class="border-bottom"></div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>

</html>