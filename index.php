<?php
  session_start();
  if(isset($_SESSION['user_session'])){
    header("Location:home.php");  
  }
?>
<?php require_once('common/header.php'); ?>

 <?php include_once('common/navbar.php'); ?>
        
  <div class="signin-form">
      <div class="container">             
        <form class="form-signin" method="post" id="login-form" action="">
        
          <h2 class="form-signin-heading">Log In to WebApp.</h2><hr />
          
          <div id="error">
            <!-- error will be shown here ! -->
          </div>
          
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
            <span id="check-e"></span>
          </div>
          
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
          </div>
        
          <hr/>
          
          <div class="form-group text-center">
            <button type="submit" class="btn btn-default btn-lg" name="btn-login" id="btn-login">
              <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
            </button> 
          </div>  
          <div class="">I have not an acount  <a href="register.php">Create Now</a></div>
        
        </form>
        
      </div>    
      
  </div>

 <?php require_once('common/footer.php'); ?>
 <script type="text/javascript" src="script/script-login.js"></script>
  