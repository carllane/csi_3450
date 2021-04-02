<!DOCTYPE html>
<html>
<head>
    <title>Art Gallery</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="header">
        <h1>View Artwork</h1>
    </div>
    <div class="sidenav">
        <a class="active" href="artwork.php">Artwork</a>
        <a href="tours.php">Tours</a>
        <a href="index.php">About Us</a>
        <br>
        <a href="manage.php>">Manage</a>
    </div>
    <div class="main">
        <table>
            <!-- <caption>Artwork</caption> -->
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Artist</th>
                <th>Year</th>
                <th>Price</th>
                <th>Type</th>
                <th>Movement</th>
            </tr>
            <tr>
                <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg/300px-Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg" alt="Mona Lisa" ></td>
                <td><i>Mona Lisa</i></td>
                <td>Leonardo de Vinci</td>
                <td>1517</td>
                <td>$100 million</td>
                <td>Painting</td>
                <td>Renaissance</td>
            </tr>
        </table>
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