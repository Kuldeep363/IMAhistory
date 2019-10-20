<?php
session_start();

if(isset($_SESSION['username'])){
	
   echo '<!DOCTYPE html> 
    <html>
        <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!--        <script src="https://kit.fontawesome.com/d081420e73.js"></script>  -->
    
        <title>Welcome</title>
    
        <link rel="icon" href="../images/images.png">
        <link href="https://fonts.googleapis.com/css?family=Chilanka&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
        <style>
        body{
            background-color:#72a6ba;
        }
		form{
                background-color: #FAEBD7;
                box-shadow: 3px 3px 10px 0px #5F51B0;
/*                width: 60%!important;*/
                border: none!important;
                border-radius: 5px!important;
/*                margin-top:10%;*/
/*                display:none;*/
            }
		 .spin,#check1,#check2,#check3{
                background: rgba(40,39,237,1.00)!important;
                border: none!important;
                border-radius: 15px!important;
                width:40%!important;
                box-shadow: 3px 3px 12px 0px #111683!important;
                transition: all 0.4s ease-in!important;

            }
		 #check1:hover,#check2:hover,#check3:hover{
                background: rgba(37,3,67,1.00)!important;
				box-shadow: 10px 10px 12px 0px #101B4F!important;
				
            }
            .btn:focus{
                box-shadow: 3px 3px 12px 0px #8F8D8D!important;
                outline:none!important;
            }
            #spin1,#spin2{
                display:none;
            }
	</style>
	<script>
//		function check(){
//			document.getElementById("addressform").style.display="block"
//			document.getElementById("check").style.display="none"
//		}
		 function load(input){
                if(input==2){
                    document.getElementById("spin2").style.display="block";
                    document.getElementById("submit2").style.display="none";
                }
			 else{
                    document.getElementById("spin1").style.display="block";
                    document.getElementById("submit1").style.display="none";
                }
		 }
	</script>
        </head>
        <body>
            <h1 class="text-center text-capitalize text-danger">Welcome to IMA</h1>
            <p class="container" style="font-weight:bold"><em>It is very difficult to track a patient’s medical history, especially in cases when
            he/she changes cities, doctors, etc. Having precise knowledge about a patient
            beforehand can drastically improve how the patient’s treatment is done. Doctors will be
            able to forecast future symptoms that might occur to a patient by tracking down his/her
            medical history. Not only doctors but other different clients such as Medical Insurance
            companies can also view the patient’s medical history.<em><p>
            
            <div class="text-center mb-5 mr-5 d-flex justify-content-end"><a href="logout.php" class="text-decoration-none text-light"><button class="btn btn-danger">LogOut</button></a></div>
			
            <div class="container mt-5" >
    <div >
        	
    <div style="margin-left:20%">
    <div>
	<a  href="#" data-toggle="modal" data-target="#checkform">
		<button class="btn btn-primary" id="check1" >
			 Check
	</button></a>
	</div>
    </div>
	
<!-- check form --->

	<div class="modal" id="checkform">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title font-italic font-weight-bold text-info" >Check Medical History</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        

        <div class="modal-body">
			<form action="show_med_pat.php" method="POST" class="mt-5 justify-content-center" id="addressform">
                <div  class="mt-2 d-flex justify-content-center">
                    <div style="width:90%;">
                    <div class="form-group" >
						<label for="username">Username</label>
                        <input type="text" class="form-control ml-1 mt-3" id="username" name="username"  placeholder="Enter " required >
                    </div>
                    <input type="submit" class="btn btn-primary  mb-2 " id="submit2"  value="Submit" onclick="load(2)">
                    <button class="btn btn-primary  mb-2 " id="spin2"  type="submit" >
                        <span class="spinner-grow spinner-grow-sm"></span>Submitting...
                    </button>
                    </div>
                </div>
            </form>
        </div>
        

        <div class="modal-footer">
          <p class="text-danger">Indian Medical Association</p>
        </div>
        
      </div>
    </div>
  </div>
	
	</div>
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

header('location:Loginform_hos.php');

}
?>
