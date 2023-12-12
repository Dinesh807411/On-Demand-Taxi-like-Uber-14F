<?php
include("./header.php");
?>

<!-- ======= Hero Section ======= -->
<section class="registration-section custom-height" id="hero">
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
            <div class="col-md-6 mb-8 m-auto center-image">
                    <img src="assets/img/registration.jpg" alt="Registration Image" class="img-fluid rounded">
                </div>
                <div class="col-md-12">
                    <div class="card mt-8 mb-4">
                        <div class="card-body">
                            <form method="POST" action="">
                                <h2 class="text-center mb-4">Registration</h2>

                                <div class="form-group mb-3">
                                    <label for="username">Username:</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" class="form-control" required>
                                    <small class="text-muted">Password should be at least 8 characters long.</small>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="confirm_password">Confirm Password:</label>
                                    <input type="password" name="confirm_password" class="form-control" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="phone">Phone:</label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>

                                <div class="form-group text-center mt-3">
                                    <button type="submit" name="register"
                                        class="btn btn-primary btn-block">Register</button>
                                </div>

                                <div class="text-center mt-3">
                                    <p>Already have an account? <a href="login.php">Login here</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include("./footer.php");
?>
<?php
// Include the database connection file
include("./db/connection.php");

if(isset($_POST['register'])) {
    // Get form data
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Hash the password for security
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $userType = "user"; // Set UserType to "user" initially
    $confirm_password = md5($_POST['confirm_password']);

    if ($password != $confirm_password) {
        echo "<script>alert('Password and Confirm Password do not match. Please try again.');</script>";
        echo "<script>alert(`$password,$confirm_password`);</script>";

        exit(); // Exit the script if passwords don't match
    }

    else
    {
        // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (Username, Password, Email, Phone, UserType) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $password, $email, $phone, $userType);

    // Execute the prepared statement
    $query = $stmt->execute();

    // Check if the query was successful
    if($query) {
        echo "<script>alert('Registration successful!');</script>";
    } else {
        echo "<script>alert('Registration failed!');</script>";
    }
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
mysqli_close($conn);
?>
