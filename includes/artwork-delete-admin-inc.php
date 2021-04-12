<?php
require_once '../connect.php';
require_once 'functions-inc.php';
session_start();

if (isset($_REQUEST['tartwork']) && isset($_REQUEST['tartist']) && isset($_REQUEST['tType']) && isset($_REQUEST['tmovement'])) {
    $artworkName = $_REQUEST['tartwork'];
    $artist = $_REQUEST['tartist'];
    $type = $_REQUEST['tType'];
    $movement = $_REQUEST['tmovement'];

    if (isset($_SESSION['employee-logged-in'])) {
        $employee = $_SESSION['employee-logged-in'];

        # Remove visitor - tour relationship into database
        //$guide_id = getArtworkData($link, $tguide)['ID'];
        $success = deleteArtworkPaint($link, $artworkName, $artist, $type, $movement);

        if (!$success) {
            header("location: ../artwork.php?error=bad_delete");
            exit();
        } else {
            header("location: tours-refresh-inc.php?refresh=true");
            exit();
        }
    } else {
        # Direct visitor to log in
        header("location: ../login.php");
        exit();
    }
} else {
    # Page accessed without clicking on a 'book tour' link
    header("location: ../artwork.php");
    exit();
}