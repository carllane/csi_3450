<?php 
require_once 'connect.php';
include_once 'includes/header.php';
session_start();
?>
<div class="header">
    <h1>Art Gallery Tours</h1>
    <a class="button-link" href="login.php" style="position: fixed; top:50px; right:30px">Log In</a>
    <?php 
        if(isset($_GET['error'])) {
            $error = $_GET['error'];
            $message;
            if ($error === 'empty') {
                $message = 'Please fill all fields!';
            } else if ($error === 'signup' or $error === 'stmtfailed') {
                $message = 'Could not signup, please try again!';
            } else if ($error === 'existingemail') {
                $message = 'That email already exists';
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
        <h2>Sign up!</h2>
        <form action="includes/signup-inc.php" method="POST" class="form">
            <label for="name">Name</label><br>
            <input type="text" name="name" id="name"></input><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email"></input><br>
            <label for="pass">Password</label><br>
            <input type="password" name="pass" id="pass"></input><br>
            <label for="phone">Phone Number</label><br>
            <input type="text" name="phone" id="phone"></input><br>
            <input type="submit" name="submit" value="Sign Up" style="position:relative;margin-top:30px">
        </form>
    </section>
</div> 
<?php include_once 'includes/footer.php'; ?>