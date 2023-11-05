<?php
if (isset($_POST['register'])) {
    if ($_POST['username']!="") {
        include'conn.php';
        $query = $mysqli->prepare('insert into users(username,password) values(?,?)');
        $query->bind_param("ss", $_POST['username'], $_POST['password']);
        if ($query->execute()){
            alert('Registered');
            header('Location: login.php');
        }
        else
            alert('Error occuoured');
    } 
    else 
    {
        echo "<br>Error Fill all feilds<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <button type="submit" name="register">Register</button>
    </form>
</body>

</html>