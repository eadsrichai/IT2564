<?php
session_start();
include('include/head.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <?php
                if (isset($_SESSION['registerSuccess'])) {
                    unset($_SESSION['registerSuccess']);
                ?>
                <div class="alert alert-success">Register successfully</div>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['registerError']) || $_SESSION['errorLogin']) {
                    unset($_SESSION['registerError']);
                    unset($_SESSION['errorLogin']);
                ?>
                <div class="alert alert-danger">Something went wrong</div>
                <?php
                }
                ?>
                <div class="card">
                    <div class="card-header bg-primary text-white text-center"><b>
                            <h5>Login</h5>
                        </b></div>
                    <div class="card-body">
                        <form action="system/login.php" method="post">
                            <div class="form-group">
                                <input type="username" name="username" placeholder="Username" class="form-control mb-2" required>
                                <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
                                <div class="form-group">
                                    <button type="submit" name="login" class="btn btn-sm btn-success col-12">Login</button>
                                </div>
                                <div class="form-group">
                                    <a href="index.php?register" name="register" class="btn btn-sm btn-primary col-12">Register</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <?php
                if (isset($_GET['register'])) { ?>

                    <div class="card mt-5">
                        <div class="card-header bg-primary text-white text-center"><b>
                                <h5>Register</h5>
                            </b></div>
                        <div class="card-body">
                            <form action="system/register.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="file" name="upload" class="mb-2">
                                    <input type="username" name="username" placeholder="Username" class="form-control mb-2" required>
                                    <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
                                    <input type="firstname" name="firstname" placeholder="Firstname" class="form-control mb-2" required>
                                    <input type="lastname" name="lastname" placeholder="Lastname" class="form-control mb-2" required>
                                    <div class="form-group">
                                        <button type="submit" name="register" class="btn btn-sm btn-primary col-12">Register</button>
                                    </div>
                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-sm btn-danger col-12">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                <?php }
                ?>

            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</body>

</html>