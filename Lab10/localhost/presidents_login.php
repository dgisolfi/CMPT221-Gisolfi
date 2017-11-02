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
		require('includes/connect_db.php');

		require('includes/presidents_login_tools.php');

		if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
			$lname = $_POST['lname'];
			$id = validate($lname) ;

			echo "hi";
			echo"<p>Query = $id</p>";

			if (empty($lname)){
				echo '<p style="color:red">Please complete the last name.</p>';
			}else if ($id == -1){
      			echo '<P style=color:red>Login failed please try again.</P>' ;
			}else{
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
