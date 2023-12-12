<?php
include("./riderheader.php");
include("../db/connection.php");
echo '<div style="margin-top: 70px;"></div>';
?>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .custom-container {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .custom-booking-card {
        border: 2px solid #3498db;
        padding: 15px;
        margin-bottom: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s;
    }

    .custom-booking-card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .custom-booking-card p {
        margin: 8px 0;
    }

    .custom-booking-card form {
        margin-top: 10px;
        display: flex;
        flex-direction: column; /* Adjusted to show elements in a column */
        align-items: flex-start; /* Adjusted to align items to the start of the column */
    }

    .custom-booking-card form select,
    .custom-booking-card form input[type="number"],
    .custom-booking-card form .confirmation {
        padding: 8px;
        margin-bottom: 10px; /* Added margin to separate the input fields */
        width: 100%; /* Make the input fields take full width */
    }

    .custom-booking-card form .price {
        display: block; /* Initially display the price input */
    }

    .custom-booking-card form .confirmation {
        display: none; /* Initially hide the user confirmation */
        color: #27ae60; /* Green color for confirmation text */
    }

    .custom-booking-card form input[type="submit"] {
        padding: 10px;
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .custom-booking-card form input[type="submit"]:hover {
        background-color: #2980b9;
    }
</style>

<script>
    function togglePriceConfirmation(bookingId) {
        var priceInput = document.getElementById('priceInput-' + bookingId);
        var confirmationText = document.getElementById('confirmationText-' + bookingId);

        if (priceInput.value !== "") {
            // If price is entered, hide price input and show confirmation text
            priceInput.style.display = 'none';
            confirmationText.style.display = 'block';
        }
    }
</script>

<?php

// Check if the current rider has not changed the status yet
$riderId = $_SESSION['UserID']; // Assuming you have a rider ID in the session
$checkStatusSql = "SELECT * FROM bookings WHERE RiderID = '' OR RiderID = $riderId";
$checkStatusResult = mysqli_query($conn, $checkStatusSql);

// Check if there are bookings
if ($checkStatusResult->num_rows > 0) {
    while ($row = $checkStatusResult->fetch_assoc()) {
        $bookingId = $row['id']; // Modify this line to use the correct column name
        $userId = $row['UserID']; // Add this line to fetch the UserID
        $username = $row['Username']; // Add this line to fetch the Username
        $currentLocation = $row['current_location'];
        $destinationLocation = $row['destination_location'];
        $bookingDate = $row['booking_date'];
        $status = $row['status'];
        $price = $row['price'];
        $userConfirmation = $row['userConfirmation']; // New column for user confirmation status

        // Display each booking in a separate card
        echo '<div class="custom-booking-card">';
        echo '<p>Booking ID: ' . $bookingId . '</p>';
        echo '<p>User ID: ' . $userId . '</p>';
        echo '<p>Username: ' . $username . '</p>';
        echo '<p>Current Location: ' . $currentLocation . '</p>';
        echo '<p>Destination Location: ' . $destinationLocation . '</p>';
        echo '<p>Booking Date: ' . $bookingDate . '</p>';
        echo '<p>Status: ' . $status . '</p>';

        // Show user confirmation status
        if ($userConfirmation == '' && $price == 0) {
            // Allow the current rider to change the status and enter the price
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="bookingId" value="' . $bookingId . '">';
            echo '<select name="newStatus">';
            echo '<option value="confirm">Confirm</option>';
            echo '</select>';
            echo '<input id="priceInput-' . $bookingId . '" class="price" type="number" name="price" placeholder="Enter Price" required>';
            echo '<div id="confirmationText-' . $bookingId . '" class="confirmation">User Confirmation: ' . $userConfirmation . '</div>';
            echo '<input type="submit" name="changeStatus" value="Change Status" onclick="togglePriceConfirmation(' . $bookingId . ');">';
            echo '</form>';
        } else {
            echo '<p>User Confirmation: ' . $userConfirmation . '</p>';
            echo '<p>Price:  ' .  $price . '</p>';
        }

        echo '</div>'; // Close the custom-booking-card div
    }
}

// Handle the form submission to change the status
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['changeStatus'])) {
    $bookingId = $_POST['bookingId'];
    $newStatus = $_POST['newStatus'];
    $price = $_POST['price'];

    // Update the status, price, and user confirmation in the bookings table
    $updateStatusSql = "UPDATE bookings SET RiderID = $riderId, status = '$newStatus', price = $price, userConfirmation = 'Pending' WHERE id = $bookingId"; // Modify this line to use the correct column names
    if (mysqli_query($conn, $updateStatusSql)) {
        // Record the status change in the booking_status table

        echo '<div class="custom-booking-card success-message">Status changed successfully. User confirmation pending.</div>';
    } else {
        echo '<div class="custom-booking-card error-message">Error changing status: ' . mysqli_error($conn) . '</div>';
    }
}


?>
