<?php
// cancel_booking.php

include("./db/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bookingId'])) {
    $bookingId = $_POST['bookingId'];

    // Perform necessary validation and update the database accordingly
    // For example:
    $updateSql = "UPDATE bookings SET status = 'pending' WHERE id = $bookingId";

    if ($conn->query($updateSql)) {
        echo 'Booking canceled successfully.';
    } else {
        echo 'Error canceling booking: ' . $conn->error;
    }
} else {
    echo 'Invalid request.';
}

// Close the database connection
$conn->close();
?>
