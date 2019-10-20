<?php
    session_start();
    $name=$_POST['name'];
    $email=$_POST['mail'];
    $mob=$_POST['mob'];
    $text=$_POST['text'];

    $to="363rawatboy@gmail.com";
    $sub=$name." wants to connect you";
    $message="Hello IMA Staff<br>".$name." wants to connect to you.<br>These are the details of ".$name."<br>
    <table>
    <th ><td colspan='2'><strong>Details</strong></td></th>
    <tr><td>Name</td><td>:".$name."</td></tr>
    <tr><td>Email</td><td>:".$email."</td></tr>
    <tr><td>Mobile Number</td><td>:".$mob."</td></tr>
    <tr><td>Message</td><td>:".$text."</td></tr>
    </table>";

    $headers="From:kuldeep363rawat@gmail.com". "\r\n" .
   'Reply-To: kuldeep363rawat@gmail.com' . "\r\n".
   'Content-type: text/html; charset=iso-8859-1';

    if(mail($to,$sub,$message,$headers)){
        echo "mail sent ";
    }
    else{
        echo "error!";
    }

?>