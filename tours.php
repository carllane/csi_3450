<?php 
require_once 'connect.php';
include_once 'includes/header.php';
?>
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
    <!-- <h2>Your Upcoming Tours</h2>
    <form action="get_user_tours.php" method="POST">
    <label for="email">Enter your email: </label><br>
    <input type="email" id="email" name="email">
    </form>
    <div class="user_tours">
        // if (isset($_REQUEST['visitor_id'])) {
        //     $visitor_id = $_REQUEST['visitor_id'];
        //     $sql = "SELECT Name FROM visitor WHERE ID = '" . $visitor_id . "'";
        //     $result = mysqli_query($link, $sql) or die(mysqli_error($link));
        
        //     echo "<h3>Tours for " . $result -> fetch_array()['Name'] . "</h3>";
        
        //     $sql  = "SELECT Name, PhoneNum, Date(TourDateTime) AS tdate, Time(TourDateTime) AS ttime ";
        //     $sql .= "FROM tourvisitor ";
        //     $sql .= "INNER JOIN guide ";
        //     $sql .= "ON tourvisitor.TourGuideID = guide.ID ";
        //     $sql .= "WHERE tourvisitor.VisitorID='" . $visitor_id . "' ";
        //     $sql .= "ORDER BY tourvisitor.TourDateTime";
        //     $result = mysqli_query($link, $sql) or die(mysqli_error($link));
        
        //     while($row = mysqli_fetch_array($result)) {
            //         echo $row['Name'];
            //         // echo $row['PhoneNum'] . ") ";
            //         echo " on " . $row['tdate'];
            //         echo " at " . $row['ttime'] . "<br>";
            //     }
            // } else {
            //     echo "<p>No email entered!</p>";
        // }
    </div> -->
    <section>
        <h3>Search Tours</h3>
        <form action="includes/tours-inc.php" method="POST" class="search-tours-form">
            <label for="guide">Guide</label>
            <select class="dropdown" id="tguide">
                <option value="*">Any</option>
                <option value="bridget">Bridget</option>
                <option value="carl">Carl</option>
                <option value="dan">Dan</option>
            </select>

            <label style="margin-left: 15%;" for="tmonth">Tour Date</label>
            <select class="dropdown" id="tmonth" name="tmonth">
                <option value="*">Month</option>
                <option value="01">January</option>
                <option value="02">Febraury</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <label for="tday"> / </label>
            <select class="dropdown" id="tday" name="tday">
                <option value="*">Day</option>
                <?php 
                    for ($i = 1; $i <= 31; $i += 1) {
                        echo "<option value='" . $i . "'>" . $i ."</option>";
                    }
                ?>
            </select>
            <label for="tyear"> / </label>
            <select class="dropdown" id="tyear" name="tyear">
                <option value="*">Year</option>
                <?php 
                    $cur_year = date("Y");
                    for ($i = $cur_year; $i <= $cur_year + 2; $i += 1) {
                        echo "<option value='" . $i . "'>" . $i ."</option>";
                    }
                ?>
            </select>

            <input type="submit" value="Search" style="position:absolute; right: 120px">
            <input type="reset" style="position:absolute; right: 20px">
        </form>
    </section>
    <p>Of Leonardo da Vinci's works, the Mona Lisa is the only portrait whose authenticity has never been seriously questioned,[43] and one of four works – the others being Saint Jerome in the Wilderness, Adoration of the Magi and The Last Supper – whose attribution has avoided controversy.[44] He had begun working on a portrait of Lisa del Giocondo, the model of the Mona Lisa, by October 1503.[14][15] It is believed by some that the Mona Lisa was begun in 1503 or 1504 in Florence.[45] Although the Louvre states that it was "doubtless painted between 1503 and 1506",[8] art historian Martin Kemp says that there are some difficulties in confirming the dates with certainty.[18] Alessandro Vezzosi believes that the painting is characteristic of Leonardo's style in the final years of his life, post-1513.[46] Other academics argue that, given the historical documentation, Leonardo would have painted the work from 1513.[47] According to Vasari, "after he had lingered over it four years, [he] left it unfinished".[13] In 1516, Leonardo was invited by King Francis I to work at the Clos Lucé near the Château d'Amboise; it is believed that he took the Mona Lisa with him and continued to work on it after he moved to France.[25] Art historian Carmen C. Bambach has concluded that Leonardo probably continued refining the work until 1516 or 1517.[48] Leonardo's right hand was paralytic circa 1517,[49] which may indicate why he left the Mona Lisa unfinished.[50][51][52][a]</p>
    <p>Of Leonardo da Vinci's works, the Mona Lisa is the only portrait whose authenticity has never been seriously questioned,[43] and one of four works – the others being Saint Jerome in the Wilderness, Adoration of the Magi and The Last Supper – whose attribution has avoided controversy.[44] He had begun working on a portrait of Lisa del Giocondo, the model of the Mona Lisa, by October 1503.[14][15] It is believed by some that the Mona Lisa was begun in 1503 or 1504 in Florence.[45] Although the Louvre states that it was "doubtless painted between 1503 and 1506",[8] art historian Martin Kemp says that there are some difficulties in confirming the dates with certainty.[18] Alessandro Vezzosi believes that the painting is characteristic of Leonardo's style in the final years of his life, post-1513.[46] Other academics argue that, given the historical documentation, Leonardo would have painted the work from 1513.[47] According to Vasari, "after he had lingered over it four years, [he] left it unfinished".[13] In 1516, Leonardo was invited by King Francis I to work at the Clos Lucé near the Château d'Amboise; it is believed that he took the Mona Lisa with him and continued to work on it after he moved to France.[25] Art historian Carmen C. Bambach has concluded that Leonardo probably continued refining the work until 1516 or 1517.[48] Leonardo's right hand was paralytic circa 1517,[49] which may indicate why he left the Mona Lisa unfinished.[50][51][52][a]</p>
    <p>Of Leonardo da Vinci's works, the Mona Lisa is the only portrait whose authenticity has never been seriously questioned,[43] and one of four works – the others being Saint Jerome in the Wilderness, Adoration of the Magi and The Last Supper – whose attribution has avoided controversy.[44] He had begun working on a portrait of Lisa del Giocondo, the model of the Mona Lisa, by October 1503.[14][15] It is believed by some that the Mona Lisa was begun in 1503 or 1504 in Florence.[45] Although the Louvre states that it was "doubtless painted between 1503 and 1506",[8] art historian Martin Kemp says that there are some difficulties in confirming the dates with certainty.[18] Alessandro Vezzosi believes that the painting is characteristic of Leonardo's style in the final years of his life, post-1513.[46] Other academics argue that, given the historical documentation, Leonardo would have painted the work from 1513.[47] According to Vasari, "after he had lingered over it four years, [he] left it unfinished".[13] In 1516, Leonardo was invited by King Francis I to work at the Clos Lucé near the Château d'Amboise; it is believed that he took the Mona Lisa with him and continued to work on it after he moved to France.[25] Art historian Carmen C. Bambach has concluded that Leonardo probably continued refining the work until 1516 or 1517.[48] Leonardo's right hand was paralytic circa 1517,[49] which may indicate why he left the Mona Lisa unfinished.[50][51][52][a]</p>                
</div> 
<?php include_once 'includes/footer.php'; ?>