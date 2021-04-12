<?php 
require_once '../connect.php';
require_once 'functions-inc.php';

if (isset($_REQUEST['submit']) && isset($_REQUEST['tguide']) && isset($_REQUEST['datetime']) && isset($_REQUEST['spotsleft'])) {
    $tguide = $_REQUEST['tguide'];
    $datetime = $_REQUEST['datetime'];
    $datetime = date("Y-m-d H:i:s", strtotime($datetime));
    $spotsleft = $_REQUEST['spotsleft'];

    $tguideid = getGuideData($link, $tguide)['ID'];

    # Insert a new tour into tour database
    insertNewTour($link, $tguideid, $datetime, $spotsleft);

    header("location: ../manage.php");
    exit();
} else {
    header("location: ../manage.php");
    exit();
}