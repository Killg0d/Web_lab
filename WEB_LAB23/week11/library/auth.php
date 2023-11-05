<?php
session_start();
if(!isset($_SESSION["username"])){
    include "alert.php";
alert('First Login',"login.php");
exit(); }
?>
