<!-- AdminLogin.html
Create a site for Limbo using CSS
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<?php
#outputs errors for debugging
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

require('scripts/redirect');
require('scripts/limboFunctions.php');

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
	$userName = $_POST['UserName'];
	$pw = $_POST['PW'];
	
	#Validate username and password
	$uVal = validateName();
	$pVal = validatePass();
	
	#Ensures no empty fields
	if (empty($userName) OR empty($pw)){
		echo '<p style="color:red">Please complete the form Fully.</p';
	#Ensure the username is correct
	}else if ($uVal =! true) {
		echo '<p style="color:red">User Name Invalid for Account</p>';
	#Ensure the Password is correct
	}else if ($pVal =! true){
		echo '<p style="color:red">Password Invalid for Account</p>';
	#Else allow for login and redirect
	}else{
		redirect('admin.php');
	}
?>