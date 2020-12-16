<!--- include db.php file that is in controler folder-->
<!--- db.php file make connection with database -->
<?php include "../controller/db.php"; ?>
<?php if(!isset($_SESSION['id'])): ?>
<?php endif; ?>
<?php ; ?>

<!DOCTYPE html>
<html>
<head>
<style>

#img_div{
   padding: 5px;
}

#img_div:after{
   content: "";
   display: block;
   clear: both;
}

.img {
    float:right;
    position:center;
    margin-left: 350px;
    margin-bottom:20px;
    max-width: 100%;
    height: auto;
    border: 1px solid #d4d2d2;
    padding: 0px;
    border-radius: 5px;
}

.imge{
    height: 20px;
    max-width: 100%;
}

.p{
    margin-left: 50px;
    margin-top:10px;
    }

.tip{
    background-color: #efefef;
    padding: 10px;
    border-radius: 23px;
    margin-bottom: -15px;
    }

.h{
    background-color: #33b4ff;
    padding: 10px;
    border-radius: 23px;
    }

.h4{
    margin-left:50px;
    margin-top:10px;
    }

.t {
    padding: 10px;
    border-radius: 0px;
    list-style-type: none;
    text-decoration: none;
    margin-left: 28px;
    margin-bottom: 8px;
    margin-top: 5px;
}

.tt {
    padding: 10px;
    border-radius: 0px;
    list-style-type: none;
    text-decoration: none;
    margin-left: 10px;
    margin-bottom: 20px;
    margin-top: 5px;
}

</style>


<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!---  ---------->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
        
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>


</head>
      <body>  
         <nav class="navbar navbar-light bg-white">

                <span><img style="height:60px;max-width:100%;" class="imgen navbar-brand" src="logo-2.png"></span> 

         </nav>


    <div class="container-fluid gedf-wrapper">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">

                            <!--- name.php file display the name of the user who are currently login in the site -->
                             <?php require_once "../controller/name.php"; ?>


                    </div>
                </div>
            </div>
            <div class="col-md-6 gedf-main">

                <div class="card gedf-card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <div>
                                <div class="form-group">
                                    <div class="">

                                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  enctype="multipart/form-data" required>
                                            <input type="file" name="image" class="custom-file-input" id="customFile"required>
                                            <label class="custom-file-label" for="customFile">Upload image</label>
                                            <textarea class="form-control" id="message" rows="3" name="image_text" placeholder="What are you thinking?"required></textarea>
                                            <button type="submit" name="upload" class="btn btn-primary">share</button>
                                            </form>
                                        
                                    </div>
                                </div>
                            </div>

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">

                            </div>
                        
                        </div>
                        <?php
                                // Make connection with database
 
                                $db = mysqli_connect("localhost", "root", "", "login");

 
                                 $msg = "";
                                 // if uploade button is press then the data of form is paste here

                                 if (isset ($_POST['upload']) ) {
  
  	                                $image = $_FILES['image']['name'];
  
                            	    $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  
                            	    $target = "../controller/images/".basename($image);
                                    $name = $_SESSION['name'];
                                    $sql = "INSERT INTO post (username,image, image_text) VALUES ('$name','$image','$image_text')";
                                    mysqli_query($db, $sql);
                                    
                                      
                                        //Security check, Make sure that image upload or not
                                        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

                                                 $msg = "Image uploaded successfully";
                                        
                                        }
                                         else   
                                        {

                                            $msg = "Failed to upload image";

                                        }       
                                    
                                }

                                         // Select all data from post table in descending order
                                        $result = mysqli_query ($db, "SELECT * FROM post ORDER BY id DESC");
  
                        ?>
    
                    </div>
                </div>

                <!--- Display the of username at the top -->

                <div class="card gedf-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                </div>

                                <div class="ml-2">

                                    <!--- Display the name of the user who are currently login in the site -->
                                    <div class="h5 m-0"><?php echo "<span>".$_SESSION['name']."</span>" ?></div>
                                    <div class="h7 text-muted">Available</div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                    <?php $comments = mysqli_query($db, "SELECT * FROM comments"); ?>

                                <!--- fetch data from post table and display it-->
                        <?php
                                    
                                    while ($row = mysqli_fetch_array($result))
                                    {
                                    echo "<div id='img_divv'>";
                                    echo '<hr>';


                                    //Display the usename who upload the picture
                                    echo "<h4 class='h4'>". $row['username'] . "</h4>";
                                    echo '<hr>';


                                    // Display the caption above the image
                                    echo  "<p class='p'>" . $row['image_text']."</p>";
                                    echo '<hr>';


                                    // Display the uploaded image
                                    echo "<img class='img', src='../controller/images/".$row['image']."' />";
                                    
                                    $postId = $row['id'];
                                    echo '<a  class="t"  href="../controller/like.php?postId='.$postId.'"><i class="far fa-thumbs-up"></i></a>';

                                    echo '<a class="tt" href="../controller/indexx.php?postId='.$postId.'"><i class="far fa-comment"></i></a>';
                                    
                                    }
                             
                                    
                        ?>
                    </div>
                </div>



            </div>
          
            <div class="col-md-3">

            </div>
        </div>
    </div>

<script>

if ( window.history.replaceState ) {

window.history.replaceState( null, null, window.location.href );
}

</script>
