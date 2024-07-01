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
  height: auto;
  background-color: black;
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
  color: whitesmoke;
}

.sidebar-title > span {
  display: none;
  color: white;
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
  margin-top: 100%;
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

.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: black;
    background-clip: padding-box;
    border: 1px solid white;
    outline: 0;
}
#image-container,
#image-container img, video {
  width:300px;
  height: 200px;
}


</style>

<body>
    <div class="grid-container">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <span class="material-icons-outlined">admin</span> CRS ADMIN
                </div>
                <span class="material-icons-outlined">close</span>
            </div>
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="../admin_section/admin_dashboard.php">
                        <span class="material-icons-outlined">dashboard</span> Dashboard
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="admin_prac.php">
                        <span class="material-icons-outlined">groups</span> List of Reports
                    </a>
                </li>
                <li class="sidebar-list-item active">
                    <a href="./anon_reports.php">
                        <span class="material-icons-outlined">report</span> Anonymous Reports
                    </a>
                </li>
            </ul>
            <ul class="logout-mode">
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </aside>

        

        <!-- Main -->
        <main class="main-container">
            <div class="container">
                <div class="table-wrapper">
                    <h1 style="color:white;">Anonymous Reports</h1>
                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for reports..." style="width: 100%; padding: 12px; margin-bottom: 12px; border: 1px solid #ccc; border-radius: 4px;">
                    <table id="reportTable" class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th>Report Type</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Video</th>
                                <th>Submission Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "login";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT report_type, description, image_path, video_path, created_at FROM anonymous_reports";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                      <td>" . $row["report_type"] . "</td>
                                      <td>" . $row["description"] . "</td>
                                      <td>";
                                if (!empty($row["image_path"])) {
                                  echo "<img src='http://localhost/CRS_Project/CRS-NEW--main/" . htmlspecialchars($row["image_path"]) . "' alt='Image' style='max-width:200px;'/>";
                                } else {
                                    echo "No image";
                                }
                                echo "</td><td>";
                                if (!empty($row["video_path"])) {
                                  echo "<video src='http://localhost/CRS_Project/CRS-NEW--main/" . htmlspecialchars($row["video_path"]) . "' controls style='max-width:200px;'></video>";
                                } else {
                                    echo "No video";
                                }
                                echo "</td><td>" . $row["created_at"] . "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No reports found</td></tr>";
                        }
                        $conn->close();
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toLowerCase();
            table = document.getElementById("reportTable");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = "none";
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
    </script>
</body>
</html>
