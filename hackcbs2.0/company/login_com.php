<?php
 session_start();

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
    $id = $_POST['useridin'];
    $password = base64_encode($_POST['passwordlog']);

    $query = "SELECT * FROM company WHERE com_username=:id AND com_pass=:pass";
    
        // prepare query
        $stmt = $conn->prepare($query);
    
        // sanitize
        $password=strip_tags($password);
        $id=strip_tags($id);
    
        // bind values
        $stmt->bindParam(":pass", $password);
        $stmt->bindParam(":id", $id);
        // execute query
        $stmt->execute();
        
         if($stmt->rowCount() > 0){
            //  echo"loged in";
             $_SESSION['username']=$id;
              header('location:welcome_com.php');
        }
        else{
            // $_SESSION['errorid']="Invalid UserId";
			// $_SESSION['errorpass']="Invalid Password";
            echo "<script> alert('Invalid username or Password!') </script>"; 
             echo "<script>location.href='Loginform_com.php'</script>";
        }
    }
  catch(PDOException $e)
    {
        // echo "<script> alert('Something went wrong!')</script>";
         header('location:Loginform_com.php');
    }


 ?>