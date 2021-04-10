<?php
session_start();
require_once '../connect.php';
require_once 'functions-inc.php';

if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['pass'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if (anyEmptyFields("N/A", $email, $pass, "N/A")) {
        header("location: ../login.php?error=empty");
        exit();
    }

    $visitorId = verifyVisitorLogin($link, $email, $pass);
    if ($visitorId === -1) {
        header("location: ../login.php?error=wrongpass");
        exit();
    } else {
        $_SESSION['visitor-logged-in'] = $visitorId;
    }

    header("location: ../tours.php");
    exit();
} else {
    header("location: ../tours.php");
    exit();
}


