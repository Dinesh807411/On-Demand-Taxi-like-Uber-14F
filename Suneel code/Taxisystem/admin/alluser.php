<?php
include("./adminheader.php");
include("./sidebar.php");

include("../db/connection.php");
// Assuming you have a database connection

echo '<div style="margin-top: 70px;"></div>';

// Fetch all users from the database
$sql = "SELECT * FROM users WHERE UserType = 'user'";
$result = mysqli_query($conn,$sql);

// Check if there are users
if ($result->num_rows > 0) {
    echo '<table class="table">'; // Assuming you want to display users in a table
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Username</th>';
    echo '<th>Email</th>';
    echo '<th>Phone</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['UserID'] . '</td>';
        echo '<td>' . $row['Username'] . '</td>';
        echo '<td>' . $row['Email'] . '</td>';
        echo '<td>' . $row['Phone'] . '</td>';
        echo '<td><a href="?delete=' . $row['UserID'] . '">Delete</a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo 'No users found.';
}

// Check if a user deletion is requested
if (isset($_GET['delete'])) {
    $userIdToDelete = $_GET['delete'];
    
    // Perform the deletion (you should use prepared statements to prevent SQL injection)
    $deleteSql = "DELETE FROM users WHERE id = $userIdToDelete";
    if ($mysqli->query($deleteSql) === TRUE) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . $mysqli->error;
    }
}


// Close the database connection



?>

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