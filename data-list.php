<?php 
// session_start();
// if(!isset($_SESSION['user_session']))
// {
//  header("Location: index.php");
// }
  require_once('data/dbconfig.php');

?>

<?php
  require_once('common/header.php');
  include_once('common/navbar.php'); 
?>

<div class= "container" style="margin-top: 100px;">
    <div class="card text-dark bg-ligth mb-3" style="max-width: 100%;">
        <div class="card-header">Header</div>
        <div class="card-body">
          <h5 class="card-title">UPLOAD CSV DATA HERE</h5>    
            
            <form class="form-horizontal" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">    
              <div class="form-group">                
                  <input class="btn btn-sm btn-success" type="file" name="csv-file">
                  </div>   
                  <div class="form-group">                 
                    <input class="btn btn-default btn-sm" type="submit" name="import" value="Télécharger">
                            
              </div>
            </form>
            <a href = "data/export3.php"><button class="btn btn-default btn-sm">Export-excel</button></a> 
        </div>
    </div>


    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <?php 
        $stmp = $db_con->prepare("SELECT * FROM tbl_users ORDER BY user_id ASC");  
        $stmp->execute();          	                
        ?>
                  <thead>
                    <tr>              
                      <th>id</th>
                      <th>Name</th>
                      <th>E-mail</th>
                      <th>Sexe</th>
                      <th>job</th>
                      <th>Naissance</th>
                      <th>beginAt</th>
                    </tr>
                  </thead>
                  <tbody>
                          <?php while($donne = $stmp->fetch()){
                          ?>
                    <tr>
                      <td><?php echo $donne['user_id'];?></td>
                        <td><?php echo $donne['user_name'];?></td>
                        <td><?php echo $donne['user_email'];?></td>
                        <td><?php echo $donne['sexe'];?></td>
                        <td><?php echo $donne['user_job'];?></td>
                        <td><?php echo $donne['user_naiss'];?></td>
                        <td><?php echo $donne['joining_date'];?></td>
                    </tr>  
                        <?php } ?>
                        <?php $stmp->closeCursor();?>            
                      </tbody>
              </table>
        </div> 
</div> 



<?php include_once('common/footer.php');?>