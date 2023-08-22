<?php

// Include the database connection file
include('db_conn.php');

// Check if 'id' is set in the GET request
if (isset($_GET['id'])) {
  // If set, assign it to the $id variable
  $id = $_GET['id'];
}

// Initialize an array to store student list (not used in the provided code)
$Stdlist = array();

// SQL query to select a user based on the provided id
$selectQry = "SELECT * FROM users WHERE id='$id'";

// Execute the SQL query
$res1 = mysqli_query($conn, $selectQry);

// Check if the query execution was successful
if (!$res1) {
  // If not, terminate and show the error
  die("Query Failed" . mysql_error());
} else {
  // If successful, fetch the result into $row variable
  $row = mysqli_fetch_array($res1);
}

// Check if the 'btnUpdate' button was clicked (form submitted)
if (isset($_POST['btnUpdate'])) {

  // Get 'username' and 'user_firstname' from the POST request
  $username = $_POST['username'];
  $Name = $_POST['user_firstname'];

  // SQL query to update the user's data based on the provided id
  $updateqry = "UPDATE `users` SET user_name='$username',name='$Name' WHERE id ='$id'";

  // Execute the SQL update query
  $res = mysqli_query($conn, $updateqry);

  // Check if the query execution was successful
  if ($res == true) {
    // If successful, display an alert and redirect to 'register.php'
    echo '<script>alert("Record Updated successfully")</script>';
    header('location:register.php');
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <!-- Metadata for responsiveness and character set -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Page title and link to a local CSS file -->
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <!-- Internal CSS styles -->
  <style>
    * {
      box-sizing: border-box
    }

    /* Add padding to containers */
    .container {
      padding: 16px;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
      border: 1px solid #f1f1f1;
      margin-bottom: 25px;
    }

    /* Set a style for the submit/register button */
    .registerbtn {
      background-color: #04AA6D;
      color: white;
      padding: 16px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }



    .registerbtn:hover {
      opacity: 1;
    }

    /* Add a blue text color to links */
    a {
      color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
      background-color: #f1f1f1;
      text-align: center;
    }
  </style>
</head>

<body>

  <!-- Begin the form -->
  <form action="#" method="post">
    <div class="container">
      <h1>Update</h1>
      <hr>

      <!-- Input for 'username' with a value fetched from the database -->
      <label for="email"><b>Username</b></label>
      <input value="<?php echo $row['user_name']; ?>" type="text" placeholder="Enter Email" name="username"
        id="username" required>

      <!-- Input for 'user_firstname' with a value fetched from the database -->
      <label for="psw-repeat"><b>Name</b></label>
      <input type="text" placeholder="First Name" name="user_firstname" id="psw-repeat"
        value="<?php echo $row['name']; ?>" required>

      <!-- Submit button -->
      <button type="submit" class="registerbtn" name="btnUpdate">Update</button>
    </div>
  </form>

</body>

</html>