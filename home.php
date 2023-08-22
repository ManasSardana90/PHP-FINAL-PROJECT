<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Manas Technologies</title>


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>

<body>

  <!--Top Bar -->
<?php include('includes/header.php'); ?>
  <!--Hero Section-->
  <?php include('includes/home.php'); ?>

  <!--Footer -->
 <?php include('includes/footer.php'); ?>

  <!-- Vendor JS Files -->
  <?php 

// Start or resume the session
session_start();

// Check if the user is logged in by seeing if session variables are set
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Set the character encoding for the document -->
  <meta charset="utf-8">
  <!-- Set the viewport for responsive web design -->
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Set the title of the webpage -->
  <title>Manas Technologies</title>

  <!-- Include Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Include the main CSS file for the site -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>

  <!-- Include the Top Bar / Header for the site -->
<?php include('includes/header.php'); ?>

  <!-- Include the Hero Section for the site -->
  <?php include('includes/home.php'); ?>

  <!-- Include the Footer for the site -->
 <?php include('includes/footer.php'); ?>


</body>

</html>

<?php 
}else{
     // If the user isn't logged in, redirect to the index page
     header("Location: index.php");
     exit();
}
?>


</body>

</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>