<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Style-Type" content="text/css" /> 
    <title>linkypresidents.php</title>
    <link href="/library/skin/tool_base.css" type="text/css" rel="stylesheet" media="all" />
    <link href="/library/skin/morpheus-default/tool.css" type="text/css" rel="stylesheet" media="all" />
    <script type="text/javascript" src="/library/js/headscripts.js"></script>
    <style>body { padding: 5px !important; }</style>
  </head>
  <body>
<!--
This PHP script was modified based on result.php in McGrath (2012).
It demonstrates how to ...
  1) Connect to MySQL.
  2) Write a complex query.
  3) Format the results into an HTML table.
  4) Update MySQL with form input.
By Ron Coleman
-->
<!DOCTYPE html>
<html>
<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;


if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
  $num = $_POST['num'] ;
  $fname = $_POST['fname'] ;
  $lname = $_POST['lname'];

  if(!empty($num) && !empty($fname) && !empty($lname) && valid_number($num)){
    $result = insert_record($dbc, $num, $fname, $lname);
  }else if(empty($num) && empty($fname) && empty($lname)) {
    echo '<p style="color:red"> All fields must contain values</p>';
  }else if(!valid_number($num)){
    echo '<p style="color:red"> Please give a valid number.</p>';
  }else if (!valid_name($fname)){
    echo '<p style="color:red">Please complete the first name.</p>';
  }else if (!valid_name($lname)){
    echo '<p style="color:red">Please complete the last name.</p>';
  }else{
    
    echo "<p>Added " . $result . " new president(s) ". $num . " @ $" . $fname . " . @ $" . $lname . " .</p>" ;
  }
  

}else if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
  if(isset($_GET['id'])){
    show_record($dbc, $_GET['id']) ;
  } 
}

# Show the records
show_link_records($dbc);  

# Close the connection
mysqli_close($dbc) ;
?>

<!-- Get inputs from the user. -->
<form action="linkypresidents.php" method="POST">
<table>
<tr>
<td>Number:</td><td><input type="text" name="num" value="<?php if
(isset($_POST['num'])) echo $_POST['num']; ?>"></td>
</tr>
<tr>
<td>First Name:</td><td><input type="text" name="fname" value="<?php if
(isset($_POST['fname'])) echo $_POST['fname']; ?>"></td>
</tr>
<tr>
<td>Last Name:</td><td><input type="text" name="lname" value="<?php if
(isset($_POST['lname'])) echo $_POST['lname']; ?>"></td>
</tr>
</table>
<p><input type="submit" ></p>
</form>
</html>
  </body>
</html>
