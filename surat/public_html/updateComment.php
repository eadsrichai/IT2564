<?php
include('include/head.php');
include('include/conn.php');
session_start();

if (isset($_POST['editComment'])) {

    $commentId = $_POST['comment_id'];

    $queryComment = $conn->query("SELECT * FROM comment WHERE comment_id = '" . $commentId . "' ");
    $fetchComment = $queryComment->fetch_assoc();
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

                            <form action="system/updateComment.php" method="post">
                                <input type="text" name="commentId" value="<?= $commentId ?>" hidden>
                                <div class="form-group">
                                    <label for="detail">Detail</label>
                                    <input type="detail" name="detail" value="<?= $fetchComment['detail'] ?>" class="form-control">
                                </div>
                                <input type="text" name="userId" value="<?= $fetchProfile['user_id'] ?>" hidden>
                                <div class="form-inline">
                                    <button class="btn btn-sm btn-primary mr-2" name="updateComment" onclick="return confirm('Are you sure to update this Comment ?')">Update</button>
                            </form>
                            <form action="system/deleteComment.php" method="post">
                                <input type="text" name="commentId" value="<?= $commentId ?>" hidden>
                                <button class="btn btn-sm btn-danger" name="deleteComment" onclick="return confirm('Are you sure to Delete this Comment ?')">Delete</button>
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