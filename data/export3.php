<?php

include_once("dbconfig.php");


$statement = $db_con->prepare('SELECT  * FROM tbl_users ORDER BY user_id ASC');
$statement->execute();
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
$count = count($rows);
//Setup the filename that our CSV will have when it is downloaded.
$fileName = 'users.csv';
//Set the Content-Type and Content-Disposition headers to force the download.
header('Content-Type: application/excel');
header('Content-Disposition: attachment; filename="' . $fileName . '"');  
//Get the column names.
//  $columnNames = array();
 if($count!==0){
     //We only need to loop through the first row of our result
     //in order to collate the column names.
     $firstRow = $rows[0];
     foreach($firstRow as $colName => $val){
         $columnNames[] = $colName;
     }
 }


 //Open up a file pointer
 $fp = fopen('php://output', 'w');  
 //Start off by writing the column names to the file.
     fputcsv($fp, $columnNames);
  //Then, loop through the rows and write them to the CSV file.
 foreach ($rows as $row) {
     fputcsv($fp, $row);
 }  
 //Close the file pointer.
 fclose($fp);
 exit; 
?>

