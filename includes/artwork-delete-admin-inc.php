<?php
require_once '../connect.php';
require_once 'functions-inc.php';
session_start();

if (isset($_REQUEST['artworkid'])) {
    $artwork_id = $_REQUEST['artworkid'];

    # Remove visitor - tour relationship into database
    $success = deleteArtworkAdmin($link, $artwork_id);
    
    header("location: ../artwork.php");
    exit();
} else {
    # Page accessed without clicking on a 'book tour' link
    header("location: ../artwork.php");
    exit();
}