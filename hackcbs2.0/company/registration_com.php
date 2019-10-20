<?php  
session_start();
// header('location:Loginform.php');

if(isset($_SESSION['username'])){

echo
'
<!DOCTYPE html>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d081420e73.js"></script>
        <title>Registration form</title>
    <link rel="stylesheet prefetch" href="https://fonts.googleapis.com/css?family=Open+Sans:600"> 
    <link rel="icon" href="../images/login.jpg">
    <link href="https://fonts.googleapis.com/css?family=Chilanka&display=swap" rel="stylesheet">
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
			width:90%!important;
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
		.formbody{
			width:90%;
		}
	</style>
    </head>
    <body>
	 <div class="container ">
    
			<form action="./registrationinsert_com.php" method="post" class="ml-3 ">
				<div class="form-group">	
					<label for="username" class="form-label ml-1">Username</label>
					<input type="text" id="username" class="form-control ml-1" name="username" value= '.$_SESSION["username"].' readonly>
				</div>
				<div class="form-group">	
					<label for="comname" class="form-label ml-1">Company name</label>
					<input type="text" id="comname" class="form-control ml-1" name="comname" required>
				</div>
				
				<div class="form-group mt-2">	
					<label for="mail" class="form-label ml-1">Email</label>
					<input type="email" id="mail" class="form-control ml-1" name="mail"  required>
                </div>
                
				<div class="form-group mt-2">	
					<label for="mob" class="form-label ml-1">Telephone Number</label>
					<input type="tel" id="mob" class="form-control ml-1" name="mob" pattern="[0-9]{7}" required>
                </div>
                
				<div class="form-group">	
					<textarea name="address" id="address" class="ml-1 form-control" cols="150" rows="5" placeholder="Enter your address"></textarea>
                </div>
                
				<input type="submit" class="btn btn-primary  mb-2" id="submit" value="Submit" onclick="load()">
				<button class="btn btn-primary  mb-2"  type="submit" id="spin">
					<span class="spinner-grow spinner-grow-sm"></span>Submitting...
				</button>
				</div>
			</form>
		
	</div>
	<script>
		function load(){
			document.getElementById("spin").style.display="block";
			document.getElementById("submit").style.display="none";
		}
	</script>
    </body>  
</html>';
	}
	else{
		$_SESSION = array();

		// If it's desired to kill the session, also delete the session cookie.
		// Note: This will destroy the session, and not just the session data!
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
			);
		}
		
		// Finally, destroy the session.
		session_destroy();
		
		header('location:Loginform_com.php');
	}

?>