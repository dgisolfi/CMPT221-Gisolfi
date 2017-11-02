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

  # Begin URL with protocol, domain, and current directory.
  // $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;

  # Remove trailing slashes then append page name to URL and the print id.
  // $url = rtrim( $url, '/\\' ) ;
  // $url .= '/' . $page . '?id=' . $id;

  $url = "https://www.google.com";
  # Execute redirect then quit.
  session_start();
  print ('id =' . $id);

  header( 'Location: ' . $url) ;

  exit() ;
}

#hides the last name validation operations.
function validate($lastname = ''){
	global $dbc;

  # Make the query
  $query = "SELECT id, lname FROM presidents WHERE lname='" . $lastname . "'" ;
  show_query($query);

  # Execute the query
  $results = mysqli_query( $dbc, $query ) ;
  check_results($results);
  echo $results;

  # If we get no rows, the login failed
  if (mysqli_num_rows( $results ) == 0 )
    return -1 ;

  # We have at least one row, so get the frist one and return it
  $row = mysqli_fetch_array($results, MYSQLI_ASSOC) ;

  $id = $row [ 'id' ] ;

  return intval($id) ;
}

?>