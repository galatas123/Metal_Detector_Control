<?php
include("config.php");  
$table = $_GET['table'];  //your_file_name
$file_ending = "xls";   //file_extention
header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");  
header("Content-Disposition: attachment; filename=$table.$file_ending");  
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t";
if ($table == "Website")
{
 $sql="SELECT Name, Lastname, Username, Permission FROM {$table}";
}
else
{
 $sql="SELECT Pers_ID, Card_ID, Name, Lastname, Logins, Permission FROM {$table}"; 
}
$resultt = $link->query($sql);
while ($property = mysqli_fetch_field($resultt)) { //fetch table field name
        echo $property->name."\t";
}

print("\n");    

while($row = mysqli_fetch_row($resultt))  //fetch_table_data
{
    $schema_insert = "";
    for($j=0; $j< mysqli_num_fields($resultt);$j++)
    {
        if(!isset($row[$j]))
            $schema_insert .= "NULL".$sep;
        elseif ($row[$j] != "")
            $schema_insert .= "$row[$j]".$sep;
        else
            $schema_insert .= "".$sep;
    }
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    $schema_insert = mb_convert_encoding($schema_insert, 'UTF-16LE', 'UTF-8');
    print(trim($schema_insert));
    print "\n";
    
}
?>