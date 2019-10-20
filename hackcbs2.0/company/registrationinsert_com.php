<?php
 session_start();
// header('location:Loginform.php');

// get database connection   
$host = "localhost";
$db_name = "users";
$username = "root";
$password = "960500";
$conn;

 
 

try {
  $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
  $comname = $_POST['comname'];
//   $lastname =$_POST['lastname']; 
//   $age=$_POST['age'];
  $email=$_POST['mail'];
  $adress=$_POST['address'];
//   $gender=$_POST['gender'];
  $mob=$_POST['mob'];
  $username=$_POST['username'];
	// echo $username;
  $query = "UPDATE  company SET `com_name`=:firstname,`com_email`=:email,`com_address`=:adress,`com_contact`=:mob
  WHERE `com_username`=:username";
    // prepare query statement
  $stmt = $conn->prepare($query);
    // sanitize
  	$comname=strip_tags($comname);
  	// $lastname=strip_tags($lastname);
  	// $age=strip_tags($age);
    $email=strip_tags($email);
    $adress=strip_tags($adress);
    // $gender=strip_tags($gender);
    $mob=strip_tags($mob);
    $username=strip_tags($username);
      // bind valuesj
  	$stmt->bindParam(":firstname", $comname);
    // $stmt->bindParam(":lastname", $lastname);
    // $stmt->bindParam(":age", $age);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":adress", $adress);
    // $stmt->bindParam(":gender", $gender);
    $stmt->bindParam(":mob", $mob);
    $stmt->bindParam(":username", $username);
      // execute query
  $stmt->execute();
  if($stmt->rowCount() > 0){
//	  header('location:loginform.php');
    //  echo "Updated successfull<br>";
	  // $_SESSION['errorid']='Username not available';
    $userInput=$username;
    
      $to=$email;
      $sub="Registered successfully";
      $text="<html><body>Hi <strong>".$userInput."</strong><br> Your account created succesfully
      Now you can login anytime to use the features of website<br>These are your login details:".
      "<table>
      <th><td colspan='2'><h3>Login Details</h3></td></th>
      <tr><td><strong>Username</strong></td><td>:".$userInput."</td></tr>
      <tr><td><strong>Password</strong></td><td>:".$_SESSION['pass']."</td></tr>
      <tr><td><strong>company Name</strong></td><td>:".$comname."</td></tr>
       
      <tr><td><strong>Email</strong></td><td>:".$email."</td></tr>
      <tr><td><strong>Mobile Number</strong></td><td>:".$mob."</td></tr>
      
      
      <tr><td><strong>Address</strong></td><td>:".$adress."</td></tr></table><br>
      Login anytime to verify the medical history of our clients<br>
      Thank you  (-_-)
      </body></html>";

      $headers="From:kuldeep363rawat@gmail.com". "\r\n" .
      'Reply-To: kuldeep363rawat@gmail.com' . "\r\n".
      'Content-type: text/html; charset=iso-8859-1';

      if(mail($to,$sub,$text,$headers)){
      echo "<script> alert('Registered succesfully!')</script>";
      echo "<script> alert('All your details sent to your registerd email address!')</script>";
      echo "<script> alert(' You have to login to continue')</script>";
      echo "<script>location.href='Loginform_com.php'</script>";
    }
    else{
      echo "<script> alert('Registered succesfully!')</script>";
      echo "<script> alert('But your details not sent to your registerd email address!')</script>";
		echo "<script>location.href='Loginform_com.php'</script>";
    }
   
    
}
else{
  echo 'There is some error';
  header('location:Loginform_com.php');

  }
}
catch(PDOException $e)
  {
    // echo "Error: " . $e->getMessage();
    echo '<br>connection error';
	// $_SESSION['Login']="Something went wrong";
   header('location:Loginform_com.php');
  }
  ?>