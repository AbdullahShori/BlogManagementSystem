<?php include "../controller/init.php"; ?>
<!---when id is set it move the user to his profile   -->
<?php if(isset($_SESSION['id'])): ?>
<?php header("location:../view/profile.php"); ?>
<?php endif; ?>
  
<?php 
// it POST the email and password 
if (isset ($_POST['login']) ){

      $data = [
            'email'           => $_POST['email'],

            'password'       => $_POST['password'],

            'email_error'    => '',

            'password_error' => '',

          ];
      //email verify
    if (empty($data['email'])){
  
        $data['email_error'] = "Email is required<br>";

      }
    //password verify
    if (empty($data['password'])){
 
        $data['password_error'] = "Password is required";

      }

      // this check email and password don't contain any error 
      if(empty($data['email_error']) && empty($data['password_error'])){

           if($source->Query("SELECT * FROM users WHERE email = ?", [$data['email']])){
   
                if($source->CountRows() > 0){
   
                        $row = $source->Single();
                        $id = $row->id;
                        $db_password = $row->password;
                        $name = $row->name;


                        // it verify the password is in database or not 
                            if(password_verify($data['password'], $db_password)){

                                    $_SESSION['login_success'] = "Hi ".$name . " You are successfully login";

                                    $_SESSION['id'] = $id;

                                    $_SESSION['name'] = $name;

                                    header("location:../view/profile.php");

                              } 
                              // when password is not match
                              else {
                                    $data['password_error'] = "Please enter correct password";
                              }

                } 
                // it display error message when email is not exist
          else {
              $data['email_error'] = "Please enter correct email";
    }

  }

 }

}
?>
<!DOCTYPE html>
<html>
<head>

 
 <title>Singup Form</title>

	<link rel="stylesheet" type="text/css" href="../controller/login.css">

</head>
<body>

<dive class="wrapper">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"   class="form-signin">
	 
	 <?php 
        
	  if(isset($_SESSION['account_created'])):?>
	  
          <div class="success">
	 
	    <?php echo $_SESSION['account_created']; ?>
          
        <?php endif; ?>
	 
	  <?php unset($_SESSION['account_created']); ?>

   
   <h3 class="form-signin-heading">User Login</h3>

      <input type="email" name="email" class="form-control" placeholder="Enter Email.." value="<?php if(!empty($data['email'])): echo $data['email']; endif;?>">
		     
		<div class="error">
				  <?php if(!empty($data['email_error'])): ?>
				
			    <?php echo $data['email_error']; ?>
			    
      		  <?php endif; ?>
    

      <input type="password" name="password" class="form-control" placeholder="Create Password..." value="<?php if(!empty($data['password'])): echo $data['password']; endif;?>">
	     
		<div class="error">

			  <?php if(!empty($data['password_error'])): ?>
				
			    <?php echo $data['password_error']; ?>
			    
      		  <?php endif; ?>
      </div>
  
 
     <div class="group m20">

    		  <input type="submit" name="login" class="btn btn-lg btn-primary btn-block" value="Login &rarr;">
     </div>
     
 

    </form>

 </dive>
 <a href="../view/first.php" class="link">Create new account ?</a>     

</body>
</html>