<?php

// Define server details and credentials for database connection
$sname= "172.31.22.43";        
$uname= "Manas2005423676";
$password = "TwdjtcnUA_";
$db_name = "Manas200542367";

// Establish a connection to the database using the provided details
$conn = mysqli_connect($sname, $uname, $password, $db_name);

// Check if the database connection was not successful
if (!$conn) {
    // Display an error message
	echo "Connection failed!";
}

?>

