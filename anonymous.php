<?php
session_start();

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

// Initialize message variable
$message = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $report_type = $_POST["report-type"];
  $description = $_POST["description"];
  
  // Directories for uploading files
  $imageUploadDir = 'anon_uploads/image'; // Use a relative path
  $videoUploadDir = 'anon_uploads/video'; // Use a relative path

  // Ensure the directories exist
  if (!is_dir($imageUploadDir)) {
      mkdir($imageUploadDir, 0777, true);
  }
  if (!is_dir($videoUploadDir)) {
      mkdir($videoUploadDir, 0777, true);
  }

  // Image upload
  $imageFilePath = NULL;
  if (!empty($_FILES["image"]["tmp_name"])) {
      // Get the temporary filename of the uploaded image
      $tmpName = $_FILES["image"]["tmp_name"];

      // Generate a unique filename to prevent overwriting existing files
      $imageName = uniqid('image_') . '_' . basename($_FILES["image"]["name"]);

      // Move the uploaded image to the desired directory
      if (move_uploaded_file($tmpName, $imageUploadDir . '/' . $imageName)) {
          // File upload successful, store the filename in the database
          $imageFilePath = $imageUploadDir . '/' . $imageName;
      } else {
          // File upload failed, handle the error
          $message = "Error uploading image file";
      }
  }

  // Video upload
  $videoFilePath = NULL;
  if (!empty($_FILES["video"]["tmp_name"])) {
      // Get the temporary filename of the uploaded video
      $tmpName = $_FILES["video"]["tmp_name"];

      // Generate a unique filename to prevent overwriting existing files
      $videoName = uniqid('video_') . '_' . basename($_FILES["video"]["name"]);

      // Move the uploaded video to the desired directory
      if (move_uploaded_file($tmpName, $videoUploadDir . '/' . $videoName)) {
          // File upload successful, store the filename in the database
          $videoFilePath = $videoUploadDir . '/' . $videoName;
      } else {
          // File upload failed, handle the error
          $message = "Error uploading video file";
      }
  }

  // Prepare and execute SQL statement
  $sql = "INSERT INTO anonymous_reports (report_type, description, image_path, video_path) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  
  // Check if statement preparation was successful
  if ($stmt) {
    $stmt->bind_param("ssss", $report_type, $description, $imageFilePath, $videoFilePath); // ssss indicates four string parameters
    if ($stmt->execute()) {
      // Set session variable for success message
      $_SESSION['report_success'] = true;
      $message = "Report submitted successfully!";
    } else {
      $message = "Error: " . $stmt->error;
    }
    // Close statement
    $stmt->close();
  } else {
    $message = "Error: " . $conn->error;
  }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS Styles -->
    <link rel="stylesheet" href="anonymous.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> <!-- Iconscout CSS -->

    <title>Anonymous Reporting</title>
    
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    .sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #333;
        overflow-x: hidden;
        padding-top: 20px;
    }

    .sidebar a {
        padding: 20px 30px;
        text-decoration: none;
        margin-top: 10vh;
        font-size: 18px;
        color: white;
        display: block;
        transition: 0.3s;
    }

    .sidebar a.button {
        padding: 12px 30px; /* Adjust padding */
        background-color: #555; /* Button background color */
        border: none;
        text-align: center;
        cursor: pointer;
        display: block;
        margin-top: 500px; /* Adjust margin for spacing */
        text-decoration: none;
        border-radius: 5px; /* Rounded corners */
        transition: background-color 0.3s;
    }

    .sidebar a.button:hover {
        background-color: #777; /* Darken color on hover */
    }

    .main-content {
        margin-left: 250px;
        padding: 20px;
    }

    .title {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .title i {
        font-size: 32px;
        margin-right: 10px;
    }

    .text {
        font-size: 24px;
    }

    .report-form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .report-form label,
    .report-form textarea,
    .report-form select,
    .report-form input[type="file"],
    .report-form button {
        display: block;
        margin-bottom: 10px;
        width: 100%;
    }

    .report-form textarea {
        height: 100px;
        resize: vertical;
    }

    .report-form button {
        padding: 12px;
        background-color: #333;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .report-form button:hover {
        background-color: #555;
    }
</style>


    <!-- JavaScript for Alert -->
    <script>
        // Check if session variable for success exists and display alert
        <?php if (isset($_SESSION['report_success']) && $_SESSION['report_success']) : ?>
            alert("Report submitted successfully!");
            <?php unset($_SESSION['report_success']); ?> // Unset session variable after displaying alert
        <?php endif; ?>
    </script>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
     
        <a href="#">Submit Report</a>

        <a href="logout.php" class="button">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="title">
            <i class="uil uil-thumbs-up"></i>
            <span class="text">Anonymous Reporting</span>
        </div>
        <form class="report-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <label for="report-type">Type of Incident:</label>
            <select id="report-type" name="report-type">
                <option value="assault">Assault</option>
                <option value="theft">Theft</option>
                <option value="scam">Scam</option>
                <option value="vandalism">Vandalism</option>
            </select>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" accept="image/*"> <br><br>

            <label for="video">Upload Video:</label>
            <input type="file" id="video" name="video" accept="video/*"><br> <br>

            <button type="submit">Submit Report</button>
        </form>
    </div>
</body>
</html>
