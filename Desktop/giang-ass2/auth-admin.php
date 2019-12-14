<?php
session_start();


$html = "<script>console.log('PHP: ${_SESSION["username"]}');</script>";

echo($html);

if(!isset($_SESSION["username"]) || $_SESSION["username"] != 'admin'){
header("Location: login.php");
exit(); }
?>