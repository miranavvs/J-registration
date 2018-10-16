<?php
	
require_once 'dbconfig.php';

if($_POST)
{
		$user_name = $_POST['user_name'];
		$user_email = $_POST['user_email'];
		$user_sexe = $_POST['gender'];
		$user_job = $_POST['job'];
		$user_naiss = $_POST['dob'];
		$user_password = $_POST['password'];	
		$password = md5($user_password);
		$datej = date('Y-m-d H:i:s');
		$joining_date = $datej;	
		
		try
		{	
		
			$stmt = $db_con->prepare("SELECT * FROM tbl_users WHERE user_email=:uemail");
			$stmt->execute(array(":uemail"=>$user_email));
			$count = $stmt->rowCount();
			
			if($count==0){
				
			$stmt = $db_con->prepare("INSERT INTO tbl_users (user_name,user_email,sexe,user_job,user_naiss,user_password,joining_date) VALUES (:uname, :uemail, :usexe, :ujob, :unaiss, :upass, :ujdate)");
			$stmt->bindParam(":uname",$user_name);
			$stmt->bindParam(":uemail",$user_email);
			$stmt->bindParam(":usexe",$user_sexe);
			$stmt->bindParam(":ujob",$user_job);
			$stmt->bindParam(":unaiss",$user_naiss);
			$stmt->bindParam(":upass",$password);
			$stmt->bindParam(":ujdate",$joining_date);
			/*$stmt->execute(array(':uname'=>$user_name,':uemail'=>$user_email,':usexe'=>$user_sexe,':ujob'=>$user_job,':unaiss'=>$user_naiss,':upass'=>$password,':ujdate'=>$joining_date));*/			
				if($stmt->execute())
				{
					echo "registered";
				}
				else
				{
					echo "Query could not execute !";
				}
			
			}
			else{
				
				echo "1"; //  not available
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
}

?>