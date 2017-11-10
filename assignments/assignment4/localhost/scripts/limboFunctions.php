<!-- limboFunctions.php
Various functions used in limbo
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<?php

require('connect_db.php');


function check_results($results) {
  global $dbc;

  if($results != true){
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
  }
  return true ;
}

function search_record($dbc, $item,$status, $firstname, $lastname, $location, $date,$email, $phonenumber, $deatails) {
  $query = 'INSERT INTO users VALUES' ;

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}

function insert_record($dbc, $item,$status, $firstname, $lastname, $location, $date,$email, $phonenumber, $deatails) {
  $query = 'INSERT INTO users VALUES' ;

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}


function validateEmail($input){
	global $dbc;

	#
	$query = "SELECT email FROM users WHERE lname='" . $input . "'" ;

	# Execute the query
  	$results = mysqli_query( $dbc, $query ) ;
  	check_results($results);

  	if (mysqli_num_rows( $results ) == 0 ){
    	return false ;
  	}else{

  	 return true;
 	}

}


function validatePass($input){
	global $dbc;

	#Take the pw passed to the function and hash it 
	$pw = hash($input);

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

/*
function buildingToName($id){
  global $dbc;

  $query = 'SELECT name FROM locations WHERE id = "' .$id. '";'

  $results = mysqli_query($dbc, $query);
  check_results($results);

  return $results;
}
*/

?>