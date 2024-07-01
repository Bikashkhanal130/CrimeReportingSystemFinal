<?php
session_start();

// Database credentials
$host = 'localhost';
$db = 'login';
$user = 'root';
$pass = '';

// Define your secret admin code
define('ADMIN_CODE', 'crime'); // Replace with your actual secret code

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $loginError = '';
    $registerError = '';
    $registerSuccess = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['login'])) {
            // Login process
            $username = $_POST['username'];
            $password = $_POST['password'];

            $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = ?');
            $stmt->execute([$username]);
            $admin = $stmt->fetch();

            if ($admin && password_verify($password, $admin['password'])) {
                $_SESSION['admin_logged_in'] = true;
                header('Location: admin_dashboard.php'); // Change to your dashboard page
                exit;
            } else {
                $loginError = 'Invalid username or password';
            }
        } elseif (isset($_POST['register'])) {
            // Registration process
            $newUsername = $_POST['new_username'];
            $newPassword = $_POST['new_password'];
            $adminCode = $_POST['admin_code']; // Retrieve admin code from form

            // Validate admin code
            if ($adminCode !== ADMIN_CODE) { // Check against predefined admin code
                $registerError = 'Invalid admin code. Registration not allowed.';
            } else {
                // Proceed with registration
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                try {
                    $stmt = $pdo->prepare('INSERT INTO admins (username, password) VALUES (?, ?)');
                    $stmt->execute([$newUsername, $hashedPassword]);
                    $registerSuccess = 'Registration successful! You can now log in.';
                } catch (PDOException $e) {
                    if ($e->getCode() == 23000) {
                        $registerError = 'Username already exists. Please choose another one.';
                    } else {
                        $registerError = 'Error: ' . $e->getMessage();
                    }
                }
            }
        }
    }
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login and Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            max-width: 400px;
            width: 100%;
        }
        .container h2 {
            margin-bottom: 20px;
        }
        .container input[type="text"], .container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        .success {
            color: green;
            margin-top: 10px;
        }
        .toggle-link {
            color: #4CAF50;
            cursor: pointer;
            text-decoration: underline;
            display: block;
            margin-top: 10px;
            text-align: center;
        }
    </style>
    <script>
        function showRegisterForm() {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'block';
        }

        function showLoginForm() {
            document.getElementById('login-form').style.display = 'block';
            document.getElementById('register-form').style.display = 'none';
        }
    </script>
</head>
<body>
    <div class="container">
        <div id="login-form">
            <h2>Admin Login</h2>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" name="login" value="Login">
            </form>
            <?php
                if (!empty($loginError)) {
                    echo '<p class="error">' . $loginError . '</p>';
                }
            ?>
            <span class="toggle-link" onclick="showRegisterForm()">Don't have an account? Register</span>
        </div>

        <div id="register-form" style="display: none;">
            <h2>Admin Register</h2>
            <form action="" method="POST">
                <input type="text" name="new_username" placeholder="New Username" required>
                <input type="password" name="new_password" placeholder="New Password" required>
                <input type="text" name="admin_code" placeholder="Admin Code" required> <!-- New field for admin code -->
                <input type="submit" name="register" value="Register">
            </form>
            <?php
                if (!empty($registerError)) {
                    echo '<p class="error">' . $registerError . '</p>';
                }
                if (!empty($registerSuccess)) {
                    echo '<p class="success">' . $registerSuccess . '</p>';
                }
            ?>
            <span class="toggle-link" onclick="showLoginForm()">Already have an account? Login</span>
        </div>
    </div>
</body>
</html>
