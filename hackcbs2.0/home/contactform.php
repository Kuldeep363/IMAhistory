<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d081420e73.js"></script>
    <title>Document</title>

    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'> 
	<link href="https://fonts.googleapis.com/css?family=Chilanka&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <style>
		body,html{
			height: 100%;
			background: linear-gradient(347deg, rgba(61,144,219,1) 0%, rgba(207,103,207,1) 100%);
			overflow: hidden;
		}
		form{
			background-color: #FAEBD7;
			box-shadow: 3px 3px 10px 0px #5F51B0;
			width: 60%!important;
			border: none!important;
			border-radius: 5px!important;
		}
		.ml-3{
			margin-left: 4rem!important;
		}
		input,textarea{
		width: 90%!important;
		}	
		input{
			border:none!important;
			border-radius: 30px!important;
			background: rgba(17,17,17,0.10)!important;
		}
		textarea{
			border: none!important;
			border-radius: 10px;
		}
		.btn,#spin{
			background: rgba(40,39,237,1.00)!important;
			border: none!important;
			border-radius: 15px!important;
			box-shadow: 3px 3px 12px 0px #8F8D8D!important;
			transition: all 0.4s ease-in!important;

		}
		.btn:hover{
			background: rgba(44,8,137,1.00)!important;
		}
		.btn:focus{
			box-shadow: 3px 3px 12px 0px #8F8D8D!important;
			outline:none!important;
		}
		#spin{
			display:none;
		}
	</style>
</head>
<body>
<div class="container">
<form action="./contact.php" method="post" class="mt-3">
				<div class="form-group">	
					<label for="name" class="form-label ml-1">Name</label>
					<input type="text" id="name" class="form-control ml-1" name="name" requied>
				</div>
				
				<div class="form-group mt-2">	
					<label for="mail" class="form-label ml-1">Email</label>
					<input type="email" id="mail" class="form-control ml-1" name="mail"  required>
				</div>
				<div class="form-group mt-2">	
					<label for="mob" class="form-label ml-1">Mobile Number</label>
					<input type="tel" id="mob" class="form-control ml-1" name="mob" pattern="[0-9]{10}" required>
				</div>
				<div class="form-group">	
					<textarea name="text"  class="ml-1 form-control" cols="150" rows="5" placeholder="Enter your message"></textarea>
				</div>
				<input type="submit" class="btn btn-primary w-100 mb-2" id="submit" value="Submit" onclick="load()">
				<button class="btn btn-primary w-100 mb-2"  type="submit" id="spin">
					<span class="spinner-grow spinner-grow-sm"></span>Submitting...
				</button>
			</form>
</div>
<script>
		function load(){
			document.getElementById("spin").style.display="block";
			document.getElementById("submit").style.display="none";
		}
	</script>
</body>
</html>