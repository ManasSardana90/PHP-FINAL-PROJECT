<!DOCTYPE html>
<html>
<head>
    <!-- Set the title of the webpage -->
	<title>LOGIN</title>
    <!-- Link to an external stylesheet to style the page -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <!-- Start a form that sends data to "login.php" using the POST method when submitted -->
    <form action="login.php" method="post">
        <!-- Form title -->
     	<h2>LOGIN</h2>
        
        <!-- Display error message if it's passed via URL parameters -->
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

        <!-- Input field for the user's name -->
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

        <!-- Input field for the password (of type password to hide characters) -->
     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

        <!-- Submit button to submit the form -->
     	<button type="submit">Login</button>

        <!-- Link to the signup page for users who don't have an account -->
        <a href="signup.php" class="ca">Create an account</a>
    </form>
</body>
</html>
