<?php
session_start();
include 'config.php';
$msg = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Validate login
    $sql = "SELECT * FROM profiles WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Password is correct, set session and redirect based on role
            $_SESSION['SESSION_EMAIL'] = $email;
            if ($user['role'] === 'admin') {
                header('Location: admin_section/admin_dashboard.php');
            } else {
                header('Location: ./report_form.php');
            }
            exit();
        } else {
            // Password is incorrect
            $msg = "<div class='alert alert-danger'>Incorrect password.</div>";
        }
    } else {
        // User not found
        $msg = "<div class='alert alert-danger'>User not found.</div>";
    }
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Form - Crime Reporting System</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <link rel="stylesheet" href="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></link>

</head>

<body>


    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">

                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images/3863479-removebg-preview.png" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Login Now</h2>
                        <p>Login To Crime Reporting System </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password"
                                style="margin-bottom: 2px;" required>
                            <p><a href="forgot-password.php"
                                    style="margin-bottom: 15px; display: block; text-align: right;">Forgot
                                    Password?</a></p>
                            <button name="submit" class="btn" type="submit">Login</button>
                        </form>
                        <div class="social-icons">
                            <p>Create Account! <a href="register.php">Register</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>



</body>

</html>
