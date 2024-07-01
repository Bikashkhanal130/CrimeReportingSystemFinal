<?php
// Check if the form data is submitted and the required fields are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adminRemarks']) && isset($_POST['reviewCaseId'])) {
    // Database connection (adjust according to your setup)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "login";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement to update admin remarks and status
    $sql = "UPDATE report_crime SET admin_remarks = ?, status = 'Solved' WHERE case_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $_POST['adminRemarks'], $_POST['reviewCaseId']);

    // Execute the SQL statement
    if ($stmt->execute()) {
        echo "Status updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Form submission error: Required parameters are missing.";
}
?>
