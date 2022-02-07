<?php
$numrand = (mt_rand());

$local = "localhost";
$user = "phangnga";
$pass = "h2/x!gSjiZf6IoEj";
$dbname = "phangnga_database";

$conn = mysqli_connect($local, $user, $pass, $dbname) or die("Error Connect");

mysqli_set_charset($conn, 'utf8');
