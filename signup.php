<!DOCTYPE html>
<html>
<head>
    <!-- Page title -->
    <title>SIGN UP</title>

    <!-- Link to the external stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <!-- Begin the sign-up form, which will send data to "signup-check.php" when submitted -->
    <form action="signup-check.php" method="post">
        
        <!-- Form title -->
        <h2>SIGN UP</h2>

        <!-- Check if there's an error message to display (passed via URL parameters) -->
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <!-- Check if there's a success message to display (passed via URL parameters) -->
        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <!-- Input for the user's name -->
        <label>Name</label>
        <!-- If the name is already set (e.g., after a failed attempt), display it in the input field -->
        <?php if (isset($_GET['name'])) { ?>
            <input type="text" 
                   name="name" 
                   placeholder="Name"
                   value="<?php echo $_GET['name']; ?>"><br>
        <?php }else{ ?>
            <!-- If not, just show an empty input field -->
            <input type="text" 
                   name="name" 
                   placeholder="Name"><br>
        <?php }?>

        <!-- Input for the user's username -->
        <label>User Name</label>
        <!-- If the username is already set (e.g., after a failed attempt), display it in the input field -->
        <?php if (isset($_GET['uname'])) { ?>
            <input type="text" 
                   name="uname" 
                   placeholder="User Name"
                   value="<?php echo $_GET['uname']; ?>"><br>
        <?php }else{ ?>
            <!-- If not, just show an empty input field -->
            <input type="text" 
                   name="uname" 
                   placeholder="User Name"><br>
        <?php }?>

        <!-- Input for the user's password -->
        <label>Password</label>
        <input type="password" 
               name="password" 
               placeholder="Password"><br>

        <!-- Input for the user to re-enter their password (for confirmation) -->
        <label>Re-enter Password</label>
        <input type="password" 
               name="re_password" 
               placeholder="Re-enter Password"><br>

        <!-- Submit button for the form -->
        <button type="submit">Sign Up</button>

        <!-- Link to the login page for users who already have an account -->
        <a href="index.php" class="ca">Already have an account?</a>
    </form>
</body>
</html>
