# LAB 5 CMPT 221

##Daniel Gisolfi & James Ekstract

**Source insert_data.sql**

```shell
+----+--------+------------+-----+---------------------+
| id | fname  | lname      | num | dob                 |
+----+--------+------------+-----+---------------------+
|  1 | George | Washington |   1 | 1732-02-22 00:00:00 |
|  2 | Andrew | Jackson    |   7 | 1829-03-04 00:00:00 |
|  3 | Ronald | Reagan     |  40 | 1911-02-06 00:00:00 |
|  4 | John   | Kennedy    |  35 | 1917-05-29 00:00:00 |
|  5 | Barack | Obama      |  44 | 1961-08-04 00:00:00 |
+----+--------+------------+-----+---------------------+
```

**presidents.php**

```php+HTML
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
  echo '<TABLE border="1">';
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
```

**Site Output**

![Lab5 site image](file:///Users/daniel/Dropbox/Marist/Sophmore/Fall/Software%20Development%20II/images/Screenshot%202017-09-27%2022.58.09.png)



