<?php
include("./adminheader.php");
include("./sidebar.php");
include("../db/connection.php"); // Make sure to include your database connection file
echo '<div style="margin-top: 70px;"></div>';
// Fetch all booking details from the bookings table
$sql = "SELECT * FROM bookings";
$result = mysqli_query($conn,$sql);

// Check if there are any bookings
if ($result->num_rows > 0) {
    echo '<div class="container mt-5">';
    echo '<h2 class="mb-18">All Bookings</h2>';
    echo '<table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>UserID</th>
                    <th>RiderID</th>
                    <th>Username</th>
                    <th>Current_location</th>
                    <th>destination_location</th>
                    <th>booking_date</th>
                    <th>status</th>
                    <th>vehicleType</th>
                    <th>bookingOption</th>
                    <th>price</th>
                    <th>userConfirmation</th>
                </tr>
            </thead>
            <tbody>';

    while ($rowBooking = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $rowBooking["id"] . '</td>
                <td>' . $rowBooking["UserID"] . '</td>
                <td>' . $rowBooking["RiderID"] . '</td>
                <td>' . $rowBooking["Username"] . '</td>
                <td>' . $rowBooking["current_location"] . '</td>
                <td>' . $rowBooking["destination_location"] . '</td>
                <td>' . $rowBooking["booking_date"] . '</td>
                <td>' . $rowBooking["status"] . '</td>
                <td>' . $rowBooking["vehicleType"] . '</td>
                <td>' . $rowBooking["bookingOption"] . '</td>
                <td>' . $rowBooking["price"] . '</td>
                <td>' . $rowBooking["userConfirmation"] . '</td>
              </tr>';
    }

    echo '</tbody></table>';
    echo '</div>';
} else {
    echo '<div class="alert alert-warning" role="alert">No bookings found.</div>';
}

// Close the database connection
$conn->close();
?>

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