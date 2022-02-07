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
    <a href="admins.php" class="btn btn-outline-danger btn-lg mt-3 mx-3"  >Admin</a>
    <div class="container" >
        <div class="row" " >
            <div class="col text-center  " style="width: 100px;" >
                <form class="form-control mt-4 " action="chk_users.php" method="post"  style="width:600px ;margin: 0 auto; border-radius: 25px;">
                   <div><br>

                       <h1>User Login</h1>  
                    <label class="form-label"></label>
                    <input name="email" class="form-control" type="email" placeholder="Email@Adress.com" style="width: 250px; margin: 0% auto;" required>
                   </div>
                   <div>
         
                 <label class="form-label"></label>
                 <input name="passwd" class="form-control" type="password" placeholder="Password" style="width: 250px; margin: 0% auto;" required>
                <input class="btn btn-primary btn-lg mt-4" type="submit" value="Login" style="width: 250px;"> <br>
                    <a href="register.php" class="btn btn-outline-danger btn-lg mt-3" style="width: 250px;">Register</a>
                    <p class="p-1 mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad mollitia aperiam non eos tenetur reprehenderit.</p>
            </div>

                </form>





            </div>
        </div>
    </div>
</body>
</html>