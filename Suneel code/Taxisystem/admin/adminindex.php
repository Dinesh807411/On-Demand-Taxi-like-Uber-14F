

<?php
include("./adminheader.php");
include("./sidebar.php");
?>

   

<body>

    <!-- ======= Header ======= -->
   

    <!-- ======= Sidebar ======= -->
    

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="adminindex.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- All Users Card -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">All Users</h5>
                                    <p class="card-text">View all users</p>
                                    <a href="alluser.php" class="btn btn-primary">Go to Users</a>
                                </div>
                            </div>
                        </div>

                        <!-- All Riders Card -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">All Riders</h5>
                                    <p class="card-text">View all riders</p>
                                    <a href="allrider.php" class="btn btn-primary">Go to Riders</a>
                                </div>
                            </div>
                        </div>

                        <!-- Blank Card (Replace href with the desired blank page URL) -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">All Bookings</h5>
                                    <p class="card-text">View All Booking</p>
                                    <a href="allbooking.php" class="btn btn-primary">Go to Booking Page</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Left side columns -->


                <!-- Right side columns -->








            </div>
        </section>

    </main><!-- End #main -->

   
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

