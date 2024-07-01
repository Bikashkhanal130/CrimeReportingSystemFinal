<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="../admin_css/admin_prac.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>


<style>

    /* Reset CSS */
body {
  margin: 0;
  padding: 0;
  background-color: #1d2634;
  color: #ffffff; /* Changed text color to white */
  font-family: 'Montserrat', sans-serif;
}

/* Global Styles */
.material-icons-outlined {
  vertical-align: middle;
  line-height: 1px;
  font-size: 35px;
}

/* Grid Layout */
.grid-container {
  display: grid;
  grid-template-columns: 260px 1fr 1fr 1fr;
  grid-template-rows: 0.2fr 3fr;
  grid-template-areas:
    'sidebar header header header'
    'sidebar main main main';
  height: 100vh;
}



/* Header Styles */
.header {
  grid-area: header;
  height: 70px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 30px 0 30px;
  box-shadow: 0 6px 7px -3px rgba(0, 0, 0, 0.35);
}

.menu-icon {
  display: none;
}

 
  /* Sidebar Styles */
  #sidebar {
  grid-area: sidebar;
  height: 100%;
  background-color: #000000;
  overflow-y: auto;
  transition: all 0.5s ease;
  -webkit-transition: all 0.5s;
}

.sidebar-title {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 30px 30px 30px 30px;
  margin-bottom: 30px;
}

.sidebar-title > span {
  display: none;
}

.sidebar-brand {
  margin-top: 15px;
  font-size: 20px;
  font-weight: 700;
}

.sidebar-list {
  padding: 0;
  margin-top: 15px;
  list-style-type: none;
}

.sidebar-list-item {
  padding: 20px 20px 20px 20px;
  font-size: 18px;
}

.sidebar-list-item:hover {
  background-color: rgba(255, 255, 255, 0.2);
  cursor: pointer;
}

.sidebar-list-item > a {
  display: flex;
  align-items: center;
  text-decoration: none;
  color: #9e9ea4;
}

.sidebar-list-item > a > .material-icons-outlined {
  margin-right: 10px;
}



.sidebar-responsive {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000;
  transition: opacity 0.3s ease;
}

.sidebar-responsive.active {
  display: block;
}

.sidebar-responsive-content {
  position: absolute;
  top: 0;
  left: 0;
  background-color: #263043;
  width: 80%;
  height: 100%;
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

/* Main Styles */
.main-container {
  grid-area: main;
  overflow-y: auto;
  padding: 20px 20px;
  color: rgba(255, 255, 255, 0.95);
}


/* Media Queries */
@media screen and (max-width: 992px) {
  .sidebar-list-item {
    padding: 18px 20px;
  }
}

@media screen and (max-width: 768px) {
  .sidebar-responsive-content {
    width: 100%;
  }
}

/* Small <= 768px */
@media screen and (max-width: 768px) {
  .main-cards {
    flex-direction: column;
  }

  .charts {
    grid-template-columns: 1fr;
    margin-top: 30px;
  }
}

/* Extra Small <= 576px */
@media screen and (max-width: 576px) {
  .header-left {
    display: none;
  }
}

/* Table Styles */
.container {
  margin-top: 20px;
  position: absolute;
  margin-left: 20px;
  margin-right: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0,  0, 0, 0.1);
}

table th{
    padding: 12px;
    border: 1px solid #e0e0e0;
    text-align: left;
    color: white;
}
table td {
  padding: 12px;
  border: 1px solid #e0e0e0;
  text-align: left;
    color:white ; /* Change text color to white */
}

thead {
  background-color: #263043;
  color: #ffffff;
}

/* Button Styles */
button {
  padding: 8px 6px;
  background-color: green; /* Changed button background color */
  color: #ffffff; /* Changed button text color */
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 10px;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #314152; /* Changed button hover background color */
}

/* Adjusted button size for smaller screens */
@media screen and (max-width: 576px) {
  button {
    padding: 8px 16px;
  }
}



.logout-mode {
  list-style-type: none;
  padding: auto;
margin: 5px;
margin-top: 120%;
}

