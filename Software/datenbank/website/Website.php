<?php
session_start();
if((!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true))
{
  header("location: portal.php");
  exit;
}
?>
<html>
<head lang="en">
 <meta charset="UTF-8">
 <link type="text/css" rel="stylesheet" href="button.css">
 <link type="text/css" rel="stylesheet" href="bootstrap.css">
 <title>Website Zugang</title>
</head>
<body>
 <?php $table = "Website"; ?>
 <div class="table-scrol">
  <h1 align="center">Website Zugang</h1>
  <p>
    <a class="myButton" href= "insertAdministrator.php">Webuser einfügen</a>
    <a class="myButton" href= "extract_Excel.php?table=<?= $table?>">Export Excel</a>
    <a class="myButton" href= "portal.php">zurück</a>
    <a class="myButton" href= "logout.php">Log out</a>
  </p>
  <div class="datagrid">
   <table class="datagrid" id="adminTable">
    <thead>
     <tr>
      <th>Name</th> 
      <th>Nachname</th>
      <th>Username</th>
      <th>Berechtigung</th>
      <th>Admin Löschen</th>
     </tr>
    </thead>
    <?php
    include("config.php");
    $rowcolor=1;
    $admin_query="select * from Website";
    $run=mysqli_query($link, $admin_query);
    while($row=mysqli_fetch_array($run))
    {
     $ID = $row[0];
     $Name=$row[1];
     $Nachname=$row[2];
     $Username=$row[3];
     $Rechte=$row[5];
     $rowcolor++;
     $format=($rowcolor%2==0)? "alt" : "alt2";
     echo "<tr class='$format'>"
     ?>
      <td><?= $Name;?></td>
      <td><?= $Nachname;?></td>
      <td><?= $Username;?></td>
      <td><?= $Rechte;?></td>
      <td><a href="delete_user.php?ID=<?= $ID ?> & table=<?= $table?>"><button class="btn btn-danger"
        <?php if ($Rechte == "Super User" && $access != "Super User") {?> disabled <?php } ?>
        >Löschen</button></a></td>
     </tr>
    <?php }  ?>
   </table>
  </div>
  </div>
  <div>
   <br><br><font size="4">Super Users können nur direkt in der Datenbank gelöscht werden.</font><br>
   <a href = "mailto: anil.ChikmetOglou@ingrammicro.com"><font size="4">Super User-Entfernungsantrag</font></a>
  </div>
</body>
</html>
       

