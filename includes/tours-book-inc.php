<?php
require_once '../connect.php';
session_start();

if (isset($_REQUEST['btguide']) && isset($_REQUEST['btdate']) && isset($_REQUEST['bttime'])) {
    $tguide = $_REQUEST['btguide'];
    $tdate = $_REQUEST['btdate'];
    $ttime = $_REQUEST['bttime'];

    if (isset($_SESSION['visitor-logged-in'])) {
        # Insert visitor - tour relationship into database
        $visitor_id = $_SESSION['visitor-logged-in'];
        echo "Visitor ".$visitor_id." is logged in!";
    } else {
        # Direct visitor to log in
        header("location: ../login.php");
        exit();
    }
} else {
    # Page accessed without clicking on a 'book tour' link
    header("location: ../tours.php");
    exit();
}