<?php
session_start();
$table=$_GET['table'];
$_SESSION['table'] = $table;
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true)
{
    header("location: portal.php");
    exit;
}
require_once 'vendor/autoload.php';
include("config.php");
use PhpOffice\PhpSpreadsheet\IOFactory;
if (isset($_POST['import'])) 
{
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $spreadsheet = IOFactory::load($file_tmp);
    $worksheet = $spreadsheet->getActiveSheet();
    $rows = $worksheet->toArray();

    for ($i = 1; $i < count($rows); $i++) 
    {
        $columns = $rows[$i];
        $sql = ("INSERT INTO Access (Pers_ID, Card_ID, Name, Lastname, Locked, Logged, Logins, Permission) VALUES ('$columns[0]', $columns[1], '$columns[2]', '$columns[3]', 0,
        0, 0, '$columns[4]')");
        $run = mysqli_query($link, $sql);
        $run_eingang = mysqli_query($link_eingang, $sql);
        if($run && $run_eingang)
        {
            continue;
        }
        else
        {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        mysqli_close($link);
        mysqli_close($link_eingang);
    }
    header("refresh:2; url={$table}.php");
    echo "<font size=6><b>$Rechte ist erfolgreich eingetragen</font></b>";
    exit;
}
?>

<html>
<head>
    <title>Import Excel File</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="import" value="Import">
    </form>
</body>
</html>
