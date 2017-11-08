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
	echo "hallo";
	$userName = $_POST['UserName'];
	$pw = $_POST['PW'];
	
	#Validate username and password
	$uVal = 5;#validateName();
	$pVal = 5;#validatePass();
	
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


<!DOCTYPE HTML>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="limboStyle.css">
	</head>
	<body>
		<!-- container -->
 		<div id="container">
 			<!--  header -->
 			<div id="header">
	  			<div id="logo">Limbo</div>
		  			<div id="top_info">Marist College lost and found</div>
		  			<div id="navbar">
			   			<ul>
						  <li><a class="active" href="home.html">Home</a></li>
						  <li><a href="lost.html">Lost</a></li>
						  <li><a href="found.html">Found</a></li>
						  <li><a href="AdminLogin.html">Admin</a></li>
						</ul>
	   				</div>
	  			</div>
	  		<!-- content area -->
	  		<div id="content_area">
		   		<div id="loginform">
		   			<h1>Confirm Login</h1>
		   			<form action="adminLogin.php" method="POST">
						<br>User Name:<br>
		  				<input id="text" name="UserName" placeholder="Enter Username" value="<?php if
						(isset($_POST['UserName'])) echo $_POST['UserName']; ?>" required>
		  				<br>Password:<br>
		  				<input id="text" name="PW" placeholder="Enter Password" value="" required>
			  		</form> 
			  		<input id="button" type="submit" value="Login">
	   			 </div>
   			 	<!-- footer -->
	  			<div id="footer"></div>
  			<!-- end container -->
   			 </div>
		 </div>
	</body>
</html>

