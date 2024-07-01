<?php

session_start();
if (!isset($_SESSION['admin_authenticated']) || $_SESSION['admin_authenticated'] !== true) {
    // Redirect unauthorized users to the login page
    header('Location: ');
    exit();
}
?>

<!-- Admin registration form -->
<form action="admin_register_process.php" method="post">
    <input type="text" name="admin_username" placeholder="Admin Username" required>
    <input type="password" name="admin_password" placeholder="Admin Password" required>
    <!-- Add other admin-specific fields here -->
    <button type="submit" name="admin_register_btn">Register as Admin</button>
</form>
