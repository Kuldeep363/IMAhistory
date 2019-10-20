<?php 

session_start();
session_destroy();

header('location:Loginform_com.php');
?>