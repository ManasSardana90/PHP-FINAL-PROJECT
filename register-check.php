<?php 

// Start or resume the session
session_start(); 

// Include the database connection file
include "db_conn.php";

// Check if the required POST variables are set
if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

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
	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

    // Prepare user data for redirect URL in case of errors
	$user_data = 'uname='. $uname. '&name='. $name;

    // Check if any field is empty and redirect with an error if so
	if (empty($uname)) {
		header("Location: register.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: register.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: register.php?error=Re Password is required&$user_data");
	    exit();
	}
	else if(empty($name)){
        header("Location: register.php?error=Name is required&$user_data");
	    exit();
	}
    // Check if password and its confirmation match
	else if($pass !== $re_pass){
        header("Location: register.php?error=The confirmation password does not match&$user_data");
	    exit();
	}
	else{
        // If all validations pass, hash the password using MD5 (Note: MD5 is not considered secure)
		$pass = md5($pass);

        // Check if the username already exists in the database
	    $sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

        // If username exists, redirect with an error message
		if (mysqli_num_rows($result) > 0) {
			header("Location: register.php?error=The username is taken, try another&$user_data");
	        exit();
		}else {
            // If username doesn't exist, insert the new user data into the database
            $sql2 = "INSERT INTO users(user_name, password, name) VALUES('$uname', '$pass', '$name')";
            $result2 = mysqli_query($conn, $sql2);
            
            // On successful insertion, redirect with a success message
            if ($result2) {
           	 header("Location: register.php?success=Your account has been created successfully");
			 exit();
            }else {
                // If insertion fails, redirect with an error message
	           	header("Location: register.php?error=Unknown error occurred&$user_data");
		        exit();
            }
		}
	}
	
}else{
    // If not all POST variables are set, redirect to the registration page
	header("Location: register.php");
	exit();
}

?>
