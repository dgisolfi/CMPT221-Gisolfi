<!-- inputRecord.php
Various functions used in limbo
Authors: James Ekstract, Daniel Gisolfi
Version 0.1 -->

<?php
require('connect_db.php')
require('limboFunctions.php');

function record_ctrl($claimStatus){

	if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
		
		if ($claimStatus == "lost"){
				insert_lost_record($dbc);
		}else if ($claimStatus == "found"){
				insert_lost_record($dbc);
		}else{
			echo "Not a valid status";
		}

		if (!$result){
			echo "Please submit a valid record!";
		}else{
			echo "Record Saved in Database";
		}
	}
}
function insert_lost_record($dbc){
	$loc = $_POST['location'];
	$descrp = $_POST['description'];
	$date = $_POST['date'];
	$room = $_POST['room'];
	$owner = $_POST['owner'];
	$status = $_POST['status'];

	$sql = "INSERT INTO stuff (location_id, description, create_date, room, owner, finder, status) VALUES('" . $loc . "', '" .$descrp . "', '" . $date ."', '" . $room ."', '". $owner. "', '" . $finder ."', '" . $status. "')";
		
	$result = mysqli_query( $dbc , $sql );
	check_results($result);
	return $result;
}

function insert_found_record(){
	$loc = $_POST['location'];
	$descrp = $_POST['description'];
	$date = $_POST['date'];
	$room = $_POST['room'];
	$finder = $_POST['finder'];
	$status = $_POST['status'];

	$sql = "INSERT INTO stuff (location_id, description, create_date, room, owner, finder, status) VALUES('" . $loc . "', '" .$descrp . "', '" . $date ."', '" . $room ."', '". $owner. "', '" . $finder ."', '" . $status. "')";
		
	$result = mysqli_query( $dbc , $sql );
	check_results($result);
	return $result;
}

?>