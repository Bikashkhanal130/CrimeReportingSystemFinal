<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "login";

// Attempt to establish connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to generate a unique 4-character ID
function generateUniqueID() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $caseID = "";
    $length = 4;
    for ($i = 0; $i < $length; $i++) {
        $caseID .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $caseID;
}

// Initialize variables
$caseID = generateUniqueID(); 

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $report_type = isset($_POST["report-type"]) ? $_POST["report-type"] : "";
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $address = isset($_POST["address"]) ? $_POST["address"] : "";
    $description = isset($_POST["description"]) ? $_POST["description"] : "";
    $imageFilePath = ""; // Initialize image path
    $videoFilePath = ""; // Initialize video path
    $caseID = isset($_POST["case-id"]) ? $_POST["case-id"] : generateUniqueID();

    // Image upload
    if (!empty($_FILES["image"]["tmp_name"])) {
        $uploadDir = 'uploads/images'; // Directory where images will be stored
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $imageName = uniqid('image_') . '_' . $_FILES["image"]["name"];
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadDir . '/' . $imageName)) {
            $imageFilePath = $uploadDir . '/' . $imageName;
        } else {
            $message = "Error uploading image file";
        }
    }

    // Video upload
    if (!empty($_FILES["video"]["tmp_name"])) {
        $uploadDir = 'uploads/videos'; // Directory where videos will be stored
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $videoName = uniqid('video_') . '_' . $_FILES["video"]["name"];
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $uploadDir . '/' . $videoName)) {
            $videoFilePath = $uploadDir . '/' . $videoName;
        } else {
            $message = "Error uploading video file";
        }
    }

    // Insert data into the database with the same case ID
    $sql = "INSERT INTO report_crime (case_id, report_type, name, phone, address, description, image, video) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss",$caseID, $report_type, $name, $phone, $address, $description, $imageFilePath, $videoFilePath);

    if ($stmt->execute()) {
        $message = "New record created successfully";
        echo '<script>Swal.fire("Success", "Your report has been submitted successfully!", "success");</script>';
    } else {
        $message = "Error: " . $stmt->error;
        // Debugging output
        echo "Error: " . $stmt->error . "<br>";
        echo "Case ID used: " . $caseID . "<br>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link rel="stylesheet" href="reporting.css">
    <!-- Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <title>Report Crime</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.png" alt="">
            </div>
            <span class="logo_name">CRS</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="report_form.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Report Crime</span>
                </a></li>
                <li><a href="view_status.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">View Status</span>
                </a></li>
                <li><a href="contact.php">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Contact us</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="logout">Logout</span>
                </a></li>
                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </ul>
        </div>
    </nav>
    <div class="anonymous-reporting">
        <div class="title">
            <i class="uil uil-thumbs-up"></i>
            <span class="text">Report Your Problem</span>
        </div>
        
        <form class="report-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <!-- Display case ID to user -->
            <label for="case-id">Case ID:</label>
            <input type="text" id="case-id" name="case-id" value="<?php echo $caseID; ?>" readonly>

            <label for="report-type">Type of Incident:</label>
            <select id="report-type" name="report-type">
                <option value="assault">Assault</option>
                <option value="theft">Theft</option>
                <option value="scam">Scam</option>
                <option value="vandalism">Vandalism</option>
                <option value="others">Others</option>
            </select>

            <label for="name">Name of Complainer:</label>
            <input type="text" id="name" name="name" required>

            <label for="phone">Complainer's Phone Number:</label>
            <input type="number" id="phone" name="phone" required>

            <label for="address">Complainer's Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="description">Crime Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" accept="image/*">

            <label for="video">Upload Video:</label>
            <input type="file" id="video" name="video" accept="video/*">

            <button type="submit">Submit Report</button>
        </form>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        // Form submission handling with SweetAlert
        document.querySelector('.report-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            Swal.fire({
                title: "Processing...",
                text: "Please wait...",
                icon: "info",
                showConfirmButton: false,
                allowOutsideClick: false
            });
            
            // Perform the form submission
            fetch(this.action, {
                method: this.method,
                body: new FormData(this)
            })
            .then(response => {
                if (response.ok) {
                    Swal.fire("Success", "Your report has been submitted successfully!", "success");
                    this.reset(); // Clear the form fields
                    // You may also redirect to another page or perform any other action here
                } else {
                    throw new Error('Network response was not ok.');
                }
            })
            .catch(error => {
                console.error('Error during form submission:', error);
                Swal.fire("Error", "An error occurred while submitting your report. Please try again later.", "error");
            });
        });
    </script>
</body>
</html>
