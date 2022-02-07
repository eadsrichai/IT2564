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
   <br><br>
    <div class="container" >
        <div class="row" " >
            <div class="col text-center  " style="width: 100px;" >
                <form class="form-control mt-4 " action="register_db.php" method="post"  style="width:600px ;margin: 0 auto; border-radius: 25px;">
                   <div><br>

                       <h1>Register</h1>  
                       <label class="form-label"></label>
                       <input name="name" class="form-control" type="text" placeholder="Name" style="width: 250px; margin: 0% auto;" required>
                       <label class="form-label"></label>
                       <input name="lastname" class="form-control" type="text" placeholder="Lastname" style="width: 250px; margin: 0% auto;" required>
                    <label class="form-label"></label>
                    <input name="email" class="form-control" type="email" placeholder="Email@Adress.com" style="width: 250px; margin: 0% auto;" required>
                   </div>
                   <div>
         
                 <label class="form-label"></label>
                 <input name="passwd" class="form-control" type="password" placeholder="Password" style="width: 250px; margin: 0% auto;" required> <br>

            
                 <input name="confirm_passwd" class="form-control" type="password" placeholder="Confirm_Password" style="width: 250px; margin: 0% auto;" required>
                <input  name="submit" class="btn btn-primary btn-lg mt-4" type="submit" value="Register" style="width: 250px;"> <br>
                    <a href="index.php" class="btn btn-outline-success btn-lg mt-3" style="width: 250px;">Login</a>
                    <p class="p-1 mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad mollitia aperiam non eos tenetur reprehenderit.</p>
            </div>

                </form>





            </div>
        </div>
    </div>
</body>
</html>