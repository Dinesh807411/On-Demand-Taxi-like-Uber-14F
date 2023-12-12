
<!-- contactUs code -->
<?php
include("../db/connection.php");

if(isset($_POST['submit']))
{
 $name = $_POST['name'];   
 $email = $_POST['email'];   
 $subject = $_POST['subject'];   
 $message = $_POST['message'];   

 
 $query = mysqli_query($conn, "INSERT INTO customersupport (`Username`, `Email`, `Subject`, `Message`) VALUES ('$name', '$email', '$subject', '$message') ");

 if($query)
 {
    echo "<script> alert('QUery or Feedback Sent Successfully!') </script>";

    echo "<script> setTimeout(function(){ window.location.href = 'index.php'; }, 1000); </script>";

}
 else
 {
    echo "<script> alert('ContactUs Failed!') </script>";
}
 
}
?>
<!-- contactUs code -->