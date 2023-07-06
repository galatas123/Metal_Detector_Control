<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
    header("location: index.php");
    exit;
    }
include('config.php');
$SQL = "SELECT * FROM Settings WHERE ID = 1";
$run = mysqli_query($link, $SQL);
$row= mysqli_fetch_array($run);
$LockPercent = $row["Lock_percent"];
$Hupe = ($row['Hupe'] == 1)? "Ja" : "Nein";
$Logs = ($row['excelLogs'] == 1)? "Ja" : "Nein";
if(isset($_POST['Sperrprozent']))
{
  $Hupe = $_POST['Hupe'];
  $LockPercent = $_POST['Sperrprozent'];
  $Logs = $_POST['excelLogs'];
  $sql ="UPDATE Settings SET Lock_percent = $LockPercent, Hupe = $Hupe, excelLogs = $Logs WHERE ID = 1";
  $run = mysqli_query($link, $sql);
  if($run)
  {
    header("refresh:2; url=Settings.php");
    echo "<font size=6><b>Einstellungen sind gespeichert</font></b>";
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
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="button.css" />
    <link type="text/css" rel="stylesheet" href="bootstrap.css">
    <title>Einstellungen</title>
</head>
<body>
    <h1 align="center">
        Einstellungen
    </h1>
    <h4>Raspberry muss neugestartet werden, damit die Einstellungen übernohmen werden können</h4> <br/>
    <form action="Settings.php" class="label" method="POST">
    	Sperrprozent  <input type="text" name="Sperrprozent" id="Sperrprozent" value="<?= $row['Lock_percent']; ?>"/>
            <img class="icon" src="/images/info_icon.png" alt="Info" title="Prozentuale Sperrung des Drehkreuzes einstellen">
            <br /> <br/>
        Hupe: <select class="classic" name="Hupe" id="Hupe" value = "<?= $row['Hupe']; ?>">
            <option hidden selected value=<?= $row['Hupe']; ?>> <?= $Hupe; ?> </option>
            <option value=1>Ja</option>
            <option value=0>Nein</option>
            </select>
            <img class="icon" src="/images/info_icon.png" alt="Info" title="wenn jemand gesperrt wird, ertönt für 0,5 Sekunden ein Hupton">
            <br/><br/>
        Excel Logs  <select class="classic" name="excelLogs" id="excelLogs" value = "<?= $row['excelLogs']; ?>">
            <option hidden selected value=<?= $row['excelLogs']; ?>> <?= $Logs; ?> </option>
            <option value=1>Ja</option>
            <option value=0>Nein</option>
            </select>
            <img class="icon" src="/images/info_icon.png" alt="Info" title="Die Logs werden lokal auf dem Raspberry unter /home/Grover/logs.xlsx gespeichert.">
            <br/><br/>
        <input class="myButton" type="submit" value="Update"/>
        <a class="myButton" href="portal.php">zurück</a>
        <a class="myButton" href="restart.php" 
        onclick="return confirm('Während den Neustart wird das Drehkreuz nicht funktionieren \n Wollen Sie trotzdem fortfahren?')">
        Raspberry Neustart</a>
    </form>
</body>
</html>
