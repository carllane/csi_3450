<?php
if (isset($_POST['submit'])) {
    # Grab POST data from Search Tours form
    $guide = $_POST['tguide'];
    $month = $_POST['tmonth'];
    $day = $_POST['tday'];
    $year = $_POST['tyear'];

    require_once '../connect.php';
    require_once 'functions-inc.php';

    # Perform a Search Query
    $results = tourSearchQuery($link, $guide, $month, $day, $year);
    $content = "";

    # Append Search Query Results to a content string
    if ($results !== false) {
        while($row = mysqli_fetch_array($results)) {
            $content .= "Guide name " . $row['Name'] . ", Tour Date " . $row['TourDate']  . ", Tour Time " . $row['TourTime'];
            $content .= "<button style='position:absolute;right:20px'>Book</button><br><br>";
        }
    }

    # Debug statements
    echo $guide . ", " . $month . ", " . $day . ", " . $year . "<br>";
    echo $content;

    # Pass content string to session
    session_start();
    $_SESSION["search-content"] = $content;
    $_SESSION["tguide"] = $guide;
    $_SESSION["tmonth"] = $month;
    $_SESSION["tday"] = $day;
    $_SESSION["tyear"] = $year;

    # Redirect page back to tours
    header("location: ../tours.php");
    exit();

} else {
    # Page accessed without clicking on 'search'
    header("location: ../tours.php");
    exit();
}