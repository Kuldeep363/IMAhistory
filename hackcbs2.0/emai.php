<?php   
   $userInput="kuldeep";
    
   $to="amanbaghel255@gmail.com";
   $sub="Registered successfully";
   $text="<html><body><strong>Hi ".$userInput."</strong><br> Your account created succesfully
   Now you can login anytime to use the features of website
   These are your login details:".
   "<table><th><td colspan='2'><h3>Login Details</h3></td></th>
   <tr><td><strong>Username</strong></td><td>:".$userInput."</td>
   <tr><td><strong>Password</strong></td><td>:pass123</td></tr>
   <tr><td><strong>First Name</strong></td><td>:kuldeep</td></tr>
   <tr><td><strong>Last Name</strong></td><td>:rawat</td></tr>
   <tr><td><strong>Email</strong></td><td>:363rawatboy@gmail.com</td></tr>
   <tr><td><strong>Age</strong></td><td>:19</td></tr>
   <tr><td><strong>Gender</strong></td><td>:male</td></tr>
   <tr><td><strong>Address</strong></td><td>:dvdafda sda dgag dadfu</td></tr></table><br><br>".
   " Login anytime to check your medical history<br><br>".
   "Thank you(-_-)</body></html>";

   $headers="From:kuldeep363rawat@gmail.com". "\r\n" .
   'Reply-To: kuldeep363rawat@gmail.com' . "\r\n".
   'Content-type: text/html; charset=iso-8859-1';
     
    // About Webinar: Webinar will discusses traditional and newer methods of;
//  $header="From:kuldeep363rawat@gmail.com";
    if(mail($to,$sub,$text,$headers)){
    echo 'mail sent to you bro1';
}
else{
    echo 'error!!!';
}
?>


