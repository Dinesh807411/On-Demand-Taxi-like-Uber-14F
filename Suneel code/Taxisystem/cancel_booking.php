<?php
include("./db/connection.php");

// Check if the booking ID is provided
if (isset($_POST['bookingId'])) {
    $bookingId = $_POST['bookingId'];

    // Fetch the current status of the booking
    $sqlSelectStatus = "SELECT status FROM bookings WHERE id = '$bookingId'";
    $statusResult = $conn->query($sqlSelectStatus);

    if ($statusResult->num_rows > 0) {
        $statusRow = $statusResult->fetch_assoc();
        $currentStatus = $statusRow['status'];

        if ($currentStatus == 'confirm') {
            // If the current status is "confirm", update it to "pending"
            $updateStatusSql = "UPDATE bookings SET status = 'Pending' WHERE id = '$bookingId'";
            if ($conn->query($updateStatusSql) === TRUE) {
                echo 'Booking status updated to pending successfully.';
            } else {
                echo 'Error updating booking status: ' . $conn->error;
            }
        } elseif ($currentStatus == 'Pending') {
            // If the current status is "pending", delete the booking
            $deleteSql = "DELETE FROM bookings WHERE id = '$bookingId'";
            if ($conn->query($deleteSql) === TRUE) {
                echo 'Booking deleted successfully.';
            } else {
                echo 'Error deleting booking: ' . $conn->error;
            }
        }
        
    } else {
        echo 'Booking not found.';
    }
} else {
    echo 'Invalid request.';
}

// Close the database connection
$conn->close();
?>
