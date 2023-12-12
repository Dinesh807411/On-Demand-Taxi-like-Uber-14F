<?php
include("./db/connection.php");

session_start();

if (isset($_SESSION['UserID'])) {
    $UserID = $_SESSION['UserID'];
} 
// Check if the required POST data is set
if (isset($_POST['Submit'])) {
    // Assuming you have a way to get the user ID, replace 'YOUR_USER_ID_VARIABLE' with the actual variable or method to retrieve the user ID
   

    // Sanitize input data to prevent SQL injection
    $BookingID = $_POST['bookingId'];
    $Rating = $_POST['rating'];
    $Review = $_POST['review'];

    // Insert rating, review, booking_id, and user_id into the ratings table
    $insertSql = "INSERT INTO ratings (	BookingID, Rating, Review, UserID) VALUES ('$BookingID', '$Rating', '$Review', '$UserID')";
    
    if ($conn->query($insertSql) === TRUE) {
        echo "<script>alert('Rating and review submitted successfully.');</script>";
        header("location: home.php");
        exit();
        echo 'Rating and review submitted successfully.';
    } else {
        echo 'Error submitting rating and review: ' . $conn->error;
    }
} else {
    echo 'Invalid request.';
}

// Close the database connection
$conn->close();
?>