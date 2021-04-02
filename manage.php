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
        <a class="active" href="manage.php>">Manage</a>
    </div>
    <div class="main">
        <h3>Placeholder for manage page</h3> <br><br><br><br><br>
    </div> 
</body>
</html>

<?php
require_once 'connect.php';
$sql = "SELECT * FROM guide";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));

echo "<h2>Test</h2><br>";
while($row = mysqli_fetch_array($result)) {
    echo "Guide name " . $row['Name'] . "<br>";
}
?>