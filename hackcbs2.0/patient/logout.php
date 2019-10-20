<?php 

session_start();
session_destroy();

header('location:Loginform_pat.php');
?>