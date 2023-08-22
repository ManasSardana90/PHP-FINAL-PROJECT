<?php

// Include the database connection file
include('db_conn.php');

// Check if the 'id' is set in the GET request
if (isset($_GET['id'])) {
    
    // Store the 'id' value from the GET request in the $id variable
    $id = $_GET['id'];

    // SQL query to delete a user with the specified 'id' from the 'users' table
    $delquery = "DELETE FROM `users` WHERE id='$id'";
    
    // Execute the SQL query using the database connection
    $result = mysqli_query($conn, $delquery);

    // If the query execution fails
    if(!$result){
        // Terminate the script and display an error message
        die("Query Failed".mysql_error());
    }
    else{
        // If the query is successful, redirect to 'register.php' with a success message
        header('location:register.php?delete_msg=You delete the record');
    }
}

?>

