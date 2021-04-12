<?php 
    require_once 'connect.php';
    include_once 'includes/header.php';
    session_start();
?>
<div class="header">
    <h1>Employee Login</h1>
    <?php
    if (isset($_SESSION['employee-logged-in'])) {
        $sql = "SELECT Name FROM employee WHERE ID=" .$_SESSION['employee-logged-in'];
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
        $row = mysqli_fetch_array($result);
        echo "<p style='text-align:center'>Logged in as " . $row['Name']."</p>";
    } else {
        echo "<p style='text-align:center;color:#fa2742'><strong>Not Logged In!</strong></p>";
    }?>
    
</div>
<div class="sidenav">
    <a href="artwork.php">Artwork</a>
    <a href="tours.php">Tours</a>
    <a href="index.php">About Us</a>
    <br>
    <a class="active" href="manage.php">Manage</a>
</div>
<div class="main"> 
    <?php
        if (!isset($_SESSION['employee-logged-in'])) {
            echo '<a class="button-link" href="employee_login.php" style="position: fixed; top:50px; right:30px">Log In</a>';
        } else {
            echo '<a class="button-link" href="includes/logout-inc.php" style="position: fixed; top:50px; right:25px">Log Out</a>';
        
            include_once 'includes/add-artwork.php';
            include_once 'includes/add-tour.php';
        }
    ?>
</div> 
<?php include_once 'includes/footer.php'; ?>