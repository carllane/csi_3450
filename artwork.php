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
                    if(isset($_SESSION["tartwork"])){
                        $tartwork = $_SESSION["tartwork"];
                        $tartwork_display = ($tartwork == '*') ? 'Any': $tartwork;
                        echo "<option value='" . $tartwork . "'selected>" . $tartwork_display . "</option>";
                    }
                ?>
                <option value= '*'>Any</option>

                <?php
                    $sql = "SELECT * FROM artwork";
                    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                
                    while($row = mysqli_fetch_array($result)){
                        echo "<option value='" .$row['Name']."'>".$row['Name']."</option>";
                    }
            ?>
        </select>

        <label style= "margin-left: 3%;" for="tartist">Artist</label>
        <select class = "dropdown" id = "tartist" name= "tartist">
                <?php
                    if(isset($_SESSION["tartist"])){
                        $tartist = $_SESSION["tartist"];
                        $tartist_display = ($tartist == '*') ? 'Any': $tartist;
                        echo "<option value='" . $tartist . "'selected>" . $tartist_display . "</option>";
                    }
                ?>
                <option value= '*'>Any</option>

                <?php
                    $sql = "SELECT * FROM artwork";
                    $result = mysqli_query($link, $sql) or die(mysqi_error($link));
                
                    while($row = mysqli_fetch_array($result)){
                        echo "<option value='" .$row['Artist']."'>".$row['Artist']."</option>";
                    }
                ?>
            </select>

            <label style= "margin-left: 3%;" for="tType">Type</label>
            <select class = "dropdown" id = "tType" name= "tType">
                <?php
                    if(isset($_SESSION["tType"])){
                        $tType = $_SESSION["tType"];
                        $tType_display = ($tType == '*') ? 'Any': $tType;
                        echo "<option value='" . $tType . "'selected>" . $tType_display . "</option>";
                    }
                ?>
                <option value= '*'>Any</option>

                <?php
                    $sql = "SELECT * FROM artwork";
                    $result = mysqli_query($link, $sql) or die(mysqi_error($link));
                
                    while($row = mysqli_fetch_array($result)){
                        echo "<option value='" .$row['Type']."'>".$row['Type']."</option>";
                    }
                ?>
            </select>

            <label style= "margin-left: 3%;" for="tmovement">Movement</label>
            <select class = "dropdown" id = "tmovement" name= "tmovement">
                <?php
                    if(isset($_SESSION["tmovement"])){
                        $tmovement = $_SESSION["tmovement"];
                        $tmovement_display = ($tmovement == '*') ? 'Any': $tmovement;
                        echo "<option value='" . $tmovement . "'selected>" . $tmovement_display . "</option>";
                    }
                ?>
                <option value= '*'>Any</option>

                <?php
                    $sql = "SELECT * FROM artwork";
                    $result = mysqli_query($link, $sql) or die(mysqi_error($link));
                
                    while($row = mysqli_fetch_array($result)){
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
