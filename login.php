<?php 

// Start or resume the session
session_start(); 

// Include the database connection file
include "db_conn.php";

// Check if the required POST variables are set
if (isset($_POST['uname']) && isset($_POST['password'])) {

    // Function to sanitize and validate input data
	function validate($data){
        // Remove extra white spaces, slashes, and convert special characters to HTML entities
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

    // Validate and sanitize user inputs
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

    // Check if any field is empty and redirect with an error if so
	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
        // If all validations pass, hash the password using MD5 (Note: MD5 is not considered secure)
		$pass = md5($pass);

        // SQL query to fetch user details based on provided username and password
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

        // If a match is found in the database for the provided username and password
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            // Check again to ensure the retrieved data matches the input (for security reasons)
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
                // Store user details in the session for further use
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
                // Redirect to the home page
            	header("Location: home.php");
		        exit();
            }else{
                // If there's a mismatch, redirect with an error message
				header("Location: index.php?error=Incorrect User name or password");
		        exit();
			}
		}else{
            // If no matching user is found in the database, redirect with an error message
			header("Location: index.php?error=Incorrect User name or password");
	        exit();
		}
	}
	
}else{
    // If not all POST variables are set, redirect to the index page
	header("Location: index.php");
	exit();
}

?>
