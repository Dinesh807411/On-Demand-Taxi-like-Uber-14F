<?php
// accept_booking.php

include("./db/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bookingId'], $_POST['acceptPrice'])) {
    $bookingId = $_POST['bookingId'];
    $acceptPrice = $_POST['acceptPrice'];

    // Perform necessary validation and update the database accordingly
    // For example:
    $updateSql = "UPDATE bookings SET status = 'complete', price = $acceptPrice WHERE id = $bookingId";

    if ($conn->query($updateSql)) {
        echo 'Booking accepted successfully.';
    } else {
        echo 'Error accepting booking: ' . $conn->error;
    }
} else {
    echo 'Invalid request.';
}

// Close the database connection
$conn->close();
?>
