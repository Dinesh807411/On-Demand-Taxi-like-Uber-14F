<?php

include("../db/connection.php");
include("./adminheader.php");
include("./sidebar.php");
?>

<style>
    .styled-table {
        border-collapse: collapse;
        width: 100%;
        margin: 20px 0;
        font-size: 16px;
        text-align: left;
    }

    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
    }

    .styled-table th {
        background-color: #f2f2f2;
    }

    .styled-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .styled-table tbody tr:hover {
        background-color: #f1f1f1;
    }

    /* Add any additional styles as needed */
    .registration-section {
        background-color: #3498db;
        color: #fff;
        text-align: center;
        padding: 50px 0;
    }

    .custom-height {
        height: 200px; /* Adjust the height as needed */
    }
</style>

<?php
// Fetch data from the customersupport table
$sql = "SELECT * FROM customersupport";
$result = mysqli_query($conn, $sql);
?>

<h2>Contact Details</h2>
<div style='overflow-x:auto;'>
    <table class='styled-table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . $row["SupportID"] . "</td>
                        <td>" . $row["Username"] . "</td>
                        <td>" . $row["Email"] . "</td>
                        <td>" . $row["Subject"] . "</td>
                        <td>" . $row["Message"] . "</td>
                      </tr>";
            }
            ?>

        </tbody>
    </table>
</div>

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


<?php
// Check if there are results
if (mysqli_num_rows($result) == 0) {
    echo "<p>No results found.</p>";
}

// Close the connection
mysqli_close($conn);


?>
