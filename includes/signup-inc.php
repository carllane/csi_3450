<?php 
require_once '../connect.php';
require_once 'functions-inc.php';

if (isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['email']) 
        && isset($_POST['pass']) && isset($_POST['phone'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $phone = $_POST['phone'];

    if (anyEmptyFields($name, $email, $pass, $phone)) {
        header("location: ../signup.php?error=empty");
        exit();
    }

    if (existingEmail($link, $email)) {
        header("location: ../signup.php?error=existingemail");
        exit();
    }
    
    $success = createVisitor($link, $name, $email, $pass, $phone);
    if ($success) {
        header("location: ../login.php");
    } else {
        header("location: ../signup.php?error=signup");
    }
    exit();
} else {
    header("location: ../tours.php");
    exit();
}
?>