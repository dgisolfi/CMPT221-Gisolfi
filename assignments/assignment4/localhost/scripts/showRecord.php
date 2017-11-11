<?php
$debug = true;


function show_record($dbc, $id) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT id, name, status, location_id, create_date, description, finder FROM stuff WHERE id = ' . $id;

	# Execute the query
	$results = mysqli_query($dbc, $query);
	check_results($results);

	# Generate item information
	if($results)
	{
		if($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
	  		echo '<p>Name: ' . $row['name'] . '</p>';
	  		echo '<p>Status: ' . ucwords($row['status']) . '</p>';
	  		echo '<p>Location Found: ' . buildingToName($row['location_id']) . '</p>';
	  		echo '<p>Date/Time Found: ' . $row['create_date'];
	  		echo '<p>Description: ' . $row['description'];
	  		echo '<p>Finder Name: ' . $row['finder'] . '</p>';			
		}

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

?>