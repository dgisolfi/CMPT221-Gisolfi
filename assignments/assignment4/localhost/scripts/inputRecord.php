<?php
# input.php

require( 'connect_db.php' )
require( 'limboFunctions.php' )

if (isset($_POST['submit'])) {
	insert_record($dbc);

	if ($result =! true){
		echo "Please submit a valid record!";
	}
}

function insert_record($dbc){
	$loc = $_POST['location'];
	$descrp = $_POST['description'];
	$date = $_POST['date'];
	$room = $_POST['room'];
	$owner = $_POST['owner'];
	$finder = $_POST['finder'];
	$status = $_POST['status'];

	$sql = 'INSERT INTO stuff (location_id, description, create_date, room, owner, finder, status) VALUES('$loc', '$descrp', '$date', '$room', '$owner', '$finder', '$status')';
		
	$result = mysqli_query( $dbc , $sql );
	check_results($result);
	return $result;
}

?>