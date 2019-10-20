<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d081420e73.js"></script>

   
  <title>Sign In</title>
  
  
   <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'> 
   <link rel="stylesheet" href="../login_css.css">
	<link rel="icon" href= "../images/login.jpg">
	<link href="https://fonts.googleapis.com/css?family=Chilanka&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    

</head>
<body>
	<div>
    <a href="../home/login/login.php" target="_self">Go To Main Login Page</a>
</div>
  <div class="login-wrap">
    
    
  <div class="login-html">
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
    <div class="login-form">
      <form class="sign-in-htm" action="./login_pat.php" method="POST">
       
        <div class="group form-group">
          <label for="useridin" class="col-form-label label">Username</label>
          <input id="useridin" name="useridin" type="text" class="form-input input" required>
		  <small id="usernameerror" class="form-text text-light">We don't share your login details with third party</small>
        </div>
        <div class="group form-group">
          <label for="passwordlog" class="label">Password</label>
          <input id="passwordlog" name="passwordlog" type="password" class="input" data-type="password" required>
		  <!-- <small id="usernameerror" class="form-text text-light"></small> -->
        </div>
        <div class="group">
          <input id="check" type="checkbox" class="check" checked>
          <label for="check"><span class="icon"></span> Keep me Signed in</label>
        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign In">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <a href="../forget.php">Forgot Password?</a>
        </div>
      </form>
      <form class="sign-up-htm" action="./signup_pat.php" method="POST">
        <div class="group form-group">
          <label for="username" class="label">Username</label>
          <input id="username" name="username" type="text" class="input" required>
		  <small id="usernameerror" class="form-text text-light">We don't share your login details with third party</small>
        </div>
        
        <div class="group form-group">
          <label for="password" class="label">Password</label>
          <input id="password" name="password" type="password" class="input" data-type="password" required>
		  <small id="usernameerror" class="form-text text-light">Always choose strong password</small>

        </div>
        <div class="group form-group">
          <label for="pass" class="label">Confirm Password</label>
          <input id="pass" type="password" name="password2" class="input" data-type="password" required>
		  <small id="usernameerror" class="form-text text-light">Enter same password to signup successfully</small>

        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign Up" >
        </div>
        <div class="hr mb-5"></div>
        <div class="foot-lnk">
          <label for="tab-1">Already Member?</a>
        </div>
      </form>
    </div>
  </div>
</div>
  

</body>
</html>