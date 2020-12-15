<?php require("db.php");
      // select all from likes where like postid is in likes table
	$likes = mysqli_query($con, "SELECT * FROM likes where post_id= $postId  ORDER BY id ASC");


	while($rot = mysqli_fetch_assoc($likes)){
          //display the name of user who like the post
			echo "<p style='font-size:10px;'>" . $rot['name'] . "</p>";

	}
?>
