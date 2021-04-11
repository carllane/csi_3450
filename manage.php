<!DOCTYPE html>
<html>
<head>
    <title>Art Gallery</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="header">
        <h1>Manage Artwork</h1>
    </div>
    <div class="sidenav">
        <a href="artwork.php">Artwork</a>
        <a href="tours.php">Tours</a>
        <a href="index.php">About Us</a>
        <br>
        <a class="active" href="manage.php">Manage</a>
    </div>
    <div class="main">


    <div class="header">
    <h1>Employee Login</h1>
   
    <?php
     session_start();
        if (isset($_SESSION['visitor-logged-in'])) {
            $sql = "SELECT Name FROM visitor WHERE ID=" .$_SESSION['visitor-logged-in'];
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            $row = mysqli_fetch_array($result);
            echo "<p style='text-align:center'>Logged in as " . $row['Name']."</p>";
        } else {
            echo "<p style='text-align:center;color:#fa2742'><strong>Not Logged In!</strong></p>";
        }


       
        if (!isset($_SESSION['visitor-logged-in'])) {
            echo '<a class="button-link" href="employee_login.php" style="position: fixed; top:50px; right:30px">Log In</a>';
        } else {
            echo '<a class="button-link" href="includes/logout-inc.php" style="position: fixed; top:50px; right:25px">Log Out</a>';
        }
        # Existing search query content
        if (isset($_SESSION["search-content"])) {
            $content = $_SESSION["search-content"];
            if ($content !== false) {
                echo $content;
            } else {
                echo "<h4>No tours found</h4>";
            }
        }
    ?>
</section>
</div> 
<?php include_once 'includes/footer.php'; ?>


</div>
<div cla
     



<?php
//require_once 'connect.php';
//$sql = "SELECT * FROM guide";
//$result = mysqli_query($link, $sql) or die(mysqli_error($link));

//echo "<h2>Test</h2><br>";
//while($row = mysqli_fetch_array($result)) {
 //   echo "Guide name " . $row['Name'] . "<br>";
//}


