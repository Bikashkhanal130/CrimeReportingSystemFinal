<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../admin_css/admin1.css">
</head>



<style>
  
  body {
    margin: 0;
    padding: 0;
    background-color: #1d2634;
    color: #9e9ea4;
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

.sidebar-list-item.active {
  background-color: #1a252f;
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

.main-title {
  display: flex;
  justify-content: space-between;
}

.main-cards {
  display: flex; /* Adjusted to display cards horizontally */
  justify-content: space-between; /* Added to evenly space the cards */
  margin: 20px 0;
}

.card {
  flex: 1; /* Added to distribute space equally between cards */
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 20px;
  margin: 10px;
  border-radius: 20px;
}


.card:first-child {
  background-color: #2962ff;
}
.card:last-child {
  margin-right: 0; /* Remove margin from the last card to avoid extra spacing */
}

.card:nth-child(2) {
  background-color: #ff0000;
}

.card:nth-child(3) {
  background-color: #2e7d32;
}

.card:nth-child(4) {
  background-color: #d50000;
}

.card-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.card-inner > .material-icons-outlined {
  font-size: 45px;
}

.charts {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
  margin-top: 60px;
}

.charts-card {
  background-color: #263043;
  margin-bottom: 20px;
  padding: 25px;
  box-sizing: border-box;
  -webkit-column-break-inside: avoid;
  border-radius: 5px;
  box-shadow: 0 6px 7px -4px rgba(0, 0, 0, 0.2);
}

.chart-title {
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Media Queries */
@media screen and (max-width: 992px) {
  .sidebar-list-item {
    padding: 15px 20px;
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
    flex-direction: column; /* Adjusted to display cards vertically on small screens */
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
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

table th,
table td {
  padding: 12px;
  border: 1px solid #e0e0e0;
  text-align: left;
}

thead {
  background-color: #263043;
  color: #ffffff;
}

/* Button Styles */
button {
  padding: 10px 20px;
  background-color: #4caf50;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #45a049;
}


.logout-mode {
  list-style-type: none;
  padding: auto;
  margin: 5px;
  margin-top: 155%;
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


.notification {
  padding: 10px;
  margin-bottom: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f0f0f0;
}




</style>
<body>

<div class="grid-container">
    <!-- Header -->
     
        <!-- Notification Section -->
        <div class="notifications">
            <h2>Notifications</h2>
            <ul id="notification-list"></ul>
        </div>
    <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">menu</span>
    </div>
    
    <aside id="sidebar">
        <div class="sidebar_title">
            <h1>CRS ADMIN</h1>
        </div>
        <ul class="sidebar-list">
            <li class="sidebar-list-item">
                <a href="#">
                    <span class="material-icons-outlined">dashboard</span> Dashboard
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="admin_prac.php">
                    <span class="material-icons-outlined">groups</span> 
                    List of Reports
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="admin_anon_view.php">
                    <span class="material-icons-outlined">groups</span> 
                    Anonymous Reporting
                </a>
            </li>
        </ul>
        <ul class="logout-mode">
            <li><a href="../logout.php">
                <span class="logout">Logout</span>
            </a></li>
        </ul>
    </aside>

    <!-- Main -->
    <main class="main-container">
        <div class="main-title">
            <h2>DASHBOARD</h2>
        </div>

        <div class="main-cards">
            <div class="card">
                <div class="card-inner">
                    <h3>TOTAL CASES REPORTED</h3>
                    <span class="material-icons-outlined">reports</span>
                </div>
                <h1 id="total-cases"></h1>
            </div>
            <div class="card">
                <div class="card-inner">
                    <h3>PENDING CASES</h3>
                    <span class="material-icons-outlined">pending</span>
                </div>
                <h1 id="pending-cases"></h1>
            </div>
            <div class="card">
                <div class="card-inner">
                    <h3>SOLVED CASES</h3>
                    <span class="material-icons-outlined">done</span>
                </div>
                <h1 id="solved-cases"></h1>
            </div>
            <!-- Other cards here -->
        </div>

        <div class="charts">
            <div class="charts-card">
                <h2 class="chart-title">Cases This Month</h2>
                <div id="bar-chart"></div>
            </div>
            <div class="charts-card">
                <h2 class="chart-title">Graph of Cases</h2>
                <div id="area-chart"></div>
            </div>
        </div>

    </main>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
<!-- Custom JS -->
<script src="../js/dash_scripts.js"></script>

<script>
// Example snippet from dash_scripts.js
function fetchNotifications() {
    fetch('fetch_notifications.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.status === "success") {
                const notificationList = document.getElementById('notification-list');
                notificationList.innerHTML = ''; // Clear the list
                data.data.forEach(notification => {
                    const li = document.createElement('li');
                    li.textContent = `${notification.name} reported a ${notification.report_type}: ${notification.description} on ${notification.submission_date}`;
                    notificationList.appendChild(li);
                });
            } else {
                console.error('Error fetching notifications:', data.message);
            }
        })
        .catch(error => {
            console.error('Error fetching notifications:', error);
        });
}

// Fetch notifications every 10 seconds
setInterval(fetchNotifications, 10000);

// Fetch notifications on page load
fetchNotifications();

</script>

</body>
</html>