<?php
    require_once 'connect.php';

    $email = $_REQUEST['email'];

    $sql = "SELECT ID FROM visitor WHERE Email='" . $email . "'";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));

    if (($result -> num_rows) == 1) {
        $row = $result -> fetch_array();
        echo "<script>location.href='tours.php?visitor_id=" . $row['ID'] . "'</script>";
    } else {
        echo "<script>location.href='tours.php'</script>";
    }
?>