.logout-mode li {
  display: inline-block;
  margin-right: 10px;
}

.logout-mode li a {
  text-decoration: none;
  color: white;
  font-weight: bold;
  padding: 8px 16px; /* Adjust padding as needed */
  border: 1px solid white; /* Border style */
  border-radius: 5px; /* Rounded corners */
  transition: all 0.3s; /* Smooth transition */
}

.logout-mode li a:hover {
  background-color: red; /* Background color on hover */
  color: #fff; /* Text color on hover */
}

.modal-content{
    position: relative;
    display: flex;
    flex-direction: column ;
    width: 100%;
    pointer-events: auto;
    background-color: black;
    background-clip: padding-box;
    border: 1px solid white;
    
    outline: 0;
}
#image-container,
#image-container img{
  width:300px;
  height: 200px;
}

#video-container,
#video-container video{
  width:300px;
  height: 200px;
}
</style>


<body>
    <div class="grid-container">
        <div class="menu-icon" onclick="openSidebar()"></div>
        <aside id="sidebar">
            <div class="sidebar-title">
                <h4>CRS ADMIN</h4>
            </div>
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="admin_dashboard.php" >
                        <span class="material-icons-outlined">dashboard</span> Dashboard
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="admin_prac.php">
                        <span class="material-icons-outlined">groups</span> 
                        <span>List of Reports</span>
                    </a>
                </li>
                <li class="sidebar-list-item active">
                    <a href="./admin_anon_view.php">
                        <span class="material-icons-outlined">report</span> Anonymous Reports
                    </a>
                </li>
          
            </ul>
            <ul class="logout-mode">
                <li><a href="../logout.php">
                    <span class="logout">Logout</span>
                </a></li>
            </ul>
        </aside>
        <div class="main-content">
            <div class="container">
                <h2>Reported Crimes</h2>
                <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for reports..." class="form-control mb-3">
                <table class="table" id="reportTable">
                    <thead>
                        <tr>

                           <th>id</th>
                            <th>Report Type</th>
                            <th>Address</th>
                            <th>View More</th>
                            <th>Verification</th>
                            <th>Status</th>
                            <th>Actions</th>
                        
                    
                        </tr>

                            <!-- Modal for Review Report -->
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewModalLabel">Review Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="reviewForm">
                        <div class="form-group">
                            <label for="adminRemarks">Admin Remarks</label>
                            <textarea class="form-control" id="adminRemarks" name="adminRemarks" rows="3"></textarea>
                        </div>
                        <!-- Hidden input field to store case_id -->
                        <input type="hidden" id="reviewCaseId" name="reviewCaseId">
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
                    </thead>
                    <tbody>
                        <?php
                        // Database connection
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "login";

                        $conn = new mysqli($servername, $username, $password, $database);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'solve') {
                            $case_id = $_POST['case_id'];
                        
                            $sql = "UPDATE report_crime SET solved = 1 WHERE case_id = $case_id";
                            if ($conn->query($sql) === TRUE) {
                                echo "1"; // Return 1 indicating success
                            } else {
                                echo "0"; // Return 0 indicating failure
                            }
                        }

                        // Fetch reported crimes data
                        $sql = "SELECT *, 
                        (SELECT COUNT(*) FROM report_crime WHERE status = 'Solved' AND case_id = report_crime.case_id) AS solved_cases 
                    FROM report_crime;";
                    
                        $result = $conn->query($sql);

                        // Display data in the table
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Display the static case ID retrieved from the database
                                echo "<tr>";
                                echo "<td>" . $row['case_id'] . "</td>";
                                echo "<td>" . $row['report_type'] . "</td>";
                                echo "<td>" . $row['address'] . "</td>";

                                // View More button
                                echo "<td>";
                                echo "<button class='view-more-btn btn btn-primary' data-toggle='modal' data-target='#exampleModal' data-details='" . htmlentities(json_encode($row)) . "'>View More</button>";
                                echo "</td>";
                              
                                echo "<td>" . $row['Verification'] . "</td>"; // Display verified status

                                // Actions column
                                echo "<td>" . $row['status'] . "</td>";
                                echo "<td class='toggle-actions-btn'>";
                                // Verification toggle button
        echo "<form method='post' action='toggle_verification.php' onsubmit='showAlert(\"Verification status toggled successfully\")'>";
        echo "<input type='hidden' name='report_id' value='" . $row['case_id'] . "'>";
        echo "<button class='toggle-btn btn btn-info' type='submit' name='toggle_btn'><span class='material-icons-outlined'>sync_alt</span> Verify The Case</button>";
        echo "</form>";
        
        // Mark as Solved button (opens the review modal)
        echo "<button class='solve-btn btn btn-success' data-toggle='modal' data-target='#reviewModal' data-report-id='" . $row['case_id'] . "'>

        <span class='material-icons-outlined'>done</span> 
        Mark as Solved
        </button>";




        echo "</td>";
        echo "</tr>";
    
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No reported crimes found.</td></tr>";
                        }

                        // Close database connection
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">More Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Video</th>
                                <th>Submission Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="name"></td>
                                <td id="description"></td>
                                <td id="image-container"></td>
                                <td id="video-container"></td>
                                <td id="submissionDate"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- Bootstrap Modal for Review -->
<div class="modal fade" id="reviewModalUpdate" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Review Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="reviewForm">
                    <div class="form-group">
                        <label for="adminRemarks">Admin Remarks</label>
                        <textarea class="form-control" id="adminRemarks" name="adminRemarks" rows="3"></textarea>
                    </div>
                    <input type="hidden" id="reviewCaseId" name="reviewCaseId">
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            </div>
        </div>
    </div>
</div>


            </div>
        </div>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var details = button.data('details'); // Extract details from data-* attributes
            populateModal(details);
        });

        function populateModal(details) {
            const baseURL = 'http://localhost/CRS_Project/CRS-NEW--main/'; // Base URL for your local server

            document.getElementById('name').textContent = details.name;
            document.getElementById('description').textContent = details.description;

            const imageContainer = document.getElementById('image-container');
            if (details.image) {
                const image = document.createElement('img');
                image.src = baseURL + details.image;
                image.style.maxWidth = '100%';
                imageContainer.innerHTML = '';
                imageContainer.appendChild(image);
            } else {
                imageContainer.innerHTML = 'No image available';
            }

            const videoContainer = document.getElementById('video-container');
            if (details.video) {
                const video = document.createElement('video');
                video.src = baseURL + details.video;
                video.controls = true;
                video.style.width = '100%';
                videoContainer.innerHTML = '';
                videoContainer.appendChild(video);
            } else {
                videoContainer.innerHTML = 'No video available';
            }
            document.getElementById('submissionDate').textContent = details.submission_date;
        }

        function searchTable() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toLowerCase();
            table = document.getElementById("reportTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                tr[i].style.display = "none"; // Hide all rows initially
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toLowerCase().indexOf(filter) > -1) {
                            tr[i].style.display = ""; 
                            break; 
                        }
                    }
                }
            }
        }

    // JavaScript to populate the review modal
$('#reviewModalUpdate').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var reportId = button.data('report-id'); // Extract report ID from data-* attributes
    $('#reviewCaseId').val(reportId); // Set the reviewCaseId input value to the report ID
});

// JavaScript to handle form submission for review modal
$('#reviewForm').submit(function(event) {
    event.preventDefault(); // Prevent default form submission
    var formData = $(this).serialize(); // Serialize form data

    // AJAX request to update admin remarks and status
    $.ajax({
        type: 'POST',
        url: 'update_status.php',
        data: formData,
        success: function(response) {
            if (response.trim() === 'Status updated successfully') {
                alert('Admin remarks and status updated successfully.');
                $('#reviewModalUpdate').modal('hide'); // Hide the modal after successful submission
                // Optionally reload or update the table here
            } else {
                alert('Failed to update admin remarks and status: ' + response);
            }
        },
        error: function(xhr, status, error) {
            alert('Error occurred while updating admin remarks and status: ' + error);
        }
    });
});



    </script>
</body>
</html>

