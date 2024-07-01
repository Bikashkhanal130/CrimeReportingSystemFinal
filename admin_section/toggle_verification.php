<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "login";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if toggle button is clicked
if(isset($_POST['toggle_btn'])) {
    // Check if report_id is set and not empty
    if(isset($_POST['report_id']) && !empty($_POST['report_id'])) {
        $report_id = $_POST['report_id'];

        // Get current verification status
        $sql_select = "SELECT verification FROM report_crime WHERE case_id = ?";
        $stmt = $conn->prepare($sql_select);
        $stmt->bind_param("s", $report_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $current_status = $row['verification'];

            // Toggle the verification status
            $new_status = ($current_status == "verified") ? "pending" : "verified";

            // Update the verification status in the database
            $sql_update = "UPDATE report_crime SET verification = ? WHERE case_id = ?";
            $stmt = $conn->prepare($sql_update);
            $stmt->bind_param("ss", $new_status, $report_id);
            if ($stmt->execute()) {
                echo "Verification status toggled successfully";
            } else {
                echo "Error updating verification status: " . $conn->error;
            }
        } else {
            echo "Report not found";
        }
    } else {
        echo "Report ID not provided";
    }
} else {
    echo "Toggle button not clicked"; // Debug statement to check if the toggle button is clicked
}

// Close database connection
$conn->close();
?>
