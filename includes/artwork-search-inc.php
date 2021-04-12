<?php
if(isset($_POST['submit'])){
    $artworkName = $_POST['tartwork'];
    $artist = $_POST['tartist'];
    $type = $_POST['tType'];
    $movement = $_POST['tmovement'];

    require_once '../connect.php';
    require_once 'functions-inc.php';
    
    $results = artworkSearchQuery($link, $artworkName, $artist, $type, $movement);
    $content = "";

    session_start();

    if($results !== false && mysqli_num_rows($results) > 0){
        $content .= "<table style = 'margin: auto; width: 90%' class = 'search-table'>";
        $content .= "<tr><th>Image</td><th>Name</th><th>Artist</th><th>Year</th><th>Price</th><th>Type</th><th>Movement</th>";
        if (isset($_SESSION['employee-logged-in'])) { $content .= "<th>Admin Delete</th>"; }
        $content .= "</tr>";
        while($row = mysqli_fetch_array($results)){
            $content .= "<tr><td><img src='" .$row['Image'] . "'></td><td>" . $row['Name'] . "</td><td>" . $row['Artist'] . "</td><td>" . $row['YearMade'] . "</td><td>" . $row['Price'] . "</td><td>" . $row['Type'] . "</td><td>" . $row['MovementName'] . "</td>"; 
            if (isset($_SESSION['employee-logged-in'])) {
                $content .= "<td><div><a class='submit' style='border:none;padding: 10px 40px;' href='includes/artwork-delete-admin-inc.php?artworkid=".$row['ArtworkID']."'>Delete</a></div></td>";
            }
            $content .= "</tr>";
        }
        $content .= "</table>";
    }else{
        $content .= "<p style = 'text-align:center' > No artwork meets the searched criteria.</p>";

    }

    echo $artworkName . "," . $artist . "," . $type . "," . $type . "," . $movement . "<br>";
    echo $content;

    $_SESSION["Art-content"] = $content;
    $_SESSION["tartwork"] = $artworkName;
    $_SESSION["tartist"] = $artist;
    $_SESSION["tType"] = $type;
    $_SESSION["tmovement"] = $movement;
    $_SESSION["show-content"] = true;

    header("location: ../artwork.php");
    exit();
}else{
    header("location: ../artwork.php");
    exit();
}