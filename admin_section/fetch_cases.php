<?php
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

// Fetch total cases reported
$sql_total = "SELECT COUNT(*) AS total_cases FROM report_crime";
$result_total = $conn->query($sql_total);
$total_cases = 0; // Initialize total cases variable

if ($result_total->num_rows > 0) {
    $row_total = $result_total->fetch_assoc();
    $total_cases = $row_total["total_cases"];
}

// Fetch solved cases count
$sql_solved = "SELECT COUNT(*) AS solved_cases FROM report_crime WHERE status = 'Solved'";
$result_solved = $conn->query($sql_solved);
$solved_cases = 0; // Initialize solved cases variable

if ($result_solved->num_rows > 0) {
    $row_solved = $result_solved->fetch_assoc();
    $solved_cases = $row_solved["solved_cases"];
}

// Calculate pending cases count
$pending_cases = $total_cases - $solved_cases;

// Close database connection
$conn->close();

// Prepare data in JSON format
$data = array(
    "total_cases" => $total_cases,
    "pending_cases" => $pending_cases,
    "solved_cases" => $solved_cases
);

// Return JSON response
echo json_encode($data);
?>
