<?php
    if(isset($_COOKIE["lastVisit"])){
        $lastVisit="<p>Your last Visit was on ".$_COOKIE["lastVisit"]."</p>";
    }else{
        $lastVisit="<p>This is your first visit!<p/>";
    }
    setcookie("lastVisit",date("F j,Y,g:i a"),time()+ 60*60*24*60);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>
    <?php echo $lastVisit; ?>
</body>
</html>