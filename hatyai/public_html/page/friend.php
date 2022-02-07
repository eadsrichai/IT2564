<?php
$sql_friend = 'SELECT * FROM account INNER JOIN (SELECT * FROM friendrelation WHERE (user_id_1 = "' . $_SESSION['user_id'] . '" or user_id_2 = "' . $_SESSION['user_id'] . '") and AreFriend = "True") AS friendrelation ON account.user_id = friendrelation.user_id_1 or account.user_id = friendrelation.user_id_2 WHERE friendrelation.user_id_1 != friendrelation.user_id_2 and account.user_id != "' . $_SESSION['user_id'] . '" GROUP BY account.user_id';
$res_friend = mysqli_query($connect, $sql_friend);

$sql_request_friend = 'SELECT * FROM account INNER JOIN (SELECT * FROM friendrelation WHERE user_id_1 = "' . $_SESSION['user_id'] . '" AND AreFriend = "False") AS friendrelation ON account.user_id = friendrelation.user_id_2 GROUP BY account.user_id';
$res_request_friend = mysqli_query($connect, $sql_request_friend);

$sql_accept_friend = 'SELECT * FROM account INNER JOIN (SELECT * FROM friendrelation WHERE user_id_2 = "' . $_SESSION['user_id'] . '" AND AreFriend = "False") AS friendrelation ON account.user_id = friendrelation.user_id_1 GROUP BY account.user_id';
$res_accept_friend = mysqli_query($connect, $sql_accept_friend);

$sql_not_friend = 'SELECT * FROM (SELECT * FROM account WHERE user_id != "' . $_SESSION['user_id'] . '") AS account LEFT JOIN (SELECT * FROM friendrelation WHERE user_id_1 = "' . $_SESSION['user_id'] . '" OR user_id_2 = "' . $_SESSION['user_id'] . '") AS friendrelation ON account.user_id = friendrelation.user_id_1 or account.user_id = friendrelation.user_id_2 WHERE friendrelation.AreFriend IS NULL';
$res_not_friend = mysqli_query($connect, $sql_not_friend);
?>
<h4>เพื่อน</h4>
<?php
if (mysqli_num_rows($res_friend) != 0) {
    while ($fetch_friend = mysqli_fetch_assoc($res_friend)) {
?>
        <div class="row border p-1">
            <div class="col-3">
                <img src="" style="max-width: 110px;" />
            </div>
            <div class="col-6">
                <div class="text-strong"><?php echo $fetch_friend["FirstName"] . '&emsp;' . $fetch_friend["LastName"]; ?></div>
            </div>
            <div class="col-3">
                <form action="" method="POST">
                    <input type="hidden" name="user_id" value="<?= $fetch_friend["user_id"] ?>" />
                    <button class="float-right btn btn-danger" type="submit" name="action_friend" value="delete_friend">ลบเพื่อน</button>
                </form>
            </div>
        </div>
    <?php
    }
} else {
    ?>
    <div class="alert alert-warning" role="alert">
        คุณยังไม่มีเพื่อน
    </div>
<?php
}
?>
<h4>รอรับคำขอเป็นเพื่อน</h4>
<?php
if (mysqli_num_rows($res_request_friend) != 0) {
    while ($fetch_request_friend = mysqli_fetch_assoc($res_request_friend)) {
?>
        <div class="row border p-1">
            <div class="col-3">
                <img src="" style="max-width: 110px;" />
            </div>
            <div class="col-6">
                <div class="text-strong"><?php echo $fetch_request_friend["FirstName"] . '&emsp;' . $fetch_request_friend["LastName"]; ?></div>
            </div>
            <div class="col-3">
                <form action="" method="POST">
                    <input type="hidden" name="user_id" value="<?= $fetch_request_friend["user_id"] ?>" />
                    <button class="float-right btn btn-warning" type="submit" name="action_friend" value="cancel_request">ยกเลิก</button>
                </form>
            </div>
        </div>
    <?php
    }
} else {
    ?>
    <div class="alert alert-warning" role="alert">
        คุณยังไม่มีคำขอเพิ่มเพื่อน
    </div>
<?php
}
?>
<h4>คำขอเป็นเพื่อน</h4>
<?php
if (mysqli_num_rows($res_accept_friend) != 0) {
    while ($fetch_accept_friend = mysqli_fetch_assoc($res_accept_friend)) {
?>
        <div class="row border p-1">
            <div class="col-3">
                <img src="" style="max-width: 110px;" />
            </div>
            <div class="col-6">
                <div class="text-strong"><?php echo $fetch_accept_friend["FirstName"] . '&emsp;' . $fetch_accept_friend["LastName"]; ?></div>
            </div>
            <div class="col-3">
                <form action="" method="POST">
                    <input type="hidden" name="user_id" value="<?= $fetch_accept_friend["user_id"] ?>" />
                    <button class="float-right btn btn-success" type="submit" name="action_friend" value="accept_friend">รับเพื่อน</button>
                </form>
            </div>
        </div>
    <?php
    }
} else {
    ?>
    <div class="alert alert-warning" role="alert">
        คุณยังไม่มีคำขอเพิ่มเพื่อนจากเพื่อน
    </div>
<?php
}
?>
<h4>ยังไม่เป็นเพื่อน</h4>
<?php
if (mysqli_num_rows($res_not_friend) != 0) {
    while ($fetch_not_friend = mysqli_fetch_assoc($res_not_friend)) {
?>
        <div class="row border p-1">
            <div class="col-3">
                <img src="" style="max-width: 110px;" />
            </div>
            <div class="col-6">
                <div class="text-strong"><?php echo $fetch_not_friend["FirstName"] . '&emsp;' . $fetch_not_friend["LastName"]; ?></div>
            </div>
            <div class="col-3">
                <form action="" method="POST">
                    <input type="hidden" name="user_id" value="<?= $fetch_not_friend["user_id"] ?>" />
                    <button class="float-right btn btn-primary" type="submit" name="action_friend" value="add_friend">เพิ่มเพื่อน</button>
                </form>
            </div>
        </div>
    <?php
    }
} else {
    ?>
    <div class="alert alert-warning" role="alert">
        ไม่มีบุคคลที่คุณยังไม่เป็นเพื่อน
    </div>
<?php
}
?>