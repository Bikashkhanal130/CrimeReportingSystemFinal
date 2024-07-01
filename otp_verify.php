<?php
session_start();

// Assuming $otp_entered is obtained from user input

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Store OTP in the database
$otp = $_SESSION['otp'];
$sql = "INSERT INTO profiles (otp_code) VALUES ('$otp')";
if ($conn->query($sql) === TRUE) {
   
    if ($otp_entered == $_SESSION['otp']) {
        

        // Redirect user after successful verification
        header('Location: verification_success.php');
        exit();
    } else {
        // Incorrect OTP logic
        echo "Incorrect OTP entered.";
        // You can redirect the user back to the OTP entry page or handle as per your requirement
    }
} else {
    // Error storing OTP in database
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
<<<<<<< HEAD
<<<<<<< HEAD
?>
=======
?>
>>>>>>> ed5b065 (updated)
=======
?>
>>>>>>> e4424563e48f45e8322177b3c56f8533108b893a
