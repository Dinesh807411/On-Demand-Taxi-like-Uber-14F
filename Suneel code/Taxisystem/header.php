<?php
session_start();

if (isset($_SESSION['Username'])) {
    $username = $_SESSION['Username'];
} else {
    // Handle the case where the session variable is not set
    $username = ""; // You can set a default value or handle it in another way
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>EasyGo</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/2.png" rel="icon">
    <link href="assets/img/1.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: EasyGo
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/EasyGo-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="index.php"><span>EasyGo</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="./index.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="./index.php#about">About</a></li>
                    <li><a class="nav-link scrollto" href="./index.php#gallery">Gallery</a></li>
                    <?php
                    if($username != "")
                    {
                        ?>
                                        <li><a class="nav-link scrollto" href="./home.php">Booking</a></li>
                                        <li><a class="nav-link scrollto" href="./profile.php">Profile</a></li>
                                        <li><a class="nav-link scrollto" href="./logout.php">Logout</a></li>

                    <?php    
                    }
                    else
                    {
                    ?>
                    <li><a class="nav-link scrollto" href="./index.php#contact">Contact</a></li>
                    <li><a class="nav-link scrollto" href="./login.php">Login</a></li>
                    <li><a class="nav-link scrollto" href="./registration.php">Registration</a></li>

<?php
                    }
                    ?>




                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->