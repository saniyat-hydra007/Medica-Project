<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medica</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/Medica/assets/img/favicon.png" rel="icon">
  <link href="/Medica/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/Medica/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/Medica/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/Medica/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/Medica/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/Medica/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/Medica/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/Medica/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/Medica/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna - v4.3.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="index.html"><span>Medica</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active " href="index.html">Home</a></li>
          <li><a href="team.html">Team</a></li>
          <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="http://localhost/lab7/blood_bank_search.php">Blood Bank</a></li>
              <li><a href="http://localhost/lab7/vaccination.php">COVID</a></li>
              <li><a href="http://localhost/lab7/ambulance.php">Ambulance</a></li>
              <li><a href="http://localhost/lab7/hospital_search.php">ICU</a></li>
            </ul>
          </li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
<br> <br> <br> <br>
<div style='margin-left:70px'><h4>Looking for Hospital beds? Enter your preffered location to find available hospital beds near you.</h4>
<div style='margin-left:70px'>
    <form action="" method="POST">
        <fieldset>
            <!-- <label >Bed Type</label> -->
            <!-- <input  type="text" name="type" placeholder='Mandatory'><br><br> -->
            <label>  District:</label>
<input style='margin-left:137px'type="text" name="District" placeholder='Mandatory'><br><br>
<label for="type">Choose hospital bed type:</label>
            <select name="type" id="type" placeholder='Mandatory'>
  <option value="Covid_icu">Covid_icu</option>
  <option value="General_icu">General_icu</option>
</select><br><br>
            <input style='margin-left:195px' name="search" type="submit" value="Search" >
        </fieldset>
    </form>
</div>
</div>
<?php
include_once 'db_connect.php';
if(isset($_POST['search'])){
  $t=$_POST['type'];
  $D=$_POST['District'];
  if($t=="Covid_icu"){
  $query1 = "SELECT * FROM covid_icu WHERE availability=\"yes\" AND district='$D' ORDER BY hospital_name";
  echo "COVID ICU List:<br><br>";
  }
  else if($t="General_icu"){
  $query1 = "SELECT * FROM general_icu WHERE availability=\"yes\" AND district='$D' ORDER BY hospital_name";
  echo "GENERAL ICU List:<br><br>";
  }
  $result1=$conn->query($query1);
  if($result1->num_rows>0){
    ?>
    <form method="POST">
    <form action="" method="POST">
    <input type="text"  name="Hospital_name" size="15"value="<?php echo "Hospital_name" ?>">
    <input type="text" name="email"size="15" value="<?php echo 'Email' ?>">
    <input type="text" name="contact_number" size="15"value="<?php echo 'Contact_Number' ?>">
    <input type="text" name="approximate_cost_per_bed_per_day"size="15" value="<?php echo 'approximate_cost_per_bed_per_day' ?>">
    <input type="text" name="bed_no"size="15" value="<?php echo 'bed_no' ?>">
    <input type="text" name="availability"size="15" value="<?php echo 'availability'?>">
    <input type="text" name="district"size="15" value="<?php echo 'District'?>">
    <input type="text" name="postal_code"size="15" value="<?php echo 'Postal_Code' ?>">
    <input type="text" name="thana"size="15" value="<?php echo 'Thana' ?>">
    <input type="text"style=margin-bottom:30px name="Street_No" size="15"value="<?php echo 'Street_No'?>">  
    </form>
    <?php
    while($row=$result1->fetch_assoc()){
    ?>
    <form method="POST">
    <input type="text" name="hospital_name" size="15" value="<?php echo $row['hospital_name'] ?>">
    <input type="text" name="email" size="15" value="<?php echo $row['email'] ?>">
    <input type="text" name="contact_number"size="15" value="<?php echo $row['contact_number'] ?>">
    <input type="text" name="approximate_cost_per_bed_per_day" size="15" value="<?php echo $row['approximate_cost_per_bed_per_day'] ?>">
    <input type="text" name="bed_no"size="15" value="<?php echo $row['bed_no'] ?>">
    <input type="text" name="availability" size="15"value="<?php echo $row['availability'] ?>">
    <input type="text" name="district" size="15"value="<?php echo $row['district'] ?>">
    <input type="text" name="postal_code"size="15" value="<?php echo $row['postal_code'] ?>">
    <input type="text" name="thana" size="15"value="<?php echo $row['thana'] ?>">
    <input type="text"style=margin-bottom:30px name="Street_No"size="15" value="<?php echo $row['Street_No']  ?>">
    </form>
    <?php
    }
  }
  else
  echo "No results<br><br>";
}
?>
<br><br><br><br><br><br><br><br>
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

    

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.html">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="team.html">Team</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.html">Contact us</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="http://localhost/lab7/blood_bank_search.php">Blood Bank</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://localhost/lab7/vaccination.php">Covid</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://localhost/lab7/ambulance.php">Ambulance</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="http://localhost/lab7/hospital_search.php">ICU</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              68/A Sonalibag, <br>
              Wireless Railgate Bara Moghbazar,<br>
              Dhaka 1217,Bangladesh <br><br>
              <strong>Phone:</strong> +8801537464293<br>
              <strong>Email:</strong> medica077993@gmail.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About Medica</h3>
            <p>It’s a website that is dedicated for emergency medical information and medical purpose. It will provide information during medical emergency situation, like in need of ICU, ambulance, blood etc. This website will be time saving and extremely helpful for the people in need.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Medica</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/Medica/assets/vendor/aos/aos.js"></script>
  <script src="/Medica/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/Medica/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/Medica/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/Medica/assets/vendor/php-email-form/validate.js"></script>
  <script src="/Medica/assets/vendor/purecounter/purecounter.js"></script>
  <script src="/Medica/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/Medica/assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="/Medica/assets/js/main.js"></script>

</body>

</html>