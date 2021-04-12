<?php
require_once '../connect.php';
require_once 'functions-inc.php';
session_start();

if (isset($_REQUEST['btguide']) && isset($_REQUEST['btdate']) && isset($_REQUEST['bttime'])) {
    $tguide = $_REQUEST['btguide'];
    $tdate = $_REQUEST['btdate'];
    $ttime = $_REQUEST['bttime'];
    $partySize = isset($_REQUEST['size']) ? $_REQUEST['size'] : 1;

    if (isset($_SESSION['visitor-logged-in'])) {
        $visitor_id = $_SESSION['visitor-logged-in'];

        # Remove visitor - tour relationship into database
        $guide_id = getGuideData($link, $tguide)['ID'];
        $success = deleteToursAdmin($link, $guide_id, $tdate, $ttime, $visitor_id, $partySize);

        if (!$success) {
            header("location: ../tours.php?error=bad_delete");
            exit();
        } else {
            header("location: tours-refresh-inc.php?refresh=true");
            exit();
        }
    } 
} 
}