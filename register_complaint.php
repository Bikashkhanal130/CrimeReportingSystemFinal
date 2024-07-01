<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $complaint = $_POST["complaint"];
    
    // You can add your logic here to process the complaint, save it to a database, etc.
    // For demonstration purposes, let's just echo the complaint for now.
    echo "Complaint Registered: " . $complaint;
}
?>
