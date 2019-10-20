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
  $firstname = $_POST['firstname'];
  $lastname =$_POST['lastname']; 
  $age=$_POST['age'];
  $email=$_POST['mail'];
  $adress=$_POST['address'];
  $gender=$_POST['gender'];
  $mob=$_POST['mob'];
  $username=$_POST['username'];
	// echo $username;
  $query = "UPDATE  patient SET `pat_firstname`=:firstname,`pat_lastname`=:lastname,`pat_age`=:age,`pat_email`=:email,`pat_address`=:adress,`pat_gender`=:gender,`pat_mob`=:mob
  WHERE `pat_username`=:username";
    // prepare query statement
  $stmt = $conn->prepare($query);
    // sanitize
  	$firstname=strip_tags($firstname);
  	$lastname=strip_tags($lastname);
  	$age=strip_tags($age);
    $email=strip_tags($email);
    $adress=strip_tags($adress);
    $gender=strip_tags($gender);
    $mob=strip_tags($mob);
    $username=strip_tags($username);
      // bind valuesj
  	$stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":age", $age);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":adress", $adress);
    $stmt->bindParam(":gender", $gender);
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
      <tr><td><strong>First Name</strong></td><td>:".$firstname."</td></tr>
      <tr><td><strong>Last Name</strong></td><td>:".$lastname."</td></tr>
      <tr><td><strong>Email</strong></td><td>:".$email."</td></tr>
      <tr><td><strong>Mobile Number</strong></td><td>:".$mob."</td></tr>
      <tr><td><strong>Age</strong></td><td>:".$age."</td></tr>
      <tr><td><strong>Gender</strong></td><td>:".$gender."</td></tr>
      <tr><td><strong>Address</strong></td><td>:".$adress."</td></tr></table><br>
      Login anytime to check your medical history<br>
      Thank you  (-_-)
      </body></html>";

      $headers="From:kuldeep363rawat@gmail.com". "\r\n" .
      'Reply-To: kuldeep363rawat@gmail.com' . "\r\n".
      'Content-type: text/html; charset=iso-8859-1';

      if(mail($to,$sub,$text,$headers)){
      echo "<script> alert('Registered succesfully!')</script>";
      echo "<script> alert('All your details sent to your registerd email address!')</script>";
      echo "<script> alert(' You have to login to continue')</script>";
      echo "<script>location.href='Loginform_pat.php'</script>";
    }
    else{
      echo "<script> alert('Registered succesfully!')</script>";
      echo "<script> alert('But your details not sent to your registerd email address!')</script>";
      echo "<script>location.href='Loginform_pat.php'</script>";
    }
   
    
}
else{
  echo 'There is some error';
  header('location:Loginform_pat.php');

  }
}
catch(PDOException $e)
  {
    // echo "Error: " . $e->getMessage();
    // echo '<br>connection error';
	// $_SESSION['Login']="Something went wrong";
   header('location:Loginform_pat.php');
  }
  ?>