<?php
// check_reports.php

// Include database connection
include_once '../admin_section/db_connect.php';

// Query to count new reports
$sql = "SELECT COUNT(*) AS new_reports FROM report_crime WHERE status = 'new'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo $row['new_reports'];  // Return count of new reports
} else {
    echo '0';  // Return 0 if no new reports or error
}

mysqli_close($conn);
?>
