<?php
if (!isset($_GET["admin_page"])) {
    $_GET["admin_page"] = "accept_account";
}
if (!$_GET["admin_page"]) {
    $_GET["admin_page"] = "accept_account";
}

if ($_GET["admin_page"] == "accept_account") {
    include './page/admin/accept_account.php';
} else if ($_GET["admin_page"] == "manage_account") {
    include './page/admin/manage_account.php';
} else if ($_GET["admin_page"] == "report_system") {
    include './page/admin/report_system.php';
} else {
    ?>
    <div class="alert alert-danger" role="alert">
        ไม่พบหน้าที่ท่านกำลังร้องขอ
    </div>
    <?php
}