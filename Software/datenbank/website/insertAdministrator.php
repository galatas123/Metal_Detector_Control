<?php
session_start();
if((!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true))
{
    header("location: index.php");
    exit;
}
if (isset($_POST["name"]))
{
    include("config.php");
    $name=$_POST["name"];
    $nachname=$_POST["nachname"];
    $benutzername=$_POST["benutzername"];
    $passwort=password_hash($_POST["passwort"], PASSWORD_DEFAULT);
    $Access=$_POST["access"];
    $sql="INSERT INTO Website (Name, Lastname, Username, Password, Permission) VALUES ('$name', '$nachname','$benutzername', '$passwort', '$Access')";
    if(mysqli_query($link, $sql))
    {
        header( "refresh:2; url=Website.php" );
        echo "<font size=6><b>Webuser ist erfolgreich eingetragen</font></b>";
        exit;
    }
    else
    {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link type="text/css" rel="stylesheet" href="button.css">
<title>Webuser Einfügen</title>
</head>
<body>
<h1 class="header" align="center">
  Webuser Hinfügen
</h1>
<form name="insert" action="insertAdministrator.php" class="label" method="POST">
Name: <input type="text" id="name" name="name" required><br><br>
Nachname: <input type="text" id="nachname" name="nachname" required><br><br>
Benutzername: <input type="text" id="benutzername" name="benutzername" required><br><br>
Passwort: <input type="password" id="passwort" name="passwort" required><br><br>
Rechte: <select class="classic" name="access" id="access" required>
        <option hidden disabled selected value>Bitte wählen Sie eine Option</option>
        <option value="Admin">Admin </option>
        <option value="Super User">Super User</option>
        </select><br><br>
<input class="myButton" type="submit" value="Eintragen">
<a class="myButton" href= "Website.php">zurück</a>
</form>
</body>
</html>