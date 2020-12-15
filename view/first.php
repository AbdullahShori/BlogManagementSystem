<?php  require_once '../controller/signup.php' ?>
<!DOCTYPE html>
<html>
<head>

<title>Singup Form</title>
<link rel="stylesheet" href="../controller/login.css">
</head>
<body>

    <div class="wrapper">
         <!---this form move into the second.php file where user enter his created account to access to the website  -->
      <form action="second.php" method="POST" class="form-signin">

            <h3 class="form-signin-heading">Sign Up</h3>
            <input type="text" name="full_name" class="form-control" placeholder="Enter Name..." value="<?php if(!empty($data['name'])): echo $data['name']; endif;?>">

          <div class="error">
              <!---if username box is empty in form it display error message -->
                  <?php if(!empty($data['name_error'])): ?>
                  <?php echo $data['name_error']; ?>
                  <?php endif; ?>

          </div>
   
    
        <input type="email" name="email" class="form-control" placeholder="Enter Email.." value="<?php if(!empty($data['email'])): echo $data['email']; endif; ?>">

          <div class ="error">

            <!---if email box is empty in form it display error message -->
                <?php if (!empty ($data['email_error']) ): ?>
                <?php echo $data['email_error']; ?>
                <?php endif; ?>

          </div>
    

        <input type="password" name="password" class="form-control" placeholder="Create Password..." value="<?php if(!empty($data['password'])): echo $data['password']; endif; ?>">
      
          <div class="error">

             <!---if password box is empty in form it display error message -->
                <?php if(!empty($data['password_error'])): ?>
                <?php echo $data['password_error']; ?>
                <?php endif; ?>

          </div>



        <input type="password" name="confirm" class="form-control" placeholder="Confirm Password..." value="<?php if(!empty($data['confirm_password'])): echo $data['confirm_password']; endif; ?>">
     
          <div class="error">

                  <!---if confirm password box is empty it display error message -->
                  <?php if(!empty($data['confirm_error'])): ?>
                  <?php echo $data['confirm_error']; ?>
                  <?php endif; ?>

          </div>
          
     
        <input type="submit" name="signup" class="btn btn-lg btn-primary btn-block" value="Create account">
         <!---if user account is already created this link move to second.php file  -->
        <a href="../view/second.php" class="link">Already have an account ?</a>
  
      </form>

    </div>

</body>
</html>