<?php
session_start();

if(isset($_SESSION['username'])){
   
    
// $result = $conn->query($sql);
   echo '<!DOCTYPE html> 
    <html>
        <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
        <title>Welcome</title>
    
        <link rel="icon" href="../images/images.png">
        <link href="https://fonts.googleapis.com/css?family=Chilanka&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
        </head>
        <body style="background-color:#b5b6df">
            <h1 class="text-center text-capitalize text-success">Welcome to IMA</h1>
            <p class="container d-flex justify-content-center" style="font-weight:bold"><em>It is very difficult to track a patient’s medical history, especially in cases when
            he/she changes cities, doctors, etc. Having precise knowledge about a patient
            beforehand can drastically improve how the patient’s treatment is done. Doctors will be
            able to forecast future symptoms that might occur to a patient by tracking down his/her
            medical history. Not only doctors but other different clients such as Medical Insurance
            companies can also view the patient’s medical history.</em><p>
            <div class="container d-flex justify-content-between">
            
            <div class="ml-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 text-start"><a href="./edit_pat.php" target="_self"><button class="btn btn-warning">Edit</button></a></div>
            <div style="font-size:30px;color:blue" class="text-center   ml-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 ">Hello!! '.$_SESSION["username"].'</div>
            <div class="text-center ml-5 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12"><button class="btn btn-primary"><a href="logout.php" class="text-decoration-none text-light">LogOut</a></button></div>
            
            </div>
         
    
			<div class="mt-4 d-flex justify-content-center">
			<form action="show_pat1.php" method=POST>
			<input type="text" name="username" value='.$_SESSION["username"].' style="display:none">
			
			<button class="btn btn-success" type="submit">Check history</button>
			<div>
        </body>
    </html>';
}


else{
    // session_destroy();
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

header('location:Loginform_pat.php');

}
?>
