<?php
// Include the header
include("./adminheader.php");
?>

<!-- Add any additional styles or link to external stylesheets here -->
<style>
    .dashboard {
        padding: 20px;
    }

    .card {
        border: 1px solid #ddd;
        padding: 20px;
        margin: 10px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        border-radius: 8px;
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: scale(1.05);
    }
</style>

<!-- Add your HTML content here -->
<div class="dashboard">
    <h2>Welcome to the Admin Panel Dashboard</h2>

    <div class="card">
        <h3>Total Users</h3>
        <p>1500</p>
    </div>

    <div class="card">
        <h3>Total Orders</h3>
        <p>500</p>
    </div>

    <div class="card">
        <h3>Revenue</h3>
        <p>$50,000</p>
    </div>

    <!-- Add more cards for additional metrics -->

</div>

<?php
// Include the footer
include("./adminfooter.php");
?>
