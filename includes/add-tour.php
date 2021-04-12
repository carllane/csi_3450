<h3>Add Tour</h3>
<form action="includes/add-tour-inc.php" method="POST" class="form">
    <label for="tguide">Guide</label><br>
    <select class="dropdown" id="tguide" name="tguide">
        <?php 
            $sql = "SELECT * FROM GUIDE";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));

            while($row = mysqli_fetch_array($result)) {
                echo "<option value='".$row['Name']."'>".$row['Name']."</option>";
            }
        ?>
    </select><br>

    <label for="datetime">Date Time ('YYYY-MM-DD HH:mm:ss')</label><br>
    <input type="text" name="datetime" id="datetime"></input><br>

    <label for="spotsleft">Spots Left</label><br>
    <input type="text" name="spotsleft" id="spotsleft"></input><br>
    
    <input type="submit" name="submit" value="Add" style="position:relative;margin-top:30px">
</form>