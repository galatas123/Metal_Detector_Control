<?php
session_start();
$table=$_GET['table'];
$_SESSION['table'] = $table;
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true)
{
    header("location: portal.php");
    exit;
}
include("config.php");
if (isset($_POST["Mitarbeiter_ID"]))
{
    $table=$_GET['table'];
    $_SESSION['table'] = $table;
    $Mitarbeiter_ID = mysqli_real_escape_string($link, $_POST['Mitarbeiter_ID']);
    $Name = mysqli_real_escape_string($link, $_POST['name']);
    $Nachname = mysqli_real_escape_string($link, $_POST['nachname']);
    $Crypt_ID = mysqli_real_escape_string($link, $_POST['crypt_ID']);
    $Rechte = mysqli_real_escape_string($link, $_POST['Rechte']);
    $sql = "INSERT INTO Access (Pers_ID, Card_ID, Name, Lastname, Locked, Logged, Logins, Permission)
        VALUES ('$Mitarbeiter_ID', '$Crypt_ID', '$Name', '$Nachname', 0, 0, 0, '$Rechte')";
    $run = mysqli_query($link, $sql);
    $run_eingang = mysqli_query($link_eingang, $sql);
    if($run)
    {
        mysqli_close($link);
        mysqli_close($link_eingang);
        header("refresh:2; url={$table}.php");
        echo "<font size=6><b>$Rechte ist erfolgreich eingetragen</font></b>";
        mysqli_close($link);
        mysqli_close($link_eingang)
        exit;
    }
    else
    {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    mysqli_close($link);
    mysqli_close($link_eingang)
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="button.css" />
    <meta charset="UTF-8" />
    <title>Hinfügen</title>
</head>
<body>
    <h1 class="header" align="center">
        Hinfügen
    </h1>
    <form name="insert" action="insert_to_table.php?table=<?= $table ?>" class="label" method="POST">
        Personalnummer: <input type="text" id="Mitarbeiter_ID" name="Mitarbeiter_ID" required /><br />
        Name: <input type="text" id="name" name="name" required /><br />
        Nachname: <input type="text" id="nachname" name="nachname" required /><br />
        Kartennummer: <input type="text" id="crypt_ID" name="crypt_ID" required /><br />
        Rechte: <select class="classic" name="Rechte" id="Rechte" required>
        <option hidden disabled selected value>Bitte wählen Sie eine Option</option>
        <option value="Mitarbeiter">Mitarbeiter</option>
        <option value="Teamleiter">Teamleiter</option>
        <option value="Admin">Admin</option>
        </select><br><br>
        <input class="myButton" type="submit" value="Eintragen" />
        <a class="myButton" href="<?=$table;?>.php">zurück</a>
    </form>
</body>
</html>