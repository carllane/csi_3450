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

    session_start();

    # Append Search Query Results to a content string
    if ($results !== false && mysqli_num_rows($results) > 0) {
        $content .= "<table style='margin-left:20px;width:60%' class='search-table'>";
        $content .= "<tr><th>Guide</td><th>Tour Date</th><th>Tour Time</th><th>Spots Left</th><th></th>";
        if (isset($_SESSION['employee-logged-in'])) { $content .= "<th>Admin Delete</th>";}
        $content .= "</tr>";
        while($row = mysqli_fetch_array($results)) {
            if ($row['SpotsLeft'] == 0) { continue; }
            $content .= "<tr><td>" . $row['Name'] . "</td><td>" . $row['TourDate']  . "</td><td>" . $row['TourTime'] ."</td><td>" . $row['SpotsLeft'] . "</td>";
            $content .= "<td><div><a class='button-link' style='margin: -5px -20px;border:none;padding: 10px 40px;' href='includes/tours-book-inc.php?btguide=".$row['Name']."&btdate="
                .$row['TourDate']."&bttime=".$row['TourTime']."'>Book</a></div></td>";
            if (isset($_SESSION['employee-logged-in'])) {
                $content .= "<td><div><a class='submit' style='margin: -5px -20px;border:none;padding: 10px 40px;' href='includes/tours-delete-admin-inc.php?btguide=".$row['Name']."&btdate="
                    .$row['TourDate']."&bttime=".$row['TourTime']."'>Delete</a></div></td>";
            }   
            $content .= "</tr>";
        }
        $content .= "</table>";
    } else {
        $content .= "<p style='text-align:center'>No tours met the search criteria.</p>";
    }

    # Debug statements
    // echo $guide . ", " . $month . ", " . $day . ", " . $year . "<br>";
    // echo $content;

    # Pass content string to session
    $_SESSION["search-content"] = $content;
    $_SESSION["tguide"] = $guide;
    $_SESSION["tmonth"] = $month;
    $_SESSION["tday"] = $day;
    $_SESSION["tyear"] = $year;
    $_SESSION["show-content"] = true;

    # Redirect page back to tours
    header("location: ../tours.php");
    exit();

} else {
    # Page accessed without clicking on 'search'
    header("location: ../tours.php");
    exit();
}