<?php 

if (isset($_GET['refresh'])) {
    session_start();
    $guide = $_SESSION["tguide"];
    $month = $_SESSION["tmonth"];
    $day = $_SESSION["tday"];
    $year = $_SESSION["tyear"];

    require_once '../connect.php';
    require_once 'functions-inc.php';

    # Perform a Search Query
    $results = tourSearchQuery($link, $guide, $month, $day, $year);
    $content = "";

    # Append Search Query Results to a content string
    if ($results !== false && mysqli_num_rows($results) > 0) {
        $content .= "<table style='margin-left:20px;width:60%' class='search-table'>";
        $content .= "<tr><th>Guide</td><th>Tour Date</th><th>Tour Time</th><th>Spots Left</th><th></th></tr>";
        while($row = mysqli_fetch_array($results)) {
            if ($row['SpotsLeft'] == 0) { continue; }
            $content .= "<tr><td>" . $row['Name'] . "</td><td>" . $row['TourDate']  . "</td><td>" . $row['TourTime'] ."</td><td>" . $row['SpotsLeft'] . "</td>";
            $content .= "<td><div><a class='button-link' style='margin: -5px -20px;border:none;padding: 10px 40px;' href='includes/tours-book-inc.php?btguide=".$row['Name']."&btdate="
                .$row['TourDate']."&bttime=".$row['TourTime']."'>Book</a></div></td></tr>";
        }
        $content .= "</table>";
    } else {
        $content .= "<p style='text-align:center'>No tours met the search criteria.</p>";
    }

    $_SESSION["search-content"] = $content;

    # Redirect page back to tours
    header("location: ../tours.php");
    exit();
}