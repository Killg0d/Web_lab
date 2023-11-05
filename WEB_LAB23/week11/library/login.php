<?php
session_start();
if(isset($_POST['login'])){
    if($_POST['username']!=''){
        include 'conn.php';
        $query=$mysqli->prepare('select * from users where username=? and password =?');
        $query->bind_param('ss',$_POST['username'],$_POST['password']);
        $query->execute();
        $result=$query->get_result();
        $rows=$result->num_rows;//gets count of row
        if($rows==1){
            if(!$_SESSION['username']){
            $_SESSION['username']=$_POST['username'];
            alert($_SESSION['username']);
            }
            header('Location: index.php');
        }
        else{
            echo "<div class='form'>
            <h3>Username/password is incorrect.</h3>
            <br/>Click here to <a href='login.php'>Login</a>
        </div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <button type="submit" name="login">Login</button>
    </form>
</body>

</html>