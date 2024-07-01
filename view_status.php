<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

:root {
    /* Colors */
    --primary-color: #cbd8fa;
    --panel-color: #FFF;
    --text-color: #000;
    --black-light-color: #707070;
    --border-color: #e6e5e5;
    --toggle-color: #DDD;
    --box1-color: #4DA3FF;
    --box2-color: #FFE6AC;
    --box3-color: #E7D1FC;
    --title-icon-color: #fff;

    /* Transition */
    --tran-05: all 0.5s ease;
    --tran-03: all 0.3s ease;
    --tran-03: all 0.2s ease;
}

body {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: var(--primary-color);
}

nav {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 250px;
    padding: 10px 14px;
    background-color: var(--panel-color);
    border-right: 1px solid var(--border-color);
    transition: var(--tran-05);
}

nav.close {
    width: 73px;
}

nav .logo-name {
    display: flex;
    align-items: center;
}

nav .logo-image {
    display: flex;
    justify-content: center;
    min-width: 45px;
}

nav .logo-name .logo_name {
    font-size: 22px;
    font-weight: 600;
    color: var(--text-color);
    margin-left: 9px;
}

nav .menu-items {
    margin-top: 40px;
    height: calc(100% - 90px);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.menu-items li {
    list-style: none;
}

.menu-items li a {
    display: flex;
    align-items: center;
    height: 50px;
    text-decoration: none;
    position: relative;
}

.menu-items li a i {
    font-size: 24px;
    min-width: 45px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--black-light-color);
}

.menu-items li a .link-name {
    font-size: 18px;
    font-weight: 400;
    color: var(--black-light-color);
    transition: var(--tran-05);
}

nav.close li a .link-name {
    opacity: 0;
    pointer-events: none;
}

.dash-content{
margin-bottom: 500px;
margin-left: 100px;


}

.logout {
    text-decoration: none;
    padding: 10px 20px; /* Add padding to create some space around the text */
    border: 2px solid #ff0000; /* Add a border */
    border-radius: 20px; /* Add border radius to make it round */
    background-color: #ff0000; /* Set background color */
    color: #fff; /* Set text color */
    font-size: 16px; /* Set font size */
    font-weight: bold; /* Make the text bold */
    transition: all 0.3s ease; /* Add transition for smooth hover effect */
}

.logout:hover {
    background-color: transparent; /* Change background color on hover */
    color: #ff0000; /* Change text color on hover */
}


        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff; /* White */
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 60px;
        }

        .table th,
        .table td {
            padding: 10px 15px;
            text-align: left;
        }

        .table th {
            background-color: #bc8484; /* Reddish brown */
            color: #fff; /* White */
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9; /* Light gray */
        }

        .table tbody tr:hover {
            background-color: #f0f0f0; /* Gray */
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc; /* Light gray */
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: #007bff; /* Blue */
            color: #fff; /* White */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Dark blue */
        }

        /* Modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 700px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .modal-header, .modal-footer {
            padding: 10px 16px;
            background-color: #f3f4f6;
            border-bottom: 1px solid #ddd;
            border-radius: 8px 8px 0 0;
        }

        .modal-body {
            padding: 10px 16px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
     
    <!-- Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title>
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
                <li><a href="logout.php" class="logout">
                    <i class="uil uil-signout"></i>
                    <span>Logout</span>
                </a></li>

                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </ul>
        </div>
    </nav>

    <div class="dashboard">
        <div class="dash-content">
            <h2>Reported Crimes</h2>
            <table class="table" id="reportTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Report Type</th>
                        <th>Address</th>
                        <th>Verification</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Remarks</th>
                    </tr>
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
                            $report_id = $_POST['report_id'];
                            $sql = "UPDATE report_crime SET solved = 1 WHERE case_id = $report_id";
                            if ($conn->query($sql) === TRUE) {
                                echo "1"; // Return 1 indicating success
                            } else {
                                echo "0"; // Return 0 indicating failure
                            }
                        }

                        // Fetch reported crimes data
                        $sql = "SELECT *, 
           DATE_FORMAT(submission_date, '%Y-%m-%d %H:%i') AS formatted_created_at,
           (SELECT COUNT(*) FROM report_crime WHERE status = 'Solved' AND case_id = report_crime.case_id) AS solved_cases,
           admin_remarks
        FROM report_crime";
$result = $conn->query($sql);

// Display data in the table
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['case_id'] . "</td>";
        echo "<td>" . $row['report_type'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['Verification'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['formatted_created_at'] . "</td>";
        echo "<td>";
        echo "<button onclick='openModal(\"" . $row['case_id'] . "\", \"" . $row['report_type'] . "\", \"" . $row['address'] . "\", \"" . $row['Verification'] . "\", \"" . $row['status'] . "\", \"" . $row['formatted_created_at'] . "\", \"" . $row['admin_remarks'] . "\")'>View</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No reported crimes found.</td></tr>";
}


                        // Close database connection
                        $conn->close();
                        ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Report Details</h2>
            </div>
            <div class="modal-body">
                <p><strong>Admin Remarks: </strong><span id="modal_remarks"></span></p>
                
            </div>

        </div>
    </div>

    <script>
    // Function to open modal and populate data
    function openModal(case_id, report_type, address, verification, status, created_at, admin_remarks) {
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];
        var modalRemarks = document.getElementById("modal_remarks");

        // Populate modal content with data
        modalRemarks.textContent = admin_remarks;

        modal.style.display = "block";

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }
</script>

</body>
</html>
