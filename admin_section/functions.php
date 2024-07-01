<?php

// Replace with your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Function to establish database connection
function db_connect() {
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Function to get all reports from the database
function get_reports() {
    $conn = db_connect();
    $sql = "SELECT * FROM report_crime";
    $result = $conn->query($sql);
    $reports = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $reports[] = $row;
        }
    }
    $conn->close();
    return $reports;
}

// Function to update report status (mark as solved)
function mark_as_solved($report_id) {
    $conn = db_connect();
    $sql = "UPDATE reports SET status = 1 WHERE case_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $report_id);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

// Function to submit review
function submit_review($report_id, $admin_remarks) {
    $conn = db_connect();
    $sql = "INSERT INTO reviews (report_id, admin_remarks) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $report_id, $admin_remarks);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

?>
