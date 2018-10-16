<?php
include_once'data/dbconfig.php';


if(isset($_POST["import"])){

    $filename=$_FILES["file"]["tmp_name"];		
   
       if($_FILES["file"]["size"] > 0)
       {
            $file = fopen($filename, "a+");
            while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
            {	    
             //It wiil insert a row to our subject table from our csv file`
              $sql = $db_con->prepare("INSERT into tbl_users (`user_name`, `user_email`,`sexe`,`user_job`, `user_naiss`,`user_password`) 
                   values(:uname, :uemail, :usexe, :ujob, :unaiss, :upassword)");
                $sql->binParam(':uname',$emapData[1] );
                $sql->binParam(':uemail',$emapData[2] );
                $sql->binParam(':usexe',$emapData[3] );
                $sql->binParam(':ujob',$emapData[4] );
                $sql->binParam(':unaiss',$emapData[5] );
                $sql->binParam(':upassword',$emapData[6]);
                
           //we are using mysql_query function. it returns a resource on true else False on error
             $sql->execute();
               if(! $result )
               {
                   echo "<script type=\"text/javascript\">
                           alert(\"Invalid File:Please Upload CSV File.\");
                           window.location = \"data-list.php\"
                       </script>";				
               }
            }
            fclose($file);
            //throws a message if data successfully imported to mysql database from excel file
            echo "<script type=\"text/javascript\">
                       alert(\"CSV File has been successfully Imported.\");
                       window.location = \"data-list.php\"
                   </script>";	        			 
            //close of connection
        $conn->close();						 				
       }
   }	
   header('location: data-list.php'); 

?>
   



