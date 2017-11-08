<!-- 
presidents_login.php
Login script for presidents table
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 
-->

<!DOCTYPE html>

<html>
	<body>
		<?php
		#outputs errors for debugging
		ini_set('display_errors', TRUE);
		error_reporting(E_ALL);
		require('includes/connect_db.php');

		require('includes/presidents_login_tools.php');

		if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
			$lname = $_POST['lname'];
			$id = validate($lname) ;

			#check if form is empty
			if (empty($lname)){
				#return an error
				echo '<p style="color:red">Please complete the last name.</p>';
			#Check if the name is a valid one
			}else if ($id == -1){
      			#return an error
      			echo '<P style=color:red>Login failed please try again.</P>' ;
			}else{
				#else load the program
				load('linkypresidents.php', $id);
			}
		}
		?>
		<h1>Presidents Login</h1>
		<form action="presidents_login.php" method="POST">
			<table>
			<tr>
			<td>Last Name:</td><td><input type="text" name="lname" value="<?php if
			(isset($_POST['lname'])) echo $_POST['lname']; ?>"></td>
			</tr>
			</table>
			<p><input type="submit" ></p>
		</form>
 	</body>
</html>
