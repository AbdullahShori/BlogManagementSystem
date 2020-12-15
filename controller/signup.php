<?php 
include "init.php";

if (isset($_SESSION['id'])){
  
     header("location:../view/profile.php");
}

// assign values 
if (isset($_POST['signup'])){
   
   $data = [

          'name'             => $_POST['full_name'],
          'email'            => $_POST['email'],
          'password'         => $_POST['password'],
          'confirm_password' => $_POST['confirm'],
          'name_error'       => '',
          'email_error'      => '',
          'password_error'   => '',
          'confirm_error'    => ''

   ];
   

   /*
        * Name validation
   */ 
    if (empty($data['name'])){

        $data['name_error'] = "Name is required";

   } 
   

   /*
       * Email validation
   */ 
   if (empty($data['email'])){

        $data['email_error'] = "Email is required";

   } else {

    if ($source->Query("SELECT * FROM users WHERE email = ?", [$data['email']])){

      if ($source->CountRows() > 0 ){

        $data['email_error'] = "Sorry email is already exist";
      }
    }
   }

   /*
        * Password validations
   */ 

     if (empty($data['password'])){

        $data['password_error'] = "Password is required";

     } else if (strlen($data['password']) < 5){

      $data['password_error'] = "Password is too short";
    }

   /*
       * Confirm password validations
   */ 

    if (empty($data['confirm_password'])){

        $data['confirm_error'] = "Confirm password is required";

   } else if ($data['password'] != $data['confirm_password']){

        $data['confirm_error'] = "Confirm password is not matched";
   }

   /*
        * Submit the form
   */ 

      if (empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_error']))
   {
        $password = password_hash($data['password'], PASSWORD_DEFAULT);

           if ($source->Query("INSERT INTO users (name,email,password) VALUES (?,?,?)", [$data['name'], $data['email'], $password]))
     {
                  $_SESSION['account_created'] = "Your account is successfully created";

                   header("location:../view/profile.php");
     }

   }



}


 ?>

