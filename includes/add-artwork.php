<h3>Add Artwork</h3>
<form action="includes/add-artwork-inc.php" method="POST" class="form">
    <label for="imageurl">Artwork Image URL</label><br>
    <input type="text" name="imageurl" id="imageurl"></input><br>

    <label for="name">Artwork Name</label><br>
    <input type="text" name="name" id="name"></input><br>

    <label for="artist">Artist</label><br>
    <input type="text" name="artist" id="artist"></input><br>

    <label for="yearmade">Year Made</label><br>
    <input type="text" name="yearmade" id="yearmade"></input><br>

    <label for="mvmtname">Movement Name</label><br>
    <select class="dropdown" id="mvmtname" name="mvmtname">
        <?php 
            $sql = "SELECT * FROM Movement";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));

            while($row = mysqli_fetch_array($result)) {
                echo "<option value='".$row['NAME']."'>".$row['NAME']."</option>";
            }
        ?>
    </select><br>
    
    <label for="price">Price</label><br>
    <input type="text" name="price" id="price"></input><br>

    <label for="type">Type (Painting, Sculpture, Drawing)</label><br>
    <input type="text" name="type" id="type"></input><br>
    
    <input type="submit" name="submit" value="Add" style="position:relative;margin-top:30px">
</form>