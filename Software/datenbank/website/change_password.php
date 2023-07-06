<?php
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true)
{
    header("location: index.php");
    exit;
}
include('config.php');
$username = $_SESSION['username'];
$sql = "select * from Website where username = '$username'";
if (count($_POST) > 0)
{
    if ($_POST["newPassword"] != $_POST["confirmPassword"])
    {
        header( "refresh:2; url=change_password.php" );
        echo "Falsches Bestätigung Passwort eingegeben";
        exit;
    }
    $hashedPassword = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    if ((password_verify($_POST["currentPassword"], $row["Password"])) || ($_POST["currentPassword"] == $row["Password"]))
    {
        mysqli_query($link, "UPDATE Website set password='" . $hashedPassword . "' WHERE username= '$username'");
        $message = "Password würde geändert";
        header( "refresh:2; url=portal.php" );
    }
    else
        $message = "Falsch Aktuelles Passwort eingegeben";
}
?>

<html>
<head>
    <title>Login Passwort ändern</title>
    <link rel="stylesheet" type="text/css" href="button.css" />
</head>
<body>
    <form class="label" name="frmChange" method="post" action="">
        <div>
            <font size="35">
                <?php if(isset($message)) {echo $message;}?>
            </font>
        </div><br />
        Aktuelles Passwort: <input type="password" id="currentPassword" name="currentPassword" required /><br />
        Neues Passwort: <input type="password" id="newPassword" name="newPassword" required /><br />
        Passwort bestätigen: <input type="password" id="confirmPassword" name="confirmPassword" required /><br /><br />
        <input class="myButton" name="submit" type="submit" value="Bestätigen" />
        <a class="myButton" href="portal.php">zurück</a>
    </form>
</body>
</html>