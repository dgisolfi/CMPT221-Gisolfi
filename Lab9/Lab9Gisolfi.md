# LAB 9 CMPT 221

## Daniel Gisolfi & James Ekstract

### Modify linkypresidents to use the primary key and pass it to a PHP script in the form of a GET request to retrieve the record from the database.

**linkypresidents.php**

```php
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Style-Type" content="text/css" /> 
    <title>linkypresidents.php</title>
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

  if(!empty($num) && !empty($fname) && !empty($lname) && valid_number($num)){
    $result = insert_record($dbc, $num, $fname, $lname);
  }else if(empty($num) && empty($fname) && empty($lname)) {
    echo '<p style="color:red"> All fields must contain values</p>';
  }else if(!valid_number($num)){
    echo '<p style="color:red"> Please give a valid number.</p>';
  }else if (!valid_name($fname)){
    echo '<p style="color:red">Please complete the first name.</p>';
  }else if (!valid_name($lname)){
    echo '<p style="color:red">Please complete the last name.</p>';
  }else{
    
    echo "<p>Added " . $result . " new president(s) ". $num . " @ $" . $fname . " . @ $" . $lname . " .</p>" ;
  }
  

}else if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
  if(isset($_GET['id'])){
    show_record($dbc, $_GET['id']) ;
  } 
}

# Show the records
show_link_records($dbc);  

# Close the connection
mysqli_close($dbc) ;
?>

<!-- Get inputs from the user. -->
<form action="linkypresidents.php" method="POST">
<table>
<tr>
<td>Number:</td><td><input type="text" name="num" value="<?php if
(isset($_POST['num'])) echo $_POST['num']; ?>"></td>
</tr>
<tr>
<td>First Name:</td><td><input type="text" name="fname" value="<?php if
(isset($_POST['fname'])) echo $_POST['fname']; ?>"></td>
</tr>
<tr>
<td>Last Name:</td><td><input type="text" name="lname" value="<?php if
(isset($_POST['lname'])) echo $_POST['lname']; ?>"></td>
</tr>
</table>
<p><input type="submit" ></p>
</form>
</html>
  </body>
</html>
```



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
      echo '<H1>President</H1>' ;
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

# Shows the link records in prints
function show_link_records($dbc) {
  # Create a query to get the name and price sorted by price
  $query = 'SELECT id, num, lname FROM presidents ORDER BY num ASC' ;

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
      echo '<TH>Last Name</TH>';
      echo '</TR>';

      # For each row result, generate a table row
      while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
      {
        #Create link
        $alink = '<A HREF=linkypresidents.php?id=' . $row['id']  . '>' . $row['num'] . '</A>' ;
        echo '<TR>' ;
        echo '<TD ALIGN=right>' . $alink . '</TD>' ;
        echo '<TD>' . $row['lname'] . '</TD>';
        echo '</TR>' ;
      }
      # End the table
      echo '</TABLE>';

      # Free up the results in memory
      mysqli_free_result( $results ) ;
  }
}

function show_record($dbc, $id) {
  # Create a query to get the name and price sorted by price
  $query = 'SELECT id, num, lname, fname FROM presidents WHERE id = ' . $id ;

  # Execute the query
  $results = mysqli_query( $dbc , $query ) ;
  check_results($results) ;

  # Show results
  if( $results )
  {
      # But...wait until we know the query succeed before
      # rendering the table start.
      echo '<H1>President Info</H1>' ;
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
        echo '<TD>' . $row['fname'] . '</TD>';
        echo '<TD>' . $row['lname'] . '</TD>';
        echo '</TR>' ;
      }

      # End the table
      echo '</TABLE>';

      # Free up the results in memory
      mysqli_free_result( $results ) ;
  }
}

?>
```



### Before submitting a new president

<img src="file:///Users/daniel/code-repos/CMPT221-Gisolfi/Lab9/localhost/images/a.png" width="300px">

### Click one of the president links

<img src="file:///Users/daniel/code-repos/CMPT221-Gisolfi/Lab9/localhost/images/b.png" width="300px">

### input a new president

<img src="file:///Users/daniel/code-repos/CMPT221-Gisolfi/Lab9/localhost/images/c.png" width="300px">

### Click on the new president

<img src="file:///Users/daniel/code-repos/CMPT221-Gisolfi/Lab9/localhost/images/d.png" width="300px">

### Press submit with no values in the form

<img src="file:///Users/daniel/code-repos/CMPT221-Gisolfi/Lab9/localhost/images/e.png" width="300px">



