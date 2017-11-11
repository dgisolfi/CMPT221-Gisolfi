<!-- lost.html
Create a site for Limbo using CSS
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="limboStyle.css">
		<title>Limbo - Report Lost</title>
	</head>
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
						  		<a href="reportlost.php" class="active-page">Lost</a>
						  		<a href="reportfound.php">Found</a>
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
		   			<h1> Lost Page </h1>
					<p>Submit records of lost items within the marist campus.</p>
					<form action="Limbo.php">
						<br>Item:<br>
					  	<input id="text" name="item" value="">
					  	<br>Status:<br>
					  	<input id="text" name="status" value="">
						<br>First name:<br>
					  	<input id="text" name="firstname" value="">
					  	<br>Last name:<br>
					  	<input id="text" name="lastname" value="">
					  	<br>Location:<br>
					  	<input id="text" name="location" value="">
					  	<br>Date:<br>
					  	<input id="text" name="date" value="">
					  	<br>Email:<br>
					  	<input id="text" name="email" value="">
					  	<br>Phone Number:<br>
					  	<input id="text" name="phonenumber" value="">
					  	<br>Additional Details:<br>
					  	<input id="text" name="details" value="">
					  	<br><br>
					  	<input id="button" type="submit" value="Submit">
			  		</form> 
	   			 </div>
   			 	<!-- footer -->
	  			<div id="footer"></div>
  			<!-- end container -->
   			 </div>
		</div>
	</body>
</html>

