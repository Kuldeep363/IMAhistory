<?php
$servername = "localhost";
$username = "root";
$password = "960500";
$dbname = "patients";

try {
	$name=$_POST['username'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	


    // Try a select statement against the table
    // Run it in try/catch in case PDO is in ERRMODE_EXCEPTION.
    $result = $conn->query("SELECT 1 FROM $name LIMIT 1");
	echo "<script>alert('DATA BASE already exist.')</script>";
		echo "<script>alert('Please click on button UPDATE')</script>";
	   echo "<script>location.href='welcome_hos.php'</script>";

    // sql to create table
    
}
catch(PDOException $e)
    {
//    echo  "<br>" . $e->getMessage();
	$sql = "CREATE TABLE $name (
    `Sno.` INT(100) AUTO_INCREMENT PRIMARY KEY, pat_username VARCHAR(200),
    hos_username VARCHAR(200) ,
    doc_name VARCHAR(200),
	disease VARCHAR(200),
    s_date DATE,
	duration INT(200)   )";

    // use exec() because no results are returned
   if ($conn->query($sql) === TRUE) {
	   echo "<script>alert('THERE IS SOME ERROR')</script>";
	   
	   echo "<script>location.href='welcome_hos.php'</script>";
		
    
} 
	else {
//    echo "Error creating table: " . $conn->error;
		echo "<script>alert('DATA BASE created successfully')</script>";
		echo "<script>alert('CLICK ON UPDATE BUTTON TO STORE DATA')</script>";
	   echo "<script>location.href='welcome_hos.php'</script>";
}
echo "<script>alert('please use unique username ')</script>";
echo '<script>location.href="welcome_hos.php"</script>'  ;
}
    

?>
