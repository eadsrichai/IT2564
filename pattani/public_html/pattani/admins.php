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
    <a href="index.php" class="btn btn-outline-danger btn-lg mt-3 mx-3"  >User</a><br>
    <div class="container" >
        <div class="row" " >
            <div class="col text-center  " style="width: 800px;" >
                <form action="chk_admins.php" method="post" class="form-control form-check  mt-4 "   style="width:500px ;margin: 0 auto; border-radius: 25px;"><br>
                       <h1>Admin Login</h1>  <br>
                        <input name="email" class="form-control" type="email" placeholder="Email@Adress.com" style="width: 250px; margin: 0% auto;" required><br>
                     
                        <input name="passwd" class="form-control" type="password" placeholder="Password" style="width: 250px; margin: 0% auto;" required>
                    <input type="submit" class="btn btn-dark btn-lg mt-4"  value="Login" style="width: 250px;"> <br>
                    <p class="p-1 mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad mollitia aperiam non eos tenetur reprehenderit.</p> 
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>