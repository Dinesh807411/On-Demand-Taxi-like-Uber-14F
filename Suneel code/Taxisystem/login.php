<?php
include("./header.php");
?>
<section class="registration-section custom-height" id="hero">
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6 mb-8 m-auto center-image">
                    <img src="assets/img/login 11.jpg" alt="Registration Image" class="img-fluid rounded">
                </div>
                <div class="col-md-12">
                    <div class="card mt-8 mb-4">
                        <div class="card-body">
                            <form method="POST" action="">
                                <h2 class="text-center mb-4" style="font-family: 'Roboto', sans-serif;">Login</h2>

                                <div class="form-group mb-3">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="submit" name="login" value="Login" class="btn btn-primary btn-block">
                                </div>
                                <div class="text-center mt-3">
                                    <p style="font-family: 'Roboto', sans-serif;">Don't have an account? <a href="registration.php">Register here</a></p>
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
include("./db/connection.php");
if(isset($_POST['login']))
{
 $Email = $_POST['email'];   
 $Password = md5($_POST['password']);   

    
 $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `Email` = '$Email' AND  `Password` = '$Password' ");

    if(mysqli_num_rows($query) > 0)
    {
        echo "<script> alert('Login Successfull!') </script>";

        $data = mysqli_fetch_object($query);

        session_start();

        $_SESSION['UserID'] = $data->UserID;
        $_SESSION['Username'] = $data->Username;
        $_SESSION['Email'] = $data->Email;
        $_SESSION['Phone'] = $data->Phone;
        $_SESSION['Password'] = $data->Password;
       



        if($data->UserType === 'admin')
        {
            echo "<script> setTimeout(function(){ window.location.href = 'admin/adminindex.php'; }, 1000); </script>";
        }
        else if($data->UserType === 'rider')
        {
            echo "<script> setTimeout(function(){ window.location.href = 'rider/riderindex.php'; }, 1000); </script>";
        }
        else
        {
            echo "<script> setTimeout(function(){ window.location.href = 'home.php'; }, 1000); </script>";
        }
    }
    else
    {
        echo "<script> alert('Login Failed, Invalid Credentails!') </script>";
    }   

}
?>