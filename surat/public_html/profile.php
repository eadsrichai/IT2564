<?php
include('include/head.php');
include('include/conn.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('include/sidebar.php') ?>
            <div class="col-sm-9">
                <?php
                if (isset($_SESSION['updateUserSuccess'])) {
                    unset($_SESSION['updateUserSuccess']);
                ?>
                    <div class="alert alert-success">Update user account successfully</div>
                <?php
                }
                ?>
                <div class="card">
                    <div class="card-header bg-primary text-center text-white">
                        <h5>Profile</h5>
                    </div>

                    <div class="scroll_table">
                        <!-- <div class="card mb-3"> -->
                        <div class="card-body">
                            <form action="system/updateUser.php" method="post" enctype="multipart/form-data">
                                <input type="text" name="userId" value="<?= $fetchProfile['user_id'] ?>" hidden>
                                <input type="text" name="role" value=<?= $fetchProfile['role'] ?> hidden>
                                <div class="text-center">
                                    <img src="image/user/<?= $fetchProfile['image'] ?>" width="15%" alt="">
                                </div>
                                <div class="form-group">
                                    <input type="file" id="" name="upload" class="">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" value="<?= $fetchProfile['username'] ?>" class="form-control" hidden>
                                    <input type="text" name="username1" value="<?= $fetchProfile['username'] ?>" class="form-control" required disabled>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" value="<?= $fetchProfile['password'] ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input type="firstname" name="firstname" value="<?= $fetchProfile['firstname'] ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input type="lastname" name="lastname" value="<?= $fetchProfile['lastname'] ?>" class="form-control" required>
                                </div>
                                <input type="text" name="userId" value="<?= $fetchProfile['user_id'] ?>" hidden>
                                <button class="btn btn-primary" name="updateUser" onclick="return confirm('Are you sure to update this account ?')">Update</button>
                            </form>
                        </div>

                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>