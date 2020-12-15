<?php  $postId=$_GET['postId']; ?>
<?php 
	// $postId = $_GET['id'];
	$postId = $_GET['postId'];
	require("displayLikes.php");
	?>

<script>

$(document).ready(function(){
  $('#like').submit(function() {

  	$.ajax({
  		type : 'POST',
  		url : "likePost.php",
  		data : {
			post_id : '<?php echo $postId; ?>'
  		},
  		dataType : 'json',
  		success : function(result){
  		if(result.success) {
  			$('#demo').html('<div style=color:green>'+ result.message +'</div>');
  			window.location.href="";
  		}else{
  			$('#demo').html('<div style=color:red>**'+result.message+'</div>');
  		}
  	}
  });
  return false;
});
});
</script>
