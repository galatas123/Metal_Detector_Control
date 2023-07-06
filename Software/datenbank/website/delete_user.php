<?php
  include("config.php");
  $delete_id=$_GET['ID'];
  $table=$_GET["table"];
  if($table == "Access"){
    $delete_query="delete from {$table} WHERE Card_ID='$delete_id'";
  }
  elseif($table == "Website"){
    $delete_query="delete from {$table} WHERE ID='$delete_id'";
  }
  $run=mysqli_query($link, $delete_query);
  $run_eingang = mysqli_query($link_eingang, $delete_query);
  if($run)
  {
   mysqli_close($link);
   mysqli_close($link_eingang);
   header("refresh:2; url=$table.php");
   echo "<font size=6><b>Erforlgreich gelöscht</font></b>";
   exit;
  }
  else
  {
   mysqli_close($link);
   mysqli_close($link_eingang)
   header("refresh:2; url=$table.php");
   echo "<font size=6><b>Ein Fehler ist aufgetretten, Kontakt Administrator</font></b>";
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   exit;
  }
?>