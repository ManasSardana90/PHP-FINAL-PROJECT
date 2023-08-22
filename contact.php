<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Set the character encoding for the document -->
  <meta charset="utf-8">
  <!-- Set the viewport for responsive web design -->
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Set the title of the webpage -->
  <title>Manas Technologies</title>
  
  <!-- Link to Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Link to the main CSS file for the site -->
  <link href="css/style.css" rel="stylesheet">
 </head>

<body>

  <!-- Include the Top Bar / Header for the site -->
<?php include('includes/header.php'); ?>

  <!-- Contact Section -->
  <section id="contact" class="contact text-center">
      <div class="container">

        <!-- Section title for contact -->
        <div class="section-title">
          <h2 data-aos="fade-up">Register Now</h2>
          <p data-aos="fade-up"></p>
        </div>

        <!-- Contact form -->
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
          <div class="col-xl-5 col-lg-12 mt-4">
            <!-- Form action points to "forms/contact.php" where the form data is processed -->
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <!-- Input field for name -->
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <!-- Input field for email -->
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <!-- Input field for subject -->
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <!-- Submit button for the form -->
              <div class="text-center"><button type="submit">Submit</button></div>
            </form>
          </div>
        </div>

      </div>
  </section>

  <!-- End of Contact Section -->
  
  <!-- Include the Footer for the site -->
 <?php include('includes/footer.php'); ?>

</body>

</html>
