<?php 

// Start or resume the session
session_start(); 

// Unset all session variables
session_unset();

// Destroy the entire session
session_destroy();

// Redirect the user to the index.php page
header("Location: index.php");

?>
