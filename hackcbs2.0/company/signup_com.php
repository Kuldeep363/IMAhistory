<?php
 session_start();

// get database connection   
$host = "localhost";
$db_name = "users";
$username = "root";
$password = "960500";
$conn;

// header('location:Loginform.php');

 

try {
  $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
  $username = htmlspecialchars($_POST['username']);
  $password = base64_encode($_POST['password']);
  $password2= base64_encode($_POST['password2']);
  

  $query = "SELECT * FROM company  WHERE com_username=:username";
    // prepare query statement
  $stmt = $conn->prepare($query);
    // sanitize
  $id=htmlspecialchars(strip_tags($username));
    // bind values
  $stmt->bindParam(":username", $username);
    // execute query
  $stmt->execute();
  if($stmt->rowCount() > 0){
      echo "<script>alert('Username not  available')</script>";
      echo "<script>location.href='Loginform_com.php'</script>";
	  
    
}
else{
  if($password2==$password){
    $query = "INSERT INTO company (com_username,com_pass) VALUES (:username,:pass)";
    
    // prepare query
    $stmt = $conn->prepare($query);

    // sanitize
    $username=htmlspecialchars(strip_tags($username));
    $password=htmlspecialchars(strip_tags($password));
    

    // bind values
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pass", $password);
    
    $count=$stmt->execute();
    // echo $count;
    // execute query
    if($count){
            $_SESSION['username']=$_POST['username'];
    $_SESSION['pass']=$_POST['password'];
    echo "<script> alert('Account created succesfully')</script>";
    echo "<script>location.href='registration_com.php'</script>";

  }
  // echo 'signup last';
  else{
     header('location:Loginform_com.php');
  }
  
 
}
	else{
    echo "<script> alert('Both the passwords are not same!!') </script>";
     echo "<script>location.href='Loginform_com.php'</script>";
	}
  }
}
catch(PDOException $e)
  {
    // echo "Error: " . $e->getMessage();
    echo '<br>connection error';
	
    header('location:Loginform_com.php');
  }
  ?>