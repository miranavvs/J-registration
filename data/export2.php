<?php
 require_once('data/dbconfig.php');

if(isset($_POST['export'])){

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=data.csv');
  $output = fopen('php://output', 'w');
  fputcsv($output,array('Id','Name','Email','Sexe','Job','Naissance','pass','BeginAt'));
  $stmp = $db_con->prepare('SELECT  * FROM tbl_users ORDER BY user_id ASC');
  $stmp->execute();
  while($row = $stmp->fetch(PDO::FETCH_ASSOC))
  {
  	fputcsv($output,$row);
  }
  fclose($output);
  
}