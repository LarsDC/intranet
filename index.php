<?php
session_start();
// Display errors in production mode

//ini_set('display_errors', 1);
ini_set('display_errors', 0);

//let's get started
if(isset($_SESSION['country'])){
	header('location:' . $_SESSION['country']);	
}else{
	require 'loginForm.php';
}