# LAB 6 CMPT 221

## Daniel Gisolfi & James Ekstract

###Open ipresidents.php in a browser, Print a hardcopy of the web page.

<img src="file:///Users/daniel/code-repos/CMPT221-Gisolfi/Lab6/images/HardcopyofWebpage.png" width="300px" />

###Add a new president and submit the hard copy of the web page

<img src="file:///Users/daniel/code-repos/CMPT221-Gisolfi/Lab6/images/HardcoptofWebpageAdterSubmit.png" width="300px" />

###Submit a copy of the final version of ipresidents.php

```php
#ipresidents.php
#Lab 6 Daniel Gisolfi & James Ekstract
<!--
This PHP script was modified based on result.php in McGrath (2012).
It demonstrates how to ...
  1) Connect to MySQL.
  2) Write a complex query.
  3) Format the results into an HTML table.
  4) Update MySQL with form input.
By Ron Coleman
-->
<!DOCTYPE html>
<html>
<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
    $num = $_POST['Number'] ;

    $fname = $_POST['First Name'] ;

    $lname = $_POST['Last Name'] ;

  if (!empty($num) && !empty($fname) && !empty($lname)) {
    $result = insert_record($dbc, $num, $fname, $lname) ;
    
    echo "<p>Added " . $result . " new president(s) ". $num . " @ " . $fname . " @ " . $lname . "</p>" ;
  
  } else {
    
    echo '<p style="color:red">Please input a Number, First Name and Last Name!</p>' ;
    }
}

# Show the records
show_records($dbc);

# Close the connection
mysqli_close( $dbc) ;
?>

<!-- Get inputs from the user. -->
<form action="ipresidents.php " method="POST">
<table>
<tr>
<td>Number:</td><td><input type="int" name="num"></td>
</tr>
<tr>
<td>First Name:</td><td><input type="text" name="fname"></td>
</tr>
<tr>
<td>Last Name:</td><td><input type="text" name="fname"></td>
</tr>
</table>
<p><input type="submit" ></p>
</form>
</html>
```



###Submit a copy of the final version of helpers.php

```php
#helpers.php
#Lab 6 Daniel Gisolfi & James Ekstract
<?php
$debug = true;

# Shows the records in prints
function show_records($dbc) {
  # Create a query to get the name and price sorted by price
  $query = 'SELECT num, fname, lname FROM presidents ORDER BY num DESC' ;

  # Execute the query
  $results = mysqli_query( $dbc , $query ) ;
  check_results($results) ;

  # Show results
  if( $results ) {
	  # But...wait until we know the query succeed before
	  # rendering the table start.
	  echo '<H1>Dead Presidents</H1>' ;
	  echo '<TABLE border="1">';
	  echo '<TR>';
	  echo '<TH>num</TH>';
	  echo '<TH>fname</TH>';
	  echo '<TH>lname</TH>';
	  echo '</TR>';

	  # For each row result, generate a table row
	  while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
		echo '<TR>' ;
		echo '<TD>' . $row['num'] . '</TD>' ;
		echo '<TD>' . $row['fname'] . '</TD>' ;
		echo '<TD>' . $row['lname'] . '</TD>' ;
		echo '</TR>' ;
	  }

	  # End the table
	  echo '</TABLE>';

	  # Free up the results in memory
	  mysqli_free_result( $results ) ;
	}
}

# Inserts a record into the presidents table
function insert_record($dbc, $num, $fname, $lname) {
  $query = 'INSERT INTO presidents(num, fname, lname) VALUES (' . $num . ' , "' . $fname . '" , "' . $lname . '" )';
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}

# Shows the query as a debugging aid
function show_query($query) {
  global $debug;

  if($debug)
	echo "<p>Query = $query</p>" ;
}

# Checks the query results as a debugging aid
function check_results($results) {
  global $dbc;

  if($results != true)
	echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
}
?>
```

