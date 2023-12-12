<?php
include("./header.php");
include("./db/connection.php");

// Function to sanitize user input
function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

// Function to display alerts
function showAlert($message, $alertType = 'success') {
    echo '<div class="alert alert-' . $alertType . '" role="alert">' . $message . '</div>';
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $currentLocation = isset($_POST['currentLocation']) ? sanitizeInput($_POST['currentLocation']) : '';
    $destinationLocation = isset($_POST['destinationLocation']) ? sanitizeInput($_POST['destinationLocation']) : '';
    $vehicleType = isset($_POST['vehicleType']) ? sanitizeInput($_POST['vehicleType']) : '';
$bookingOption = isset($_POST['bookingOption']) ? sanitizeInput($_POST['bookingOption']) : '';

    // Assuming you have user authentication in place, you can access user details from the session
    // Modify the following lines based on your authentication method
    $userId = $_SESSION['UserID']; // Replace with the actual session variable storing user ID
    $userName = $_SESSION['Username']; // Replace with the actual session variable storing user name

    // Insert data into the bookings table
    $sql = "INSERT INTO bookings (UserID, Username, current_location, destination_location, vehicleType, bookingOption, status)
        VALUES ('$userId', '$userName', '$currentLocation', '$destinationLocation', '$vehicleType', '$bookingOption', 'Pending')";

    // Perform the database query
    if ($conn->query($sql) === TRUE) {
        showAlert('Booking saved successfully. Your booking is pending.');
    } else {
        showAlert('Error: ' . $sql . '<br>' . $conn->error, 'danger');
    }
}

// Display the form
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your head content here -->
</head>

<body>

    <section class="registration-section custom-height" id="hero">
        <!-- Add your hero section content here -->
    </section>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <h2>Select Current and Destination Locations</h2>
                <!-- Your form content here -->
                <!-- Inside the form -->
                <form id="bookingForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="currentLocation">Pickup Location:</label>
                        <input type="text" class="form-control" name="currentLocation" id="currentLocation" required>
                    </div>

                    <div class="form-group">
                        <label for="destinationLocation">Drop Location:</label>
                        <input type="text" class="form-control" name="destinationLocation" id="destinationLocation"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="vehicleType">Select Vehicle Type:</label>
                        <select class="form-control" name="vehicleType" id="vehicleType" required>
                            <option value="four-wheeler">Luxury</option>
                            <option value="four-wheeler">Standard</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bookingOption">Select Booking Option:</label>
                        <select class="form-control" name="bookingOption" id="bookingOption" required>
                            <option value="single">Single</option>
                            <option value="sharing">Sharing</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Book Vehicle</button>
                </form>


            </div>

            <div class="col-lg-6 mb-5">
                <img src="https://i.pinimg.com/originals/b7/8c/a9/b78ca99cdd5a20a2aea93dec8a3dae70.jpg" alt="Map"
                    class="img-fluid">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Bootstrap JS scripts -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php
    include("./bookingdetails.php");
    include("./footer.php");
    ?>

</body>

</html>