<?php
// Database connection details
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

// Check if case_id is received via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['case_id'])) {
    // Using prepared statement to prevent SQL injection
    $case_id = $_POST['case_id'];
    $sql = "SELECT *, 
                   DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:%s') AS formatted_created_at,
                   admin_remarks
            FROM report_crime 
            WHERE case_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $case_id);  // "i" indicates integer type for case_id
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode(array("success" => true, "data" => $rows));
    } else {
        echo json_encode(array("success" => false, "message" => "No data found for Case ID: $case_id"));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Invalid request"));
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
