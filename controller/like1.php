

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
<title>Comment Box</title>
<style>
	.likes {
		display: flex;
    width: 400px;
    background-color: cornflowerblue;
    align-items: center;
    justify-content: space-around;
	}
</style>
</head>
<body style="background-color: white">
<div id="demo"></div>
<form name="form"  id="like" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            
            <button type="submit" name="submit" class="button" style="outline: none;border:none;">Like Post</button></br>
        </form>
        