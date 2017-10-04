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
    $fname = $_POST['num'] ;

    $price = $_POST['fname'] ;

    $lname = $_POST['lname']

    if(!empty($num) && !empty($fname) && !empty($lname)) {
      $result = insert_record($dbc, $num, $fname, $lname) ;

      echo "<p>Added " . $result . " new president(s) ". $num . " @ $" . $fname ." @ $". $lname . " .</p>" ;
    }
    else
      echo '<p style="color:red">Please input a Number, First Name and Last Name!</p>' ;
}

# Show the records
show_records($dbc);

# Close the connection
mysqli_close( $dbc ) ;
?>

<!-- Get inputs from the user. -->
<form action="ipresidents.php " method="POST">
<table>
<tr>
<td>Num:</td><td><input type="int" name="num"></td>
</tr>
<tr>
<td>fname:</td><td><input type="text" name="fname"></td>
</tr>
<tr>
<td>lname:</td><td><input type="text" name="fname"></td>
</tr>
</table>
<p><input type="submit" ></p>
</form>
</html>