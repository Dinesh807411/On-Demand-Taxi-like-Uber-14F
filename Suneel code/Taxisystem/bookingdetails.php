<?php
include("./db/connection.php");

// Check if the user is authenticated
if (isset($_SESSION['UserID'])) {
    $userId = $_SESSION['UserID'];

    // Fetch and display booking details for the authenticated user
    $sqlSelect = "SELECT * FROM bookings WHERE UserID = '$userId'";
    $result = $conn->query($sqlSelect);

    // Display booking details in a table with Bootstrap styling
    echo '<div class="container mt-5">';
    echo '<h2 class="mb-4">Your Booking Details</h2>';

    if ($result->num_rows > 0) {
        echo '<table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Current Location</th>
                        <th>Destination Location</th>
                        <th>Status</th>
                        <th>Vehicle Type</th>
                        <th>Booking Option</th>
                        <th>Price</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row["id"] . '</td>
                    <td>' . $row["current_location"] . '</td>
                    <td>' . $row["destination_location"] . '</td>

                   <td>' . $row["vehicleType"] . '</td>
                    <td>' . $row["bookingOption"] . '</td>



                    <td>' . $row["status"] . '</td>
                    <td>' . ($row["status"] == "confirm" ? $row["price"] : "") . '</td>
                    <td>';

            if ($row["status"] == "confirm") {
                echo '<button class="btn btn-success" data-id="' . $row["id"] . '" data-price="' . $row["price"] . '" onclick="acceptBooking(' . $row["id"] . ',' . $row["price"] . ')">Accept</button> ';
            }

            if ($row["status"] == "complete") {
                $sqlCheckRating = "SELECT * FROM ratings WHERE BookingID = '" . $row["id"] . "' AND UserID = '$userId'";
                $resultCheckRating = $conn->query($sqlCheckRating);

                if ($resultCheckRating->num_rows > 0) {
                    echo '<span class="rated-text">Rated</span>';
                } else {
                    echo '<button class="btn btn-primary" data-id="' . $row["id"] . '" onclick="openRatingModal(' . $row["id"] . ')">Rate & Review</button> ';
                }
            } else {
                echo '<button class="btn btn-danger" data-id="' . $row["id"] . '" onclick="cancelBooking(' . $row["id"] . ')">Cancel</button>';
            }

            echo '</td>
                  </tr>';
        }
        echo '</tbody></table>';
    } else {
        echo '<div class="alert alert-warning" role="alert">No bookings found.</div>';
    }

    echo '</div>';
} else {
    // Redirect to the login page if the user is not authenticated
    header("Location: login.php");
    exit();
}

// Close the database connection
$conn->close();
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>

    
    // JavaScript function to handle booking acceptance
    function acceptBooking(bookingId, acceptPrice) {
        if (confirm('Are you sure you want to accept this booking with the price ' + acceptPrice + '?')) {
            // Send an AJAX request to the server to handle the acceptance logic
            $.post('accept_booking.php', { bookingId: bookingId, acceptPrice: acceptPrice }, function (response) {
                // Handle the response from the server (e.g., show a success message)
                alert(response);
                // Reload the page or update the booking details dynamically
                location.reload();
            });
        }
    }

    // JavaScript function to handle booking cancellation
    function cancelBooking(bookingId) {
        if (confirm('Are you sure you want to cancel this booking?')) {
            // Send an AJAX request to the server to handle the cancellation logic
            $.post('cancel_booking.php', { bookingId: bookingId }, function (response) {
                // Handle the response from the server (e.g., show a success message)
                alert(response);
                // Reload the page or update the booking details dynamically
                location.reload();
            });
        }
    }

    // JavaScript function to handle opening the rating modal
    function openRatingModal(bookingId) {
        $('#ratingModal').modal('show');

        // Set the bookingId in the hidden input field of the modal
        $('#ratingModal #bookingId').val(bookingId);
    }

</script>

<!-- Modal for Rating and Review -->
<div class="modal" tabindex="-1" role="dialog" id="ratingModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rate & Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="submit_rating.php" method="POST">
            <div class="modal-body">
                <!-- Add your rating and review form here -->
                <!-- Example: -->
                <label for="rating">Rating:</label>
                <input type="number" id="rating" name="rating" min="1" max="5">
                <label for="review">Review:</label>
                <textarea id="review" name="review"></textarea>
                <input type="hidden" id="bookingId" name="bookingId">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
