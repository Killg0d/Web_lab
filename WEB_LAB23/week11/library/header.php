<?php
include "auth.php";
echo "<div>Welcome ". $_SESSION['username']."<a href='logout.php'>Logout</a></div>";
?>
