<?php
session_start();

$connect = mysqli_connect("localhost", "hatyai", "o]j7FCN4aHt8!ilg", "hatyai_socialsystem");

if (mysqli_connect_errno()) {
    exit("failed to connect to database");
} else {
    mysqli_set_charset($connect, 'utf-8');
}

function isAdmin($user_id) {
    global $connect;
    $sql_isadmin = 'SELECT `acc_level` FROM account WHERE user_id = "' . $user_id . '"';
    $res_isadmin = mysqli_query($connect, $sql_isadmin);
    if ($res_isadmin) {
        $fetch_isadmin = mysqli_fetch_assoc($res_isadmin);
        if ($fetch_isadmin["acc_level"] == "admin") {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function userInfo($user_id) {
    global $connect;
    $sql_user_info = 'SELECT * FROM account WHERE user_id = "' . $user_id . '"';
    $res_user_info = mysqli_query($connect, $sql_user_info);
    if ($res_user_info) {
        $fetch_user_info = mysqli_fetch_assoc($res_user_info);
        return $fetch_user_info;
    } else {
        return false;
    }
}