<?php
 session_start();

// get database connection   
$host = "localhost";
$db_name = "patients";
$username = "root";
$password = "960500";
$conn;

// header('location:Loginform.php');

 

try {
  $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
  	$username = htmlspecialchars($_POST['pat_username']);
  	$hospital = htmlspecialchars($_POST['hos_username']);
  	$doctor= htmlspecialchars($_POST['doc_username']);
	$disease= htmlspecialchars($_POST['disease']);
	$sdot= htmlspecialchars($_POST['sdot']);
	$dot= htmlspecialchars($_POST['dot']);
  

  $query = "SELECT * FROM $username";
    // prepare query statement
  $stmt = $conn->prepare($query);
    // sanitize
//  $username=htmlspecialchars(strip_tags($username));
    // bind values
//  $stmt->bindParam(":username", $username);
    // execute query
  $stmt->execute();
  if($stmt->rowCount() > 0){
    	  $query="INSERT INTO $username  (pat_username,hos_username,doc_name,disease,s_date,duration) VALUES (:pat,:hos,:doc,:dis,:dte,:dur)";
	  $stmt = $conn->prepare($query);
//			  $stmt->bindParam(":name", $name);
	  $username=htmlspecialchars(strip_tags($username));
	  $hospital=htmlspecialchars(strip_tags($hospital));
	  $doctor=htmlspecialchars(strip_tags($doctor));
	  $disease=htmlspecialchars($disease);
	  $sdot=htmlspecialchars(strip_tags($sdot));
	  $dot=htmlspecialchars(strip_tags($dot));
	  
	  $username=strip_tags($username);
	  $hospital=strip_tags($hospital);
	  $doctor=strip_tags($doctor);
	  $disease=strip_tags($disease);
	  $sdot=strip_tags($sdot);
	  $dot=strip_tags($dot);
	  
	  $stmt->bindParam(":pat", $username);
	  $stmt->bindParam(":hos", $hospital);
	  $stmt->bindParam(":doc", $doctor);
	  $stmt->bindParam(":dis", $disease);
	  $stmt->bindParam(":dte", $sdot);
	  $stmt->bindParam(":dur", $dot);
	  
			  $stmt->execute();
	  if($stmt->rowCount() >0){
		  	echo "<script>alert('Data updated Succesfully')</script>";
		    echo "<script>location.href='welcome_hos.php'</script>";
	  
			  }
	  else{
		  echo "<script>alert('Something went wrong')</script>";
		  echo "<script>location.href='welcome_hos.php'</script>";
	  }
		
		}
	else{
		echo "<script>alert('There is no  data base alloted for given user.')</script>";
		echo "<script>alert('Please first create first data base.')</script>";
		echo "<script>alert('Click on Create button! To create data base ')</script>";
		echo "<script>location.href='welcome_hos.php'</script>";
	}
	    
}
catch(PDOException $e) {
//    echo "Error: " . $e->getMessage();
	 header("location:welcome_hos.php");
}
  ?>