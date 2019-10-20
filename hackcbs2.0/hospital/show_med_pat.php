<?php


echo "<html><head>
<title>Medical History</title>
<style>

html
{
    background: linear-gradient(347deg, rgba(61,144,219,1)0%, rgba(207,103,207,1)100%);    
}
h1{
	text-align:center;
	color:red;
}
.main{
	position:relative;

}
</style>

<script src='https://docraptor.com/docraptor-1.0.0.js'></script>
  <script>
    var downloadPDF = function() {
      DocRaptor.createAndDownloadDoc('YOUR_API_KEY_HERE', {
        test: true, // test documents are free, but watermarked
        type: 'pdf',
        document_content: document.querySelector('html').innerHTML, // use this page's HTML
        // document_content: '<h1>Hello world!</h1>',               // or supply HTML directly
        // document_url: 'localhost/hackcbs2.0/hospital/show_med_pat.php/#container'          // or use a URL
        // javascript: true,                                        // enable JavaScript processing
        // prince_options: {
        //   media: 'screen',                                       // use screen styles instead of print styles
        // }
      })
    }
  </script>
</head>

<body>
<h1>Medical history</h1>
<div class=container >

<table style='width:100%;border: solid 1px black;border-collapse:collapse;text-align:center;font-size:20px;background:green;'>";
echo"<tr><th>patient Username</th><th>Hospital username</th><th>Doctor</th><th>Disease</th><th>Starting date</th><th>Duration of Treatment</th></tr>";


class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "root";
$password = "960500";
$dbname = "patients";
$conn;

try {
	$name=$_POST['username'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM $name";
	$stmt = $conn->prepare($query);
//	$name=strip_tags($name);
//	$stmt->bindParam(":username", $name);
	
	$stmt->execute();
        
         if($stmt->rowCount() > 0){
//			 echo "yes1";
			  $query="SELECT  pat_username,hos_username,doc_name,disease,s_date,duration FROM $name";
			  $stmt = $conn->prepare($query);
//			  $stmt->bindParam(":name", $name);
			  $stmt->execute();
			  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
			  echo $v;  
			  }
		
		}
	    else{
			echo "<script>alert('No data exist! please consult to doctor')</script>";
			echo "<script>location.href='welcome_hos.php'</script>";
		}
}
catch(PDOException $e) {
//    echo "Error: " . $e->getMessage();
	header('location.href="welcome_hos.php"');
}
$conn = null;
echo "</table></div>
<div class='d-flex justify-content-center mt-5'>
<button id='pdf-button' type='button'  onclick='downloadPDF()' style='border:none;border-radius:15px;background-color:blue;margin-left:50%;margin-top:20px;height:40px;width:100px'>Save</button>
</div>
</body></html>
";

	
	
?>