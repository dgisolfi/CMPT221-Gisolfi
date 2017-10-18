# LAB 7 CMPT 221

## Daniel Gisolfi & James Ekstract

###Add two functions to helpers.php

**helpers.php**

```php
<?php
$debug = true;

# Shows the records in prints
function show_records($dbc) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT num, fname, lname FROM presidents ORDER BY num ASC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Presidents</H1>' ;
  		echo '<TABLE border>';
  		echo '<TR>';
  		echo '<TH>Number</TH>';
  		echo '<TH>First Name</TH>';
      echo '<TH>Last Name</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
    		echo '<TD>' . $row['num'] . '</TD>' ;
    		echo '<TD>' . $row['fname'] . '</TD>' ;
        echo '<TD>' . $row['lname'] . '</TD>';
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

# Inserts a record into the prints table
function insert_record($dbc, $num, $fname, $lname) {
  $query = 'INSERT INTO presidents(num, fname, lname) VALUES (' . $num . ' , "' . $fname . '", "' . $lname . '" )' ;
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

function valid_number($num) {
  if(empty($num) || !is_numeric($num)){
    return false ;   
  } else {
    $num = intval($num) ;      
    if($num <= 0)         
      return false ;
  }
  return true ; 
}

function valid_name($input) {
  if(empty($input) || !is_string($input)){
    return false ;   
  }
  return true ; 
}

# Checks the query results as a debugging aid
function check_results($results) {
  global $dbc;

  if($results != true)
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
}
?>
```



###Modify vipresidents to add the logic in the “Background” to report an input error for each kind of error, i.e., in number and first or last name.

**vipresidents.php**

```php
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Style-Type" content="text/css" /> 
    <title>ipresidents.php</title>
    <link href="/library/skin/tool_base.css" type="text/css" rel="stylesheet" media="all" />
    <link href="/library/skin/morpheus-default/tool.css" type="text/css" rel="stylesheet" media="all" />
    <script type="text/javascript" src="/library/js/headscripts.js"></script>
    <style>body { padding: 5px !important; }</style>
  </head>
  <body>
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
	$num = $_POST['num'] ;

    $fname = $_POST['fname'] ;
    $lname = $_POST['lname'];

      if(!valid_number($num)){
        echo '<p style="color:red"> Please give a valid number.</p>';
      }
      else if (!valid_name($fname)){
        echo '<p style="color:red">Please complete the first name.</p>';
      }
      else if (!valid_name($lname)){
        echo '<p style="color:red">Please complete the last name.</p>';
      }else{
        $result = insert_record($dbc, $num, $fname, $lname);
        echo "<p>Added " . $result . " new president(s) ". $num . " @ $" . $fname . " . @ $" . $lname . " .</p>" ;
    }
      
}

# Show the records
show_records($dbc);

# Close the connection
mysqli_close($dbc) ;
?>

<!-- Get inputs from the user. -->
<form action="vipresidents.php" method="POST">
<table>
<tr>
<td>Number:</td><td><input type="text" name="num"></td>
</tr>
<tr>
<td>First Name:</td><td><input type="text" name="fname"></td>
</tr>
<tr>
<td>Last Name:</td><td><input type="text" name="lname"></td>
</tr>
</table>
<p><input type="submit" ></p>
</form>
</html>
  </body>
</html>
```



### Before submitting a new president

<img src="file:///Users/daniel/code-repos/CMPT221-Gisolfi/Lab7/images/a.png" width="300px" />

### After submitting a new _Valid_ president

<img src="file:///Users/daniel/code-repos/CMPT221-Gisolfi/Lab7/images/b.png" width="300px" />

### Submit a president with no input

<img src="file:///Users/daniel/code-repos/CMPT221-Gisolfi/Lab7/images/c.png" width="300px" />

### Submit a president without a number

<img src="file:///Users/daniel/code-repos/CMPT221-Gisolfi/Lab7/images/d.png" width="300px" />

###Submit a president without a first name

<img src="file:///Users/daniel/code-repos/CMPT221-Gisolfi/Lab7/images/E.png" width="300px" />

###Submit a president without a last name

<img src="file:///Users/daniel/code-repos/CMPT221-Gisolfi/Lab7/images/f.png" width="300px" />

