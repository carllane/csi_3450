<?php 
    require_once 'connect.php';
?>
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
        <h2>Your Upcoming Tours</h2>
        <form action="get_user_tours.php" method="POST">
            <label for="email">Enter your email: </label><br>
            <input type="email" id="email" name="email">
        </form>
        <div class="user_tours">
            <?php
                if (isset($_REQUEST['visitor_id'])) {
                    $visitor_id = $_REQUEST['visitor_id'];
                    $sql = "SELECT Name FROM visitor WHERE ID = '" . $visitor_id . "'";
                    $result = mysqli_query($link, $sql) or die(mysqli_error($link));

                    echo "<h3>Tours for " . $result -> fetch_array()['Name'] . "</h3>";

                    $sql  = "SELECT Name, PhoneNum, Date(TourDateTime) AS tdate, Time(TourDateTime) AS ttime ";
                    $sql .= "FROM tourvisitor ";
                    $sql .= "INNER JOIN guide ";
                    $sql .= "ON tourvisitor.TourGuideID = guide.ID ";
                    $sql .= "WHERE tourvisitor.VisitorID='" . $visitor_id . "' ";
                    $sql .= "ORDER BY tourvisitor.TourDateTime";
                    $result = mysqli_query($link, $sql) or die(mysqli_error($link));

                    while($row = mysqli_fetch_array($result)) {
                        echo $row['Name'];
                        // echo $row['PhoneNum'] . ") ";
                        echo " on " . $row['tdate'];
                        echo " at " . $row['ttime'] . "<br>";
                    }
                } else {
                    echo "<p>No email entered!</p>";
                }
            ?>
        </div>

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

        <!-- <h1>Heading 1</h1>
        <h2>Heading 2</h2>
        <h3>Heading 3</h3>
        <h4>Heading 4</h4>
        <h5>Heading 5</h5>
        <h6>Heading 6</h6>
        <p>Paragraph</p> -->
    </div> 
</body>
</html>

<?php
$sql = "SELECT * FROM guide";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));

echo "<h2>Test</h2><br>";
while($row = mysqli_fetch_array($result)) {
    echo "Guide name " . $row['Name'] . "<br>";
}
?>