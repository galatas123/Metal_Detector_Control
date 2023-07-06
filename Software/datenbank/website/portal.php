<?php
session_start();
$access = $_SESSION["access"];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="button.css" />
    <meta charset="UTF-8" />
    <title>Main portal</title>
    <style>
        .wrapper {
            position: absolute;
            top: 8%;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <a class="myButton" href="Access.php">Drehkreuz Zugang</a>
        <a class="myButton" href="Website.php">Website Admin Liste</a>
        <a class="myButton" href="change_password.php">Passwort ändern</a>
        <a class="myButton" href="logout.php">Log out</a>
    </div>
    <div class=ingramImage>
        <img src="/images/header-bg_1.png" />
    </div>
</body>
</html>