<!DOCTYPE html>
<html>
<head>
    <title>Art Gallery</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="header">
        <h1>Tours</h1>
        <button>Log in!</button>
    </div>
    <div class="sidenav">
        <a href="artwork.php">Artwork</a>
        <a class="active" href="tours.php">Tours</a>
        <a href="index.php">About Us</a>
        <br>
        <a href="manage.php">Manage</a>
    </div>
    <div class="main">
        <h3>Book Tour</h3>
        <form>
            <label for="guide">Choose a guide:</label>
            <select id="guide" name="guide">
                <option value="*" selected>Any</option>
            </select>
            <br>
            <label for="tourdate">Choose a date:</label>
            <input type="date" id="tourdate" name="tourdate">
            <br>
            <label for="tourtime">Choose a time:</label>
            <input type="time" id="tourtime" name="tourtime">
        </form>
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