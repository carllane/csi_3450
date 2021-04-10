<?php 
require_once 'connect.php';
include_once 'includes/header.php';
session_start();
?>
<div class="header">
    <h1>Art Gallery Tours</h1>
    <a class="button-link" href="signup.php" style="position: fixed; top:50px; right:30px">Sign Up</a>
    <?php 
        if(isset($_GET['error'])) {
            $error = $_GET['error'];
            $message;
            if ($error === 'empty') {
                $message = 'Please fill all fields!';
            } else if ($error === 'wrongpass' or $error === 'stmtfailed') {
                $message = 'Incorrect password!';
            } else if ($error === 'stmtfailed') {
                $message = 'Could not login, please try again!';
            }
            echo "<p style='text-align:center;color:#fa2742'><strong>".$message."</strong></p>";
        }
    ?>
</div>
<div class="sidenav">
    <a href="artwork.php">Artwork</a>
    <a href="tours.php">Tours</a>
    <a href="index.php">About Us</a>
    <br>
    <a href="manage.php">Manage</a>
</div>
<div class="main">
    <section>
        <h2>Log in!</h2>
        <form action="includes/login-inc.php" method="POST" class="form">
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email"></input><br>
            <label for="pass">Password</label><br>
            <input type="password" name="pass" id="pass"></input><br>
            <input type="submit" name="submit" value="Log In" style="position:relative;margin-top:30px">
        </form>
    </section>
</div> 
<?php include_once 'includes/footer.php'; ?>