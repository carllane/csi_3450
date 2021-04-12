<?php 
require_once '../connect.php';
require_once 'functions-inc.php';

if (isset($_REQUEST['submit']) && isset($_REQUEST['imageurl']) && isset($_REQUEST['name']) && isset($_REQUEST['type'])) {
    $imageurl = $_REQUEST['imageurl'];
    $artwork_name = $_REQUEST['name'];
    $artist = $_REQUEST['artist'];
    $year_made = $_REQUEST['yearmade'];
    $movement_name = $_REQUEST['mvmtname'];
    $price = $_REQUEST['price'];
    $type = $_REQUEST['type'];

    # Insert a new artwotk into tour database
    $success = insertNewArtwork($link, $imageurl, $artwork_name, $artist, $year_made, 
        $movement_name, $price, $type);

    if ($success) {
        header("location: ../manage.php");
        exit();
    }
} else {
    header("location: ../manage.php");
    exit();
}