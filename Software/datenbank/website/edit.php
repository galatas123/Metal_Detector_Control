<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
    header("location: index.php");
    exit;
}
include('config.php');
if (isset($_GET['ID']) && isset($_GET['table']))
{
    $table = $_GET['table'];
    $_SESSION['table'] = $table;
    $ID=$_GET['ID'];
    $sql="SELECT * FROM {$table} WHERE ID='$ID'";
    $res= mysqli_query($link, $sql);
    $row= mysqli_fetch_array($res);
}
if(isset($_POST['newPersonalnummer']))
{
  $ID = $_POST['ID'];
  $table=$_POST['table'];
  $_SESSION['table'] = $table;
  $newPers_ID=$_POST['newPersonalnummer'];
  $newName=$_POST['newName'];
  $newNachname=$_POST['newNachname'];
  $newKartennummer=$_POST['newKartennummer'];
  $Rechte=$_POST['newRechte'];
  $newLocked = (is_null($_POST['Sperrstatus']))? 0 : 1;
  $sql ="UPDATE $table SET Pers_ID ='$newPers_ID', Name='$newName', Lastname='$newNachname', Card_ID='$newKartennummer', Locked = '$newLocked', Permission = '$Rechte' WHERE ID ='$ID'";
  $run = mysqli_query($link, $sql);
  $run_eingang = mysqli_query($link_eingang, $sql);
  if($run && $run_eingang)
  {
    mysqli_close($link);
    mysqli_close($link_eingang);
    header("refresh:2; url=$table.php");
    echo "<font size=6><b>Mitarbeiter ist erfolgreich bearbeitet</font></b>";
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
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="button.css" />
    <title>Edit user</title>
</head>
<body>
    <h1 class="header" align="center">
        Edit
    </h1>
    <form action="edit.php" class="label" method="POST">
        Name: <input type="text" name="newName" value="<?= $row['Name']; ?>" /><br />
        Nachname: <input type="text" name="newNachname" value="<?= $row['Lastname']; ?>" /><br />
        Personalnummer: <input type="text" name="newPersonalnummer" value="<?= $row['Pers_ID']; ?>" /><br />
        Kartennummer: <input type="text" name="newKartennummer" value="<?= $row['Card_ID']; ?>" /><br />
        Gesperrt: <input type="checkbox" name="Sperrstatus" value = "<?= $row['Locked']; ?>"
            <?php if ($row['Locked'] == 1) {?> checked <?php } ?> name="newLocked"/><br />
        <?php
        if ($row['Permission'] != "Super User") { ?>
            Rechte: <select class="classic" name="newRechte" id="newRechte" value = "<?= $row['Permission']; ?>">
            <option hidden selected value=<?= $row['Permission']; ?>> <?= $row['Permission']; ?> </option>
            <option value="Mitarbeiter">Mitarbeiter</option>
            <option value="Teamleiter">Teamleiter</option>
            <option value="Admin">Admin</option>
            </select>
        <?php } 
        else {?>
            <input type="hidden" name="newRechte" value="<?= $row['Permission']; ?>" />
        <?php } ?>
        <input type="hidden" name="ID" value="<?= $row['ID']; ?>" />
        <input type="hidden" name="table" value="<?= $table; ?>" /><br />
        <input class="myButton" type="submit" value="Update" />
        <a class="myButton" href="<?=$table;?>.php">zurück</a>
    </form>
</body>
</html>
