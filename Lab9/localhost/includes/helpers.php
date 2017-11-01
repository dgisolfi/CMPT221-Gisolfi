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