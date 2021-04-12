<?php 
require_once 'connect.php';
include_once 'includes/header.php';
session_start();
?>
<div class="header">
    <h1>View Artwork</h1>
</div>
<div class="sidenav">
    <a class="active" href="artwork.php">Artwork</a>
    <a href="tours.php">Tours</a>
    <a href="index.php">About Us</a>
    <br>
    <a href="manage.php">Manage</a>
</div>
<div class="main">
    <section>
        <h3 style= "margin-top: 45px;">Search Artwork</h3>
        <form action= "includes/artwork-search-inc.php" method= "POST" class= "form">
            <label for = "tartwork" >Artwork Name</label>
            <select class = "dropdown" id= "tartwork" name= "tartwork">
                <?php
                    $selected = "";
                    if(isset($_SESSION["tartwork"]) AND $_SESSION["tartwork"] == "*"){
                        $selected = "selected";
                    }
                ?>
                <option value= '*' <?php echo $selected; ?>>Any</option>

                <?php
                    $sql = "SELECT * FROM artwork";
                    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                
                    while($row = mysqli_fetch_array($result)){
                        $selected = "";
                        if(isset($_SESSION["tartwork"]) AND $_SESSION["tartwork"] == $row['Name']){
                            $selected = "selected";
                        }
                        echo "<option value='" .$row['Name']."' ".$selected.">".$row['Name']."</option>";
                    }
            ?>
        </select>

        <label style= "margin-left: 3%;" for="tartist">Artist</label>
        <select class = "dropdown" id = "tartist" name= "tartist">
                <?php
                    $selected = "";
                    if(isset($_SESSION["tartist"]) AND $_SESSION["tartist"] == "*"){
                        $selected = "selected";
                    }
                ?>
                <option value= '*'<?php echo $selected; ?>>Any</option>

                <?php
                    $sql = "SELECT DISTINCT Artist FROM artwork";
                    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                
                    while($row = mysqli_fetch_array($result)){
                        $selected = "";
                        if(isset($_SESSION["tartist"]) AND $_SESSION["tartist"] == $row['Artist']){
                            $selected = "selected";
                        }
                        echo "<option value='" .$row['Artist']."' ".$selected.">".$row['Artist']."</option>";
                    }
                ?>
            </select>

            <label style= "margin-left: 3%;" for="tType">Type</label>
            <select class = "dropdown" id = "tType" name= "tType">
                <?php
                    $selected = "";
                    if(isset($_SESSION["tType"]) AND $_SESSION["tType"] == "*"){
                        $selected = "selected";
                    }
                ?>
                <option value= '*'<?php echo $selected; ?>>Any</option>

                <?php
                    $sql = "SELECT DISTINCT Type FROM artwork";
                    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                
                    while($row = mysqli_fetch_array($result)){
                        $selected = "";
                        if(isset($_SESSION["tType"]) AND $_SESSION["tType"] == $row['Type']){
                            $selected = "selected";
                        }
                        echo "<option value='" .$row['Type']."'>".$row['Type']."</option>";
                    }
                ?>
            </select>

            <label style= "margin-left: 3%;" for="tmovement">Movement</label>
            <select class = "dropdown" id = "tmovement" name= "tmovement">
                <?php
                    $selected = "";
                    if(isset($_SESSION["tmovement"]) AND $_SESSION["tmovement"] == "*"){
                        $selected = "selected";
                    }
                ?>
                <option value= '*'<?php echo $selected; ?>>Any</option>

                <?php
                    $sql = "SELECT DISTINCT MovementName FROM artwork";
                    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                
                    while($row = mysqli_fetch_array($result)){
                        $selected = "";
                        if(isset($_SESSION["tmovement"]) AND $_SESSION["tmovement"] == $row['MovementName']){
                            $selected = "selected";
                        }
                        echo "<option value='" .$row['MovementName']."'>".$row['MovementName']."</option>";
                    }
                ?>
            </select>

            <input type= "submit" name= "submit" value = "Search" style = "position:absolute; right: 60px">
        </form>
        <?php
            if (isset($_SESSION["Art-content"]) && isset($_SESSION["show-content"]) && $_SESSION["show-content"]) {
                $content = $_SESSION["Art-content"];
                if ($content !== false) {
                    echo $content;
                    $_SESSION["show-content"] = false;
                } else {
                    echo "<h4>No artwork found</h4>";
                }
            }
        ?>
    </section>
</div>
<?php include_once 'includes/footer.php'; ?>
