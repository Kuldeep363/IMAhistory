<?php
session_start();

if(isset($_SESSION['username'])){
    
    echo '

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

        <title>Edit information</title>

        <link rel="stylesheet prefetch" href="https://fonts.googleapis.com/css?family=Open+Sans:600"> 
        <link rel="icon" href= "../images/images (1).png">
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
                margin-top:10%;
                display:none;
            }
            .ml-3{
                margin-left: 4rem!important;
            }
            input,textarea{
            width: 100%!important;
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
            .d-flex .btn,.spin{
                background: rgba(40,39,237,1.00)!important;
                border: none!important;
                border-radius: 15px!important;
                width:100%!important;
                box-shadow: 3px 3px 12px 0px #111683!important;
                transition: all 0.4s ease-in!important;

            }
            
            .d-flex .btn:hover{
                background: rgba(37,3,67,1.00)!important;
				box-shadow: 10px 10px 12px 0px #101B4F!important;
				transform:scale(1.1);
            }
            .btn:focus{
                box-shadow: 3px 3px 12px 0px #8F8D8D!important;
                outline:none!important;
            }
            #spin1,#spin2,#spin3{
                display:none;
            }
            .btn-warning{
				border:none;
				box-shadow:5px 5px 10px #000000;
				width:20%!important;
				transition:all .5s ease-in!important;
			}
			.btn-warning:hover{
				width:30%!important;
				box-shadow:10px 10px 10px #000000;
				border-radius:15px!important;
			}
            
        </style>
        <script>
		var s=0;
		var sta=0;
		var st=0;
        function pass(){
			
			if(s==0){
                document.getElementById("passwordform").style.display="block";
				document.getElementById("ageform").style.display="none";
				document.getElementById("addressform").style.display="none";
				s=1;
				}
			else{
				document.getElementById("passwordform").style.display="none";
				document.getElementById("ageform").style.display="none";
				document.getElementById("addressform").style.display="none";
				s=0;
			}
            }
		
            function age(){
			
			if(st==0){
                document.getElementById("ageform").style.display="block";
				document.getElementById("passwordform").style.display="none";
				document.getElementById("addressform").style.display="none";
				st=1;
				}
			else{
				document.getElementById("ageform").style.display="none";
				document.getElementById("passwordform").style.display="none";
				document.getElementById("addressform").style.display="none";
				st=0;
			}
            }
			
            function address(){
			
			if(sta==0){
                document.getElementById("addressform").style.display="block";
				document.getElementById("passwordform").style.display="none";
				document.getElementById("ageform").style.display="none";
				sta=1;
				}
				else{
					document.getElementById("addressform").style.display="none";
				document.getElementById("passwordform").style.display="none";
				document.getElementById("ageform").style.display="none";
				sta=0;
				}
				}
            function load(input){
                if(input==1){
                    document.getElementById("spin1").style.display="block";
                    document.getElementById("submit1").style.display="none";
                }
                else if(input==2){
                    document.getElementById("spin2").style.display="block";
                    document.getElementById("submit2").style.display="none";
                }
                else{
                    document.getElementById("spin3").style.display="block";
                    document.getElementById("submit3").style.display="none";
                }
            }
        </script>
    </head>
    <body>
        <div class="container mt-5 d-flex justify-content-center">
		<!-- change password -->
                <div class="ml-3"><button class="btn  btn-primary" onclick="pass()">Change Password</button></div>
                
                <form action="edditpassword_pat.php" method="POST" class="  justify-content-center" id="passwordform">
                    <div  class="mt-2 d-flex justify-content-center">
                        <div style="width:90%;">
                        <div class="form-group">	
                            <label for="password" class="form-label ml-1">Password</label>
                            <input type="password" id="password" class="form-control ml-1" name="password" required>
                        </div>
                        <input type="submit" class="btn btn-primary  mb-2" id="submit3"  value="Submit" onclick="load(3)">
                        <button class="btn btn-primary  mb-2 " id="spin3" type="submit">
                            <span class="spinner-grow spinner-grow-sm"></span>Submitting...
                        </button>
                        </div>
                    </div>
                </form>
                <!-- change Age -->
                <div class="ml-3"><button class="btn   btn-primary" onclick="age()">Change Age</button></div>
                <form action="editage_pat.php" method="POST"  id="ageform">
                    <div  class="mt-2 d-flex   justify-content-center">
                    <div style="width:90%;">
                        <div class="form-group" >	
                            <label for="age" class="form-label ml-1">Age</label>
                            <input type="number" id="age" class="form-control ml-1" name="age" max="120" min="1" required>
                        </div>
                        <input type="submit" class="btn btn-primary  mb-2 " id="submit1"  value="Submit" onclick="load(1)">
                        <button class="btn btn-primary  mb-2 " id="spin1"  type="submit" >
                            <span class="spinner-grow spinner-grow-sm"></span>Submitting...
                        </button>
                        </div>
                    </div>
                </form>

                <!-- change Address -->
                <div class="ml-3"><button class="btn   btn-primary" onclick="address()">Change Address</button></div>
                
            <form action="editaddress_pat.php" method="POST" class="  justify-content-center" id="addressform">
                <div  class="mt-2 d-flex justify-content-center">
                    <div style="width:90%;">
                    <div class="form-group" >	
                        <textarea  class="form-control ml-1" name="address" cols="150" rows="5" placeholder="Enter your address" required ></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary  mb-2 " id="submit2"  value="Submit" onclick="load(2)">
                    <button class="btn btn-primary  mb-2 " id="spin2"  type="submit" >
                        <span class="spinner-grow spinner-grow-sm"></span>Submitting...
                    </button>
                    </div>
                </div>
            </form>
            </div>
        <div class="container text-center mt-5">
			<a href="welcome_pat.php" target="_self"><button class="btn btn-warning mt-2">Back</button></a>
		</div>

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

header('location:Loginform_pat.php');

}
    



?>