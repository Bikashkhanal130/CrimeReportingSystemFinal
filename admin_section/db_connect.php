<?php
// db_connect.php

$servername = "localhost";  // Change as needed
$username = "root";  // Change as needed
$password = "";  // Change as needed
$dbname = "login";  // Change as needed

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Uncomment the line below if you need UTF-8 support
// mysqli_set_charset($conn, "utf8");

?>
