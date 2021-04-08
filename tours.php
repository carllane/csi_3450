<?php 
require_once 'connect.php';
include_once 'includes/header.php';
session_start();
?>
<div class="header">
    <h1>Art Gallery Tours</h1>
    <?php
        if (isset($_SESSION['visitor-logged-in'])) {
            $sql = "SELECT Name FROM visitor WHERE ID=" .$_SESSION['visitor-logged-in'];
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            $row = mysqli_fetch_array($result);
            echo "<p style='text-align:center'>Logged in as " . $row['Name']."</p>";
        } else {
            echo "<p style='text-align:center;color:#fa2742'><strong>Not Logged In!</strong></p>";
        }
    ?>
</div>
<div class="sidenav">
    <a href="artwork.php">Artwork</a>
    <a class="active" href="tours.php">Tours</a>
    <a href="index.php">About Us</a>
    <br>
    <a href="manage.php">Manage</a>
</div>
<div class="main">
    <section>
        <?php
        if (isset($_SESSION['visitor-logged-in'])) {
            $visitor_id = $_SESSION['visitor-logged-in'];

            $sql  = "SELECT Name AS tguide, PhoneNum AS tphone, Date(TourDateTime) AS tdate, Time(TourDateTime) AS ttime ";
            $sql .= "FROM tourvisitor ";
            $sql .= "INNER JOIN guide ";
            $sql .= "ON tourvisitor.TourGuideID = guide.ID ";
            $sql .= "WHERE tourvisitor.VisitorID='" . $visitor_id . "' ";
            $sql .= "ORDER BY tourvisitor.TourDateTime";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            
            echo "<h3>Your Upcoming Tours</h3>";
            if (mysqli_num_rows($result) > 0) {
                echo "<table style='width:50%;margin-left:20px' class='upcoming-table'>";
                echo "<tr><th>Guide</th><th>Date</th><th>Time</th><th>Contact</th><th></th></tr>";
                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['tguide'] . "</td>";
                    $date_display = date("m/d/Y", strtotime($row['tdate']));
                    echo "<td>" . $date_display . "</td>";
                    $time_display = substr($row['ttime'], 0,5);
                    echo "<td>" . $time_display . "</td>";
                    echo "<td>" . $row['tphone'] . "</td>";
                    echo "<td><div><a class='submit' style='margin: -5px -30px;border:none;padding: 10px 40px;' href='includes/tours-book-delete-inc.php?btguide="
                        .$row['tguide']."&btdate=".$row['tdate']."&bttime=".$row['ttime']."'>Delete</a></div></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "You do not have booked any upcoming tours.";
            }
        }
        ?>
    </section>
    <section>
        <h3 style="margin-top: 45px;">Search Tours</h3>
        <form action="includes/tours-search-inc.php" method="POST" class="form">
            <label for="tguide">Guide</label>
            <select class="dropdown" id="tguide" name="tguide">
                <?php 
                    if(isset($_SESSION["tguide"])) {
                        $tguide = $_SESSION["tguide"];
                        $tguide_display = ($tguide == '*') ? 'Any' : $tguide;
                        echo "<option value='" . $tguide . "' selected>" . $tguide_display . "</option>";
                    }
                ?>
                <option value='*'>Any</option>

                <?php 
                    $sql = "SELECT * FROM GUIDE";
                    $result = mysqli_query($link, $sql) or die(mysqli_error($link));

                    while($row = mysqli_fetch_array($result)) {
                        echo "<option value='".$row['Name']."'>".$row['Name']."</option>";
                    }
                ?>
            </select>

            <label style="margin-left: 15%;" for="tmonth">Tour Date</label>
            <select class="dropdown" id="tmonth" name="tmonth">
                <?php 
                    if(isset($_SESSION["tmonth"])) {
                        $tmonth = $_SESSION["tmonth"];
                        switch ($tmonth) {
                            case 1:
                                $tmonth_display = 'January';
                                break;
                            case 2:
                                $tmonth_display = 'Febraury';
                                break;
                            case 3:
                                $tmonth_display = 'March';
                                break;
                            case 4:
                                $tmonth_display = 'April';
                                break;
                            case 5:
                                $tmonth_display = 'May';
                                break;
                            case 6:
                                $tmonth_display = 'June';
                                break;      
                            case 7:
                                $tmonth_display = 'July';
                                break;
                            case 8:
                                $tmonth_display = 'August';
                                break;
                            case 9:
                                $tmonth_display = 'September';
                                break;
                            case 10:
                                $tmonth_display = 'October';
                                break;
                            case 11:
                                $tmonth_display = 'November';
                                break;
                            case 12:
                                $tmonth_display = 'December';
                                break;                                          
                            default:
                                $tmonth_display = 'Month';
                                break;
                        }
                        echo "<option value='" . $tmonth . "' selected>" . $tmonth_display . "</option>";
                    }
                ?>
                <option value="*">Month</option>
                <option value="1">January</option>
                <option value="2">Febraury</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <label for="tday"> / </label>
            <select class="dropdown" id="tday" name="tday">
                <?php 
                    if(isset($_SESSION["tday"])) {
                        $tday = $_SESSION["tday"];
                        $tday_display = ($tday == '*') ? 'Day' : $tday;
                        echo "<option value='" . $tday . "' selected>" . $tday_display . "</option>";
                    }
                ?>
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
                    if(isset($_SESSION["tyear"])) {
                        $tyear = $_SESSION["tyear"];
                        $tyear_display = ($tyear == '*') ? 'Year' : $tyear;
                        echo "<option value='" . $tyear . "' selected>" . $tyear_display . "</option>";
                    }
                ?>
                <?php 
                    $cur_year = date("Y");
                    for ($i = $cur_year; $i <= $cur_year + 2; $i += 1) {
                        echo "<option value='" . $i . "'>" . $i ."</option>";
                    }
                ?>
            </select>

            <input type="submit" name="submit" value="Search" style="position:absolute; right: 60px">
        </form>
        <?php
            if (!isset($_SESSION['visitor-logged-in'])) {
                echo '<a class="button-link" href="login.php" style="position: fixed; top:50px; right:30px">Log In / Sign Up</a>';
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