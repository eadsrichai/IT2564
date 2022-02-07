<?php
session_start();
include('include/conn.php');
include('include/head.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed</title>
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <?php
            include('include/sidebar.php');
            ?>
            <div class="col-sm-9">
                <?php
                if (isset($_SESSION['addPostSuccess'])) {
                    unset($_SESSION['addPostSuccess']);
                ?>
                    <div class="alert alert-success">Post successfully</div>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['deletePostSuccess'])) {
                    unset($_SESSION['deletePostSuccess']);
                ?>
                    <div class="alert alert-success">Delete post successfully</div>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['deleteCommentSuccess'])) {
                    unset($_SESSION['deleteCommentSuccess']);
                ?>
                    <div class="alert alert-success">Delete comment successfully</div>
                <?php
                }
                ?>
                <div class="card-body text-center shadow-lg">
                    <form action="system/addPost.php" method="post" enctype="multipart/form-data">
                        <div class="form-inline">
                            <input type="file" name="upload">
                            <input type="detail" name="detail" class="form-control">
                            <input type="id" name="userId" hidden value="<?= $_SESSION['userId'] ?>">
                            <button type="submit" name="addPost" class="btn btn-success ml-2">Post</button>
                        </div>
                    </form>
                </div>

                <div class="scroll_quest">
                    <?php
                    $queryPost = $conn->query("SELECT * FROM post ORDER BY post_id DESC");
                    while ($resultPost = $queryPost->fetch_assoc()) {
                        $queryFriend = $conn->query("SELECT * FROM friend WHERE user_id1 = '" . $_SESSION['userId'] . "' AND user_id2 = '" . $resultPost['user_id'] . "' ");
                        $fetchFriend = $queryFriend->fetch_assoc();
                        if (isset($fetchFriend) || $_SESSION['userId'] == $resultPost['user_id'] || $_SESSION['role'] == 1) {

                            $queryWho = $conn->query("SELECT * FROM user WHERE user_id = '" . $resultPost['user_id'] . "'");
                            $fetchWho = $queryWho->fetch_assoc();

                    ?>


                            <div class="container justify-content-center d-flex">
                                <div class="card-body shadow-lg mt-5 p-4 mb-1">

                                    <?php if ($_SESSION['userId'] == $resultPost['user_id'] || $_SESSION['role'] == 1) { ?>

                                        <div class="text-right">
                                            <form action="updatePost.php" method="post">
                                                <button type="submit" name="editPost" class="btn btn-outline-primary btn-sm">Edit</button><br>
                                                <input type="id" name="post_id" value="<?= $resultPost['post_id'] ?>" hidden>
                                            </form>
                                        </div>

                                    <?php } ?>

                                    <img src="image/user/<?= $fetchWho['image'] ?>" alt="" width="30px"> &nbsp; <a><b><?= $fetchWho['firstname'] . ' &nbsp; ' . $fetchWho['lastname'] ?></b></a>
                                    <p style="font-size: 10px" class=""><?= $resultPost['date'] ?></p>
                                    <p><?= $resultPost['detail'] ?></p>
                                    <center><img src="image/post/<?= $resultPost['image'] ?>" alt="" width="50%"></center>

                                    <hr>
                                    <h5><b>Comment</b></h5>
                                    <form action="system/addComment.php" method="post">
                                        <div class="form-inline">
                                            <input type="detail" name="detail" class="form-control mr-1 mb-1" placeholder="Comment Here" required>
                                            <input type="userId" name="userId" hidden value="<?= $_SESSION['userId'] ?>">
                                            <input type="postId" name="postId" hidden value="<?= $resultPost['post_id'] ?>">
                                            <button type="submit" name="addComment" class="btn btn-success mb-1">Comment</button>
                                        </div>
                                    </form>

                                    <?php
                                    $queryComment = $conn->query("SELECT * FROM comment ORDER BY comment_id DESC");

                                    while ($fetchComment = $queryComment->fetch_assoc()) {

                                        if ($fetchComment['post_id'] == $resultPost['post_id']) {

                                            $queryWhoComment = $conn->query("SELECT * FROM user WHERE user_id = '" . $fetchComment['user_id'] . "' ");
                                            $fetchWhoComment = $queryWhoComment->fetch_assoc();

                                    ?>
                                            <div class="card-body shadow-sm mt-2 ml-3 p-4">

                                                <?php if ($_SESSION['userId'] == $fetchComment['user_id'] || $_SESSION['role'] == 1) { ?>

                                                    <div class="text-right">
                                                        <form action="updateComment.php" method="post">
                                                            <button type="submit" name="editComment" class="btn btn-outline-primary btn-sm">Edit</button><br>
                                                            <input type="id" name="comment_id" value="<?= $fetchComment['comment_id'] ?>" hidden>
                                                        </form>
                                                    </div>

                                                <?php } ?>



                                                <img src="image/user/<?= $fetchWhoComment['image'] ?>" alt="" width="30px"> &nbsp; <a><b><?= $fetchWhoComment['firstname'] . ' &nbsp; ' . $fetchWhoComment['lastname'] ?></b></a>
                                                <p style="font-size: 10px" class=""><?= $fetchComment['date'] ?></p>
                                                <p><?= $fetchComment['detail'] ?></p>
                                            </div>

                                    <?php
                                        }
                                    } ?>






                                </div>
                            </div>


                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>