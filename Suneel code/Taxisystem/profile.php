<?php include("./header.php"); ?>

<style>
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
        background-color: #f2f2f2;
        font-family: 'Arial', sans-serif;
    }

    .profile-container {
        max-width: 600px;
        width: 100%;
        margin: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        text-align: center;
    }

    .profile-header {
        background-color: #3498db;
        color: #fff;
        padding: 20px;
    }

    .profile-image-container {
        position: relative;
        margin-top: 13px; /* Adjusted margin */
    }

    .profile-indicator {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 4px solid #3498db;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
    }

    .profile-image {
        border-radius: 50%;
        max-width: 80px;
        height: auto;
        position: relative;
        z-index: 2;
    }

    .profile-info {
        padding: 20px;
        text-align: left;
    }

    .profile-heading {
        font-size: 24px;
        margin-bottom: 10px;
        color: #333;
    }

    .profile-text {
        font-size: 16px;
        margin-bottom: 8px;
        color: #555;
    }

    .update-form {
        padding: 20px;
        text-align: center;
    }

    .update-heading {
        font-size: 20px;
        margin-bottom: 15px;
        color: #333;
    }

    .update-label {
        display: block;
        margin-bottom: 8px;
        color: #777;
    }

    .update-input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
    }

    .update-submit {
        background-color: #4caf50;
        color: #fff;
        cursor: pointer;
        padding: 12px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
    }

    .update-password-link {
        margin-top: 10px;
        font-size: 14px;
        color: #3498db;
        text-decoration: none;
    }
</style>

<section class="registration-section custom-height" id="hero">
    <!-- Centered image for all users -->
</section>

<div class="profile-container">
    <?php
    // Check if the user is logged in
    if (isset($_SESSION['Username'])) {
        // User is logged in, retrieve user information
        $username = $_SESSION['Username'];
        $email = $_SESSION['Email'];
        $phone = $_SESSION['Phone'];

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateProfile'])) {
            // Get the new values from the form
            $newEmail = $_POST['newEmail'];
            $newPhone = $_POST['newPhone'];
            $newPassword = $_POST['newPassword'];

            // Here, you should validate and sanitize the input data to prevent SQL injection

            // Update the user data (you should use prepared statements to prevent SQL injection)
            // Example using MySQLi:
            $mysqli = new mysqli("your_host", "your_username", "your_password", "your_database");

            // Check connection
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            $sql = "UPDATE users SET email='$newEmail', phone='$newPhone', password='$newPassword' WHERE username='$username'";

            if ($mysqli->query($sql) === TRUE) {
                echo "Profile updated successfully";
                // Update the session variables if needed
                $_SESSION['Email'] = $newEmail;
                $_SESSION['Phone'] = $newPhone;
            } else {
                echo "Error updating profile: " . $mysqli->error;
            }

            $mysqli->close();
        }
    } else {
        // Redirect to the login page if the user is not logged in
        header("Location: login.php");
        exit();
    }
    ?>

    <div class="profile-header">
        <h2 class="profile-heading">Welcome, <?php echo $username; ?>!</h2>
    </div>

    <div class="profile-image-container">
        <div class="profile-indicator"></div>
        <img src="assets/img/user.jpg" alt="User Image" class="profile-image">
    </div>

    <div class="profile-info">
        <p class="profile-text"><strong>Email:</strong> <?php echo $email; ?></p>
        <p class="profile-text"><strong>Phone:</strong> <?php echo $phone; ?></p>
        <p class="profile-text"><strong>Password:</strong> *********</p>
    </div>

    <!-- Update profile form -->
    <div class="update-form">
        <h3 class="update-heading">Update Profile</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="newEmail" class="update-label">New Email:</label>
            <input type="email" name="newEmail" required class="update-input" value="<?php echo $email; ?>"><br>

            <label for="newPhone" class="update-label">New Phone:</label>
            <input type="text" name="newPhone" required class="update-input" value="<?php echo $phone; ?>"><br>

            <label for="newPassword" class="update-label">New Password:</label>
            <input type="password" name="newPassword" required class="update-input"><br>

            <input type="submit" name="updateProfile" value="Update Profile" class="update-submit">
        </form>

   
       
    </div>
</div>


