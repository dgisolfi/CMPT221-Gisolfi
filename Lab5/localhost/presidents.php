<!DOCTYPE html>
<html>
<?php
# This file prints the  database for CMPT 221 Lab 5
# Presidents of the United States 
# Daniel Gisolfi, James Ecxtracts 

# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Create a query to get the name and price sorted by price
$query = 'SELECT num, fname, lname FROM presidents ORDER BY num DESC' ;

# Execute the query
$results = mysqli_query( $dbc , $query ) ;

# Show results
if( $results )
{
  # But...wait until we know the query succeeded before
  # starting the table.
  echo '<H1>Dead Presidents</H1>' ;
  echo '<TABLE>';
  echo '<TR>';
  echo '<TH>num</TH>';
  echo '<TH>fname</TH>';
  echo '<TH>lname</TH>';
  echo '</TR>';

  # For each row result, generate a table row
  while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  {
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
else
{
  # If we get here, something has gone wrong
  echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
}

# Close the connection
mysqli_close( $dbc ) ;
?>
</html>