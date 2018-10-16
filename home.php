<?php
session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: index.php");
}
else if
(isset($_POST['logout'])){
  session_destroy();
  header('Location: index.php');
}


include_once 'data/dbconfig.php';

$stmt = $db_con->prepare("SELECT * FROM tbl_users WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<?php include_once('common/header.php'); ?>

<body>

 
  <?php 
  include 'common/navbar.php';
  ?>

  <div class="container">
    <div class='alert alert-success'>
      <button class='close' data-dismiss='alert'>&times;</button>
      Hello <strong> '<?php echo $row['user_name']; ?>'</strong>  Welcome to the members page.
    </div>
  </div>
 <a href ="index.php" type="subtmit" name="logout">deconnecter</a>

 

<?php include_once('common/footer.php'); ?>