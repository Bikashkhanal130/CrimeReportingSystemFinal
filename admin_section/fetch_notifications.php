<?php
// Database connection (assuming the same setup as above)

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

header('Content-Type: application/json');

// Fetch notifications
$sql_fetch = "SELECT name, report_type, description, submission_date FROM report_crime ORDER BY submission_date DESC LIMIT 10";
$result = $conn->query($sql_fetch);

if ($result->num_rows > 0) {
    $notifications = [];
    while ($row = $result->fetch_assoc()) {
        $notifications[] = $row;
    }
    echo json_encode(["status" => "success", "data" => $notifications]);
} else {
    echo json_encode(["status" => "success", "data" => []]);
}

$conn->close();
?>
