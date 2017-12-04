<!-- limboFunctions.php
Various functions used in limbo
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);
require('connect_db.php');


function check_results($results) {
  global $dbc;

  if($results != true){
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
  }
  return true ;
}

# Updates the status of an item in the database; used by the admin page
function update_status($dbc, $id, $status) {
  # Create and execute query to update status of item with specified id
  $query = "UPDATE stuff SET status = '" . $status . "' WHERE id = $id";
  mysqli_query($dbc, $query);
}

# Updates the status of an item in the database; used by the admin page
function claim_item($dbc, $id, $fname, $lname, $statID) {
  if ($statID == 0){
   $query = "UPDATE stuff SET finder_fname = '" . $fname . "', finder_lname ='" . $lname . "' WHERE id ='" . $id . "'";
  }else if ($statID == 1){
   $query = "UPDATE stuff SET owner_fname = '" . $fname . "', owner_lname ='" . $lname . "' WHERE id ='" . $id . "'";
  }
  $result = mysqli_query( $dbc , $query );
  check_results($result);
  echo "Item Updated";

}          

# Updates the status of an item in the database; used by the admin page
function check_status($dbc, $id) {
  # Create and execute query to update status of item with specified id
  $query = "SELECT status from stuff WHERE id = '". $id . "'";
  $result = mysqli_query($dbc, $query);
  check_results($result);
  return $result;
}


# Deletes an item from the database; used by the admin page
function delete_item($dbc, $id) {
  # Create and execute query to delete item with specified id
  $query = "DELETE FROM stuff WHERE id = $id";
  mysqli_query($dbc, $query);
}


function validateName($input){
	global $dbc;

	$query = "SELECT first_name FROM users WHERE first_name='" . $input . "'";

	# Execute the query
  	$results = mysqli_query($dbc, $query);
  	check_results($results);

  	if (mysqli_num_rows( $results ) == 0 ){
    	return false;
  	} else {
      return true;
 	}

}


function validatePass($input){
	global $dbc;

	#Take the pw passed to the function and hash it 
	#$pw = hash($input);

	#Retrieve password from DB and compare input to the actual value
	$query = "SELECT pass FROM users WHERE pass='" . $input . "'" ;

	# Execute the query
  	$results = mysqli_query( $dbc, $query ) ;
 	check_results($results);

 	if (mysqli_num_rows( $results ) == 0 ){
    	return false ;
  	}else{
  		return true;
  	}
}

function buildingToName($id){
  global $dbc;

  $query = "SELECT name FROM locations WHERE id = " .$id. "";

  $results = mysqli_query($dbc, $query);
  check_results($results);
  $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
  return $row['name'];
}

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

# Updates admin information
function update_admin($dbc, $id, $username, $password) {
  # Create and execute query to update status of item with specified id
  //$query = 'SELECT * FROM stuff WHERE id = ' . $id;
  $query = 'UPDATE users SET first_name = ' . $username . ', pass = ' . $password . ' WHERE id = ' . $id;
  console_log($query);
  mysqli_query($dbc, $query);
}


?>