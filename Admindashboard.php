<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint System Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <header class="bg-dark text-white">
        <div class="container d-flex justify-content-between">
            <h1>Complaint System Dashboard</h1>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </header>
    <nav class="bg-light">
        <div class="container">
            </div>
    </nav>
    <main class="container mt-3">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2>Total Complaints</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text" id="total-complaints">150</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h2>Total Cases Solved</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text" id="total-cases-solved">53</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        <h2>User Management</h2>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-warning">Manage Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h2>Reports</h2>
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-info">View Reports</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-dark text-white text-center py-3">
        <p>Copyright © 2014-2015 Complaint System, All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
