<!-- AdminLogin.html
Create a site for Limbo using CSS
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="limboStyle.css">
		<title>Limbo - Admin</title>
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
						 	<li class="dropdown"><a href="#" class="dropbtn">Report an Item</a>
						  	<div class="dropdown-content">
						  		<a href="reportlost.php">Lost</a>
						  		<a href="reportfound.php">Found</a>
						  	</div>
						  	</li>
						  	<li class="adminlink active-page"><a href="AdminLogin.php">Admin</a></li>
						</ul>
					</div>
				</div>
			</div>
	  		<!-- content area -->
	  		<div id="content_area">
		   		<div id="loginform">
		   			<h1>Confirm Login</h1>
					<form action="Limbo.php">
						<br>User Name:<br>
		  				<input id="text" name="UserName" value="">
		  				<br>Password:<br>
		  				<input id="text" name="PW" value="">
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

