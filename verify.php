<?php
session_start();
include 'config.php';

if (isset($_POST['verify'])) {
    // Concatenate the OTP entered by the user
    $otp_entered = '';
    if (
        isset($_POST['otp1']) && isset($_POST['otp2']) && isset($_POST['otp3']) &&
        isset($_POST['otp4']) && isset($_POST['otp5']) && isset($_POST['otp6'])
    ) {
        $otp_entered .= $_POST['otp1'] . $_POST['otp2'] . $_POST['otp3'] .
                        $_POST['otp4'] . $_POST['otp5'] . $_POST['otp6'];
    }
    
    // Retrieve email and OTP from the session
    $email = isset($_SESSION['register_email']) ? $_SESSION['register_email'] : '';
    $otp_from_session = isset($_SESSION['otp']) ? $_SESSION['otp'] : '';

    // Validate OTP
    if ($otp_entered == $otp_from_session) {
        // OTP is correct
        // Retrieve name and password from the session
        $name = isset($_SESSION['register_name']) ? $_SESSION['register_name'] : '';
        $password = isset($_SESSION['register_password']) ? $_SESSION['register_password'] : '';

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the 'profiles' table
        $insert_sql = "INSERT INTO profiles (name, email, password, verified) VALUES ('$name', '$email', '$hashed_password', 1)";
        if (mysqli_query($conn, $insert_sql)) {
            // Registration successful, unset session variables
            unset($_SESSION['register_email']);
            unset($_SESSION['register_name']);
            unset($_SESSION['register_password']);
            unset($_SESSION['otp']);

            // Redirect to verification success page or dashboard
            header('Location: verification_success.php');
            exit();
        } else {
            // Error inserting user data
            echo "Error inserting user data: " . mysqli_error($conn);
        }
    } else {
        // Incorrect OTP
        echo "Invalid OTP. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verify</title>
  <link rel="stylesheet" href="form.css">
</head>
<body>
  <div class="form">
    <h2>Verify Your Account</h2>
    <p>We emailed you the six-digit OTP code. Enter the code below to confirm your email address.</p>
    <form action="verify.php" method="post" autocomplete="off">
      <div class="fields-input">
        <input type="text" name="otp1" class="otp_field" maxlength="1" required>
        <input type="text" name="otp2" class="otp_field" maxlength="1" required>
        <input type="text" name="otp3" class="otp_field" maxlength="1" required>
        <input type="text" name="otp4" class="otp_field" maxlength="1" required>
        <input type="text" name="otp5" class="otp_field" maxlength="1" required>
        <input type="text" name="otp6" class="otp_field" maxlength="1" required>
      </div>
      <div class="submit">
        <input type="submit" value="Verify Now" class="button" name="verify">
      </div>
    </form>
  </div>
  <script src="js/verify.js"></script>
</body>
</html>
