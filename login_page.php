<!DOCTYPE html>
<html>
<head>
    <title>Art Gallery Tours</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="header">
        <h1>Art Gallery Tours</h1>
    </div>
    <div class="sidenav">
        <a href="artwork.php">Artwork</a>
        <a class="active" href="tours.php">Tours</a>
        <a href="index.php">About Us</a>
        <br>
        <a href="manage.php">Manage</a>
    </div>
    <div class="main">
        <form action='login.php' method="POST">
            <label for="email">Email:</label><br>
            <input type="text" id="email"><br>
            <label for="pass">Password:</label><br>
            <input type="password" id="pass"><br>
            <input type='submit' value='Submit'>
        </form>
    </div> 
</body>
</html>

<?php
    $logged_in = true;

    require_once 'connect.php';
    $sql = "SELECT * FROM guide";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $active_user_id = '';
?>