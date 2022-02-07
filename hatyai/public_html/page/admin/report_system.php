<?php
$sql_account_all = 'SELECT * FROM account';
$res_account_all = mysqli_query($connect, $sql_account_all);

$sql_account_accept = 'SELECT * FROM account WHERE acc_status = "accept"';
$res_account_accept = mysqli_query($connect, $sql_account_accept);

$sql_account_cancel = 'SELECT * FROM account WHERE acc_status = "cancel"';
$res_account_cancel = mysqli_query($connect, $sql_account_cancel);

$sql_account_pending = 'SELECT * FROM account WHERE acc_status = "pending"';
$res_account_pending = mysqli_query($connect, $sql_account_pending);

$sql_post_all = 'SELECT * FROM post';
$res_post_all = mysqli_query($connect, $sql_post_all);

$sql_comment_all = 'SELECT * FROM comment';
$res_comment_all = mysqli_query($connect, $sql_comment_all);
?>
<div class="row">
    <div class="col-md-4 pt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">ผู้ใช้งานทั้งหมดในระบบ</h4>
                <p class="card-text"><?= mysqli_num_rows($res_account_all) ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4 pt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">ผู้ใช้งานที่อนุมัติแล้ว</h4>
                <p class="card-text"><?= mysqli_num_rows($res_account_accept) ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4 pt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">ผู้ใช้งานที่ยังไม่อนุมัติ</h4>
                <p class="card-text"><?= mysqli_num_rows($res_account_pending) ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4 pt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">ผู้ใช้งานที่ถูกระงับการใช้งาน</h4>
                <p class="card-text"><?= mysqli_num_rows($res_account_cancel) ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4 pt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">จำนวนโพสต์ทั้งหมด</h4>
                <p class="card-text"><?= mysqli_num_rows($res_post_all) ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4 pt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">จำนวนคอมเมนต์ทั้งหมด</h4>
                <p class="card-text"><?= mysqli_num_rows($res_comment_all) ?></p>
            </div>
        </div>
    </div>
</div>