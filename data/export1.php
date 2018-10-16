<?php
// including the config file
include('data/dbconfig.php');

if(ISSET($_POST['export'])){
    // set headers to force download on csv format
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=user.csv');

	// we initialize the output with the headers
	$output = "id,name,email,sexe,job,naissance,password,joining\n";

	// select all members
	$sql = 'SELECT * FROM tbl_users ORDER BY user_id ASC';
	$query = $db_con->prepare($sql);
	$query->execute();

	$req = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach ($req as $res) {
		    // add new row 
		    $output .= $res['user_id'].",".$res['user_name'].",".$res['user_email'].",".$res['sexe'].",".$res['user_job'].",".$res['user_naiss'].",".$res['user_password'].",".$res['joining_date']."\n";
		}
	// export the output
	echo $output;
	exit;
}

?>  