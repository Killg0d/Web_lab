<?php
include 'alert.php';
$host="localhost";
$username="root";
$password="";
$db_name="library";
$mysqli=new mysqli($host,$username,$password,$db_name);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
    }
else
    echo "<script>console.log('connection successful')</script>";

?>