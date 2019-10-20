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
  $name=$_POST['username'];
$query = "CREATE TABLE $name 
		  (pat_username INT(100)  AUTO_INCREMENT PRIMARY KEY,hos_username VARCHAR(200) NOT NULL,doc_name VARCHAR(200) NOT NULL,disease VARCHAR(50),sdot DATE,dot INT(12)";
	 $conn->exec($query);
	
	echo "<script>alert('Data Base created successfully')</script>";
		echo "<script>location.href='welcome_hos.php'</script>";
////	$conn->query("DESCRIBE :name");
//  $query = ("DESCRIBE :name");
//    // prepare query statement
//  $stmt=$conn->prepare($query);
//    // sanitize
//  $name=htmlspecialchars(strip_tags($name));
//    // bind values
//  $stmt->bindParam(":name", $name);
//    // execute query
//  $stmt->execute();
//	echo "1";
//  $conn->query("SELECT 1 FROM $name LIMIT 1");
		
		
	
//	$username=$_POST['username'];
		 
	
//		else{
//		  echo "<script>alert('Something went wrong')</script>";
//		  echo "<script>location.href='welcome_hos.php'</script>";
//		}
	
	    
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
	echo "<script>alert('Data base already exist.')</script>";
	    echo "<script>alert('Click on update button button to update data.')</script>";
		echo "<script>location.href='welcome_hos.php'</script>";		
    // use exec() because no results are returned
//    if($stmt->execute()){
    	
//	
//	else{
//		echo "<script>alert('!!ERROR!!')</script>";
//		echo "<script>location.href='welcome_hos.php'</script>";
//	}
//	 header("location:welcome_hos.php");
}
  ?>