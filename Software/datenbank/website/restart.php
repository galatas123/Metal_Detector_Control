<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
    header("location: index.php");
    exit;
    }
header("refresh:2; url=portal.php");
echo "<font size=6><b>Raspberry wird neugestartet</font></b>";
echo '<pre>';
system("(sleep 2 ; sudo /sbin/reboot ) > /dev/null 2>&1 & $!");
echo '</pre>';
exit;
?>