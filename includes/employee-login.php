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

    $employeeId = verifyemployeeLogin($link, $email, $pass);
    if ($employeeId === -1) {
        header("location: ../login.php?error=wrongpass");
        exit();
    } else {
        $_SESSION['employee-logged-in'] = $employeeId;
    }

    header("location: ../manage.php");
    exit();
} else {
    header("location: ../manage.php");
    exit();
}


