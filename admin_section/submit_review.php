<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "login";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminRemarks = $_POST['adminRemarks'];
    $reportId = $_POST['reviewCaseId'];

    // Update admin_remarks in report_crime table
    $sql = "UPDATE report_crime SET admin_remarks = ? WHERE case_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $adminRemarks, $reportId);

    if ($stmt->execute()) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }

    $stmt->close();
    $conn->close();
}
?>
