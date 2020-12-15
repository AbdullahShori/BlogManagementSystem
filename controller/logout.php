<?php 
// it destroy the session value
session_start();
session_destroy();
// when session destroy it move the user to second.php file where user again login
header("location:second.php");

 ?>