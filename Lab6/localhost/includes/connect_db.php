<?php 
# CONNECT TO MySQL DATABASE.


# Connect  on 'localhost' for user 'root' with password 'root' to database 'site_db'.

# Otherwise fail gracefully and explain the error. 

$dbc = @mysqli_connect ( 'localhost', 'root', 'root', 'site_db' )


OR die ( mysqli_connect_error() ) ;


# Set encoding to match PHP script encoding.

mysqli_set_charset( $dbc, 'utf8' ) ;
