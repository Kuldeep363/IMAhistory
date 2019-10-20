<?php
session_start();

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
    $age=$_POST['age'];
      // echo $username;
    $query = "UPDATE  patient SET `pat_age`=:age WHERE `pat_username`=:username";
      // prepare query statement
    $stmt = $conn->prepare($query);
      // sanitize
        $age=strip_tags($age);
        $_SESSION['username']=strip_tags($_SESSION['username']);
        // bind valuesj
      $stmt->bindParam(":age", $age);
      $stmt->bindParam(":username", $_SESSION['username']);
        // execute query
    $stmt->execute();
    if($stmt->rowCount() > 0){
        echo "<script>alert('Age updated succesfully')</script>";
        echo "<script>location.href='edit_pat.php'</script>";
      }
      else{
        //  echo 'There is some error';
          header('location:Loginform_pat.php');
      
        }
  }
  
  
  catch(PDOException $e)
    {
    //   echo "Error: " . $e->getMessage();
      //  echo '<br>connection error';
      // $_SESSION['Login']="Something went wrong";
       header('location:Loginform_pat.php');
    }
    ?>

?>