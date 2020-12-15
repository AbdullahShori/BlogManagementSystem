<!---db.php make connection with database-->
<?php include "db.php"; ?>
<?php include "init.php"; ?>
<?php if(!isset($_SESSION['id'])): ?>

<?php endif; ?>
<?php ; ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Profile</title>
     <link rel="stylesheet" href="">
     <link rel="stylesheet" href="">
     <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
        <div class="contain">
            <?php if ( isset($_SESSION['login_success'])): ?>
                <div class="success">

                     <?php echo $_SESSION['login_success']; ?>

                </div>

            <?php endif; ?>
            <?php unset($_SESSION['login_success']); ?>

                      <!---it display the name of user who are currently login -->
                    <h2 style="color:blue;">Welcome <?php echo "<span>".$_SESSION['name']."</span>" ?> to our social network</h2><hr>
                    <a class="ttt" href="logout.php">logout</a>



        </div>

</body>
</html>





