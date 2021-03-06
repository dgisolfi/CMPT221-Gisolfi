<!-- found.html
Create a site for Limbo using CSS
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<!DOCTYPE HTML>
<?php
require('../scripts/inputRecord.php');

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
	$status = $_POST['status'];
	submitrecord_ctrl($status);
?>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="limboStyle.css">
		<title>Limbo - Report Found</title>
	</head>
	<body>
		<body>
		<!-- container -->
		<div id="container">
			<!--  header -->
			<div id="header">
				<div id="header-content">
					<div id="logo"><span title="Home"><a href="home.php"><img src="limbologo.png"></a></span></div>
		  			<div class="navbar">
			   			<ul>
						  	<li><a href="founditems.php">Found Items</a></li>
						 	<li><a href="lostitems.php">Lost Items</a></li>
						 	<li class="dropdown active-page"><a href="#" class="dropbtn">Report an Item</a>
						  	<div class="dropdown-content">
						  		<a href="reportlost.php">Lost</a>
						  		<a href="reportfound.php" class="active-page">Found</a>
						  	</div>
						  	</li>
						  	<li class="adminlink"><a href="AdminLogin.php">Admin</a></li>
						</ul>
					</div>
				</div>
			</div>
	  		<!-- content area -->
	  		<div id="content_area">
		   		<div id="entryform">
		   			<h1> Finder Page </h1>
					<p>Submit records of found items within the marist campus.</p>
					<form action="reportfound.php">
						<br>Loacation:<br>
					  	<input id="text" name="location" value="">
					  	<br>Name:<br>
					  	<input id="text" name="name" value="">
						<br>Description:<br>
					  	<input id="text" name="descrp" value="">
					  	<br>Room Number:<br>
					  	<input id="text" name="room" value="">
					  	<br>Finder:<br>
					  	<input id="text" name="finder" value="">
					  	<br><br>
					  	<input id="button" type="hidden" value="Submit">
					  	<input type="hidden" name="status" value="found">
	  				</form> 
	   			 </div>
   			 	<!-- footer -->
	  			<div id="footer"></div>
  			<!-- end container -->
   			 </div>
		 </div>
	</body>
</html>

