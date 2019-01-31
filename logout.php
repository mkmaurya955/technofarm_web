<?php 
// start the session 
session_start(); 
header("Cache-control: private"); 
$_SESSION = array(); 
$var = $_SESSION[''];
session_destroy(); 
header('location:index.php');


?>
