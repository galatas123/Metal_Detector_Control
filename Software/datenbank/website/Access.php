<?php
session_start();
if((!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true)){
  header("location: portal.php");
  exit;
}
$access = $_SESSION['access'];
$table= "Access";
?>
<html>  
<head lang="en">  
<meta charset="UTF-8">  
<link type="text/css" rel="stylesheet" href="button.css">
<link type="text/css" rel="stylesheet" href="bootstrap.css"> <!--css file link in bootstrap folder-->  
<title>Drehkreuz Zugang</title>  
</head>   
<?php
include("config.php");
$view_users_query = "SELECT * FROM Access";
$run = mysqli_query($link, $view_users_query);

$rows = mysqli_fetch_all($run, MYSQLI_ASSOC);
?>
<body>  
    <div class="table-scrol">
        <h1 align="center">
            Drehkreuz Zugang
        </h1>
        <p>
            <a class="myButton" href="insert_to_table.php?table=<?= $table?>">Mitarbeiter einfügen</a>
            <a class="myButton" href="extract_Excel.php?table=<?= $table?>">Export Excel</a>
            <a class="myButton" href="portal.php">zurück</a>
            <a class="myButton" href="logout.php">Log out</a>
            <a class="myButton" href="import_excel.php?table=<?= $table?>">Excel Einfügen</a>
        </p>
        <input type="text" class="myInput" id="myInput" onkeyup="filter()" placeholder="Suchen..." />
        <div class="datagrid">
            <table class="datagrid" id="myTable">
                <thead>
                    <tr>
                        <th>Personalnummer</th>
                        <th>Kartenummer</th>
                        <th>Name</th>
                        <th>Nachname</th>
                        <th>Rechte</th>
                        <th>Löschen</th>
                        <th>Bearbeiten</th>
                    </tr>
                </thead>
                <?php foreach ($rows as $row) {
                    $Mitarbeiter_ID = $row['Pers_ID'];
                    $Crypt_ID = $row['Card_ID'];
                    $Name = $row['Name'];
                    $Nachname = $row['Lastname'];
                    $Rechte = $row['Permission'];
                    $format = ($i++ % 2 == 0) ? "alt" : "alt2";
                ?>
                <tr class="<?=$format;?>">
                    <td><?=$Mitarbeiter_ID;?></td>
                    <td><?=$Crypt_ID;?></td>
                    <td><?=$Name;?></td>
                    <td><?=$Nachname;?></td>
                    <td><?=$Rechte;?></td>
                    <td>
                        <a href="delete_user.php?ID=<?=$Crypt_ID ?>&table=<?=$table?>">
                            <button class="btn btn-danger" <?= ($Rechte == "Super User" && $access != "Super User") ? 'disabled' : '' ?>>Löschen</button>
                        </a>
                    </td>
                    <td>
                        <a href="edit.php?ID=<?=$row['ID']?>&table=<?=$table?>">Bearbeiten</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
<script>
function filter() {
    // Get the input element and its value
    var input = document.getElementById("myInput");
    var filter = input.value.toUpperCase();

    // Get the table and all its rows
    var table = document.getElementById("myTable");
    var rows = table.getElementsByTagName("tr");

    // Loop through all the rows and hide those that don't match the search query
    for (var i = 1; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td");
        var matchFound = false;
        for (var j = 0; j < cells.length; j++) {
            var cellText = cells[j].textContent.toUpperCase();
            if (cellText.indexOf(filter) > -1) {
                matchFound = true;
                break;
            }
        }
        if (matchFound) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}
</script> 
</body>      
</html>  