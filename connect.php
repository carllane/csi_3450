<?php
$user = 'root';
$password = '';
$db = 'gallery';
$host = 'localhost';
$port = 3306;

$link = mysqli_init();
$success = mysqli_real_connect(
    $link, $host, $user, $password, $db, $port
);
?>