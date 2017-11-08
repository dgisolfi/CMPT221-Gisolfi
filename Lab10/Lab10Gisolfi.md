# LAB 10 CMPT 221

## Daniel Gisolfi & James Ekstract

**presidents_login.php**

```php
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
```



**php_login_tools.php**

```php
<!-- 
presidents_login_tools.php
Login tools for the presidents_login.php file
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 
-->

<?php


require( 'includes/helpers.php' ) ;

#hides the page redirect operations.
function load( $page = 'linkypresidents.php', $id = -1 ){

  #Begin URL with protocol, domain, and current directory.
  $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;

  #Remove trailing slashes then append page name to URL and the print id.
  $url = rtrim( $url, '/\\' ) ;
  $url .= '/' . $page . '?id=' . $id;

  # Execute redirect then quit.
  #I used javascript in the echo statemnt because the "header" function could not be called as someone in my code i have defined a header already, this is a work around
  echo "<script type='text/javascript'> document.location = '$url'; </script>";

  exit() ;
}

#hides the last name validation operations.
function validate($lastname = ''){
	global $dbc;

  # Make the query
  $query = "SELECT id, lname FROM presidents WHERE lname='" . $lastname . "'" ;
  // show_query($query);

  # Execute the query
  $results = mysqli_query( $dbc, $query ) ;
  check_results($results);
  
  #echo $results;

  # If we get no rows, the login failed
  if (mysqli_num_rows( $results ) == 0 )
    return -1 ;

  # We have at least one row, so get the frist one and return it
  $row = mysqli_fetch_array($results, MYSQLI_ASSOC) ;

  $id = $row [ 'id' ] ;

  return intval($id) ;
}

?>
```



### Input no President

<img src="file:///Users/daniel/code-repos/CMPT221-Gisolfi/Lab10/images/a.png" width="300px">





### Input a president not in the table

<img src="file:///Users/daniel/code-repos/CMPT221-Gisolfi/Lab10/images/b.png" width="300px">



### Input a President in the database

<img src="file:///Users/daniel/code-repos/CMPT221-Gisolfi/Lab10/images/c.png" width="300px">