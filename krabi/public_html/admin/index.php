<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bs3/css/bootstrap.min.css">
    <script src="../bs3/jq.min.js"></script>
    <script src="../bs3/js/bootstrap.min.js"></script>
    <title>Admin FindFriends</title>
    <style>
        body,html{
            height: 100%;
            margin: 0;
        }
        .bg{
            background-image: url("../bg.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .container{
            position: absolute;
            margin-top: 11%;
            margin-left: 36%;
            max-width: 350px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 10px 15px 18px #888888;
        }
    </style>
</head>
<body class="bg">
    
    <form action="a_checklogin.php" method="POST" class="container" role="form">
            
                <h1 style="color:#4588f5">Admin FindFriends</h1>
           
    
            
            <div class="form-group">
                
                    <input type="text" name="username" id="input" class="form-control" value="" placeholder="ชื่อผู้ใช้">
                
            </div>
            <div class="form-group">
                
                    <input type="password" name="password" id="input" class="form-control" value="" placeholder="รหัสผ่าน">
                
            </div>
            
    
            <div class="form-group">
                
                    <button type="submit" class="btn btn-primary btn-block ">เข้าสู่ระบบ</button>
                
            </div>
            
    </form>
    
</body>
</html>