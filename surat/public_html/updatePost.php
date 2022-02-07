<?php
include('include/head.php');
include('include/conn.php');
session_start();

if (isset($_POST['editPost'])) {

    $postId = $_POST['post_id'];

    $queryPost = $conn->query("SELECT * FROM post WHERE post_id = '" . $postId . "' ");
    $fetchPost = $queryPost->fetch_assoc();
}

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
                <div class="card">
                    <div class="card-header bg-primary text-center text-white">
                        <h5>Profile</h5>
                    </div>

                    <div class="scroll_table">
                        <!-- <div class="card mb-3"> -->
                        <div class="card-body">

                            <form action="system/updatePost.php" method="post" enctype="multipart/form-data">
                                <input type="text" name="postId" value="<?= $postId ?>" hidden>
                                <div class="text-center">
                                    <img src="image/post/<?= $fetchPost['image'] ?>" width="30%" alt="">
                                </div>
                                <div class="form-group">
                                    <input type="file" id="" name="upload" class="">
                                </div>
                                <div class="form-group">
                                    <label for="detail">Detail</label>
                                    <input type="detail" name="detail" value="<?= $fetchPost['detail'] ?>" class="form-control">
                                </div>
                                <input type="text" name="userId" value="<?= $fetchProfile['user_id'] ?>" hidden>
                                <div class="form-inline">
                                    <button class="btn btn-sm btn-primary mr-2" name="updatePost" onclick="return confirm('Are you sure to update this Post ?')">Update</button>
                            </form>
                            <form action="system/deletePost.php" method="post">
                                <input type="text" name="postId" value="<?= $postId ?>" hidden>
                                <button class="btn btn-sm btn-danger" name="deletePost" onclick="return confirm('Are you sure to Delete this Post ?')">Delete</button>
                        </div>
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