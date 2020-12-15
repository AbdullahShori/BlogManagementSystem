<?php include "init.php"; ?>

<?php if(isset($_SESSION['id'])): ?>

<?php header("location:../view/profile.php"); ?>

<?php endif; ?>
  
<?php 
if ( isset($_POST['login'])){

      $data = [
              'email'           => $_POST['email'],

              'password'       => $_POST['password'],

              'email_error'    => '',

              'password_error' => '',

        ];

          if ( empty($data['email'])){
  
              $data['email_error'] = "Email is required<br>";

 }

        if ( empty($data['password'])){
 
            $data['password_error'] = "Password is required";

 }


    if ( empty($data['email_error']) && empty($data['password_error'])){

       if ( $source->Query("SELECT * FROM users WHERE email = ?", [$data['email']])){
   
        if ($source->CountRows() > 0){
   
                $row = $source->Single();
                $id = $row->id;
                $db_password = $row->password;
                $name = $row->name;

                  if(password_verify($data['password'], $db_password)){
                          // when password is correct user is loged in
                          $_SESSION['login_success'] = "Hi ".$name . " You are successfully login";

                          $_SESSION['id'] = $id;

                          $_SESSION['name'] = $name;

                          header("location:../view/profile.php");

     } else {
              $data['password_error'] = "Please enter correct password";
     }
    } else {
              $data['email_error'] = "Please enter correct email";
    }
          echo "$name";
  

  }
 }

}
?>