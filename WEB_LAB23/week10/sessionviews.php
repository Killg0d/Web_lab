<?php
    session_start();
    echo session_id();
    if (isset($_SESSION["view"])) {
        $_SESSION["view"]=$_SESSION["view"]+1;
    } else {
        $_SESSION["view"]= 1;
    }
    echo "<br>Views=".$_SESSION["view"]."<br>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>
    <?php echo $_SESSION["view"] ?>
</body>
</html>