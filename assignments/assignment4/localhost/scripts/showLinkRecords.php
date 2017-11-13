<?php
$debug = true;

# Shows link records
function show_link_records($dbc, $table) {
	# Create database query for specified table
	if($table == "found") {
		$query = "SELECT id, name, status, create_date, update_date, location_id FROM stuff WHERE status = 'found' ORDER BY create_date DESC";
	} else if($table == "lost") {
		$query = "SELECT id, name, status, create_date, update_date, location_id FROM stuff WHERE status = 'lost' ORDER BY create_date DESC";
	} else if($table == "admin") {
		$query = "SELECT id, name, status, create_date, update_date, location_id, room FROM stuff ORDER BY create_date DESC";
	}
	
	# Execute the query
	$results = mysqli_query($dbc, $query);
	check_results($results);

	# Show results
	if($results)
	{
  		# For each row result, generate a table row
  		while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
  			if($table == "found" || $table == "lost") {
  				$alink = '<A HREF=viewitem.php?id=' . $row['id']  . '>' . $row['name'] . '</A>';
	    		echo '<TR>';
	    		echo '<TD>' . $alink . '</TD>';
	        	echo '<TD>' . ucwords($row['status']) . '</TD>';
	        	echo '<TD>' . date('m/d/Y', strtotime($row['create_date'])) . '</TD>';
	        	echo '<TD>' . date('H:i', strtotime($row['create_date'])) . '</TD>';
	        	echo '<TD>' . buildingToName($row['location_id']) . '</TD>';
	    		echo '</TR>';
  			} else if($table == "admin") {
 				$alink = '<A HREF=viewitem.php?id=' . $row['id']  . '>' . $row['id'] . '</A>';
	    		echo '<TR>';
				echo "<form action='admin.php' method='POST' name='form'".$row['id'].">";
	    		echo '<td><input type=\'hidden\' name=\'id\' value=' . $row['id'] . '>' . $alink . '</td>';
	    		echo '<TD>' . $row['name'];
	    		if($row['status'] == "lost") {
					echo "<TD><select name='status' value='" . $row['status'] . "' onchange='this.form.submit()'>";
					echo "<option value='lost' selected>Lost</option>";
					echo "<option value='found'>Found</option>";
					echo "<option value='claimed'>Claimed</option>";
	    		} else if($row['status'] == "found") {
					echo "<TD><select name='status' value='" . $row['status'] . "' onchange='this.form.submit()'>";
					echo "<option value='lost'>Lost</option>";
					echo "<option value='found' selected>Found</option>";
					echo "<option value='claimed'>Claimed</option>";
	    		} else if($row['status'] == "claimed") {
					echo "<TD><select name='status' value='" . $row['status'] . "' onchange='this.form.submit()'>";
					echo "<option value='lost'>Lost</option>";
					echo "<option value='found'>Found</option>";
					echo "<option value='claimed' selected>Claimed</option>";	  			
	    		}
	    		echo '</select>';
	    		echo '</form>';
	    		echo '</TD>';
	        	echo '<TD>' . date('m/d/Y', strtotime($row['create_date'])) . '</TD>';
				echo '<TD>' . date('m/d/Y', strtotime($row['update_date'])) . '</TD>';
	        	echo '<TD>' . buildingToName($row['location_id']) . ' ' . $row['room'] . '</TD>';
	    		echo '</TR>';
  			} 

  		}

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

?>