<?php 

// Include the database connection file
include "db_conn.php";

// Initialize an array to store student data
$StudentList = array();

// SQL query to fetch all users that are not marked as deleted
$qryToGet = "SELECT * FROM users WHERE is_deleted=0";
$res1 = mysqli_query($conn, $qryToGet);

// Check if the query execution was successful and has results
if($res1) {
    if (mysqli_num_rows($res1) > 0) {
        // Fetch each user data and push it to the StudentList array
        while ($row = mysqli_fetch_array($res1)) {    
            array_push($StudentList, $row);
        }
    }
}

// Display a delete message if it's passed via URL parameters
if(isset($_GET['delete_msg'])) {
    echo "<h6>".$_GET['delete_msg']."</h6>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Page title -->
    <title>Register</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <!-- Begin the registration form, which will send data to "register-check.php" when submitted -->
    <form action="register-check.php" method="post" style="margin-top:500px;">
        <!-- Form title -->
        <h2>Register</h2>

        <!-- Display error message if it's passed via URL parameters -->
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <!-- Display success message if it's passed via URL parameters -->
        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <!-- User name input -->
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

        <!-- Username input -->
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

        <!-- Password input -->
        <label>Password</label>
        <input type="password" 
               name="password" 
               placeholder="Password"><br>

        <!-- Password re-entry input for confirmation -->
        <label>Re-enter Password</label>
        <input type="password" 
               name="re_password" 
               placeholder="Re-enter Password"><br>

        <!-- Form submit button -->
        <button type="submit">Sign Up</button>

        <!-- Link to the login page for users who already have an account -->
        <a href="index.php" class="ca">Already have an account?</a>
    </form>

    <!-- Begin the student list table section -->
    <br>
    <div class="container">
        <table class="table table-bordered table-striped">
            <!-- Table header -->
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Password</th>
                </tr>
            </thead>
            <!-- Table body with student data -->
            <tbody>
                <?php
                // Loop through each student data and display in the table
                foreach ($StudentList as $row) {   
                ?>
                <tr>
                    <!-- Display student details -->
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['user_name'] ; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['password'];?></td>    

                    <!-- Update button for each student -->
                    <td>
                        <a href="updatestd.php?id=<?php echo $row['id'];?>" type="submit" name="btnupdate">
                            <button class="btn btn-primary">Update</button>
                        </a>
                    </td>
                    <!-- Delete button for each student -->
                    <td>
                        <a href="deletestd.php?id=<?php echo $row['id'];?>">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>  
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
