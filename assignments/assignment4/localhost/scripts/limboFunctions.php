<!-- limboFunctions.php
Various functions used in limbo
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<?php

require('scripts/connect_db.php');


function check_results($results) {
  global $dbc;

  if($results != true){
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
  }
  return true ;
}

function insert_record($dbc) {
  $query = 'INSERT INTO users VALUES' ;

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}


function validateName($input){
	global $dbc;

	#
	$query = "SELECT id, lname FROM presidents WHERE lname='" . $lastname . "'" ;

	# Execute the query
  	$results = mysqli_query( $dbc, $query ) ;
  	check_results($results);

  	if (mysqli_num_rows( $results ) == 0 ){
    	return false ;
  	}

  	 $row = mysqli_fetch_array($results, MYSQLI_ASSOC) ;
  	 $name = $name['']

  	 return intval($name);

}


function validatePass($input){
	global $dbc;

	#Take the pw passed to the function and hash it 
	$pw = 

	#Retrieve password from DB and compare input to the actual value
	$query = "SELECT pass FROM Users WHERE pass='" . $pw . "'" ;

	# Execute the query
  	$results = mysqli_query( $dbc, $query ) ;
 	check_results($results);

 	if (mysqli_num_rows( $results ) == 0 ){
    	return false ;
  	}else{
  		return true;
  	}
}

?>