<?php require_once('common/header.php'); ?>
<?php include_once('common/navbar.php'); ?>

<div class="signin-form">
	<div class="container">               
       <form class="form-signin" method="post" id="register-form">
      
        <h2 class="form-signin-heading">Sign Up here</h2><hr/>
        
        <div id="error">
          <!-- error will be showen here ! -->
        </div>
        
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" />
        </div>
        
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />
          <span id="check-e"></span>
        </div>

        <div class="form-group">                         
          <select name="gender" class="form-control">
            <option value="">--Select Gender--</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>                               
        </div>

        <div class="form-group">                         
          <select name="job" class="form-control">
            <option value="">--Select job--</option>
            <option value="secretary">Secretary</option>
            <option value="emplyé">Eployé</option>
            <option value="body-guard">Body gard</option>
            <option value="driver">Driver</option>
          </select>                               
        </div>

       <div class = "form-group">
          <input type="date" class="datepicker form-control" name="dob" id="dob" placeholder="Birthdate YYYY-MM-DD ">
       </div>      		

        <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
        </div>
         
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Retype Password" name="cpassword" id="cpassword" />
        </div>
     	<hr/>
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-save" id="btn-submit">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
			</button> 
        </div>  
        <div id="getlog"><a href="index.php"> connect now !</a></div>
      
      </form>

  </div>
    
</div>

<?php require_once('common/footer.php'); ?>
<script src="script/script-register.js"></script>
