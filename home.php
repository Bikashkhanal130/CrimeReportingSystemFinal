<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
    <script>
        // Function to handle login button click
        function handleLogin() {
            // Redirect the user to the login page
            window.location.href = "login.php";
        }
    </script>
</head>
<body>

<div class="banner">

    <h1>Welcome to Crime Reporting Platform</h1>
    <p>Please feel free to report your problem</p>
</div>

<div class="news">
    <h2>Crime Reporting News</h2>
    <div class="news-article">
        <h3></h3>
        <p>.</p>
    </div>
</div>

<div class="navbar">
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="anonymous.php">Anonymous Reporting</a></li>
        <li><a href="#">Contact</a></li>
     
        <li><a href="login.php" onclick="handleLogin()" class="btnLogin-popup">Login</a></li>
        <li><a href="admin_section/admin_login.php">Login as Admin</a></li>
    </ul>
</div>

<div class="cards">
    <div class="card">
        <img src="images/nepal_police_vbrc4Cimgc.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Nepal Police</h5>
            <p class="card-text">Nepal Police alerts about growing cases of cyber crime | Ratopati | No.1 Nepali News Portal.</p>
        </div>
    </div>
    <div class="card">
        <img src="images/news2.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Latest News</h5>
            <p class="card-text">NEWS | 15 people arrested for theft and robbery.</p>
        </div>
    </div>
    <div class="card">
        <img src="images/news1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Latest News</h5>
            <p class="card-text">Human Sacrifice in Nepal? or Mental disorder? Dhanusha हत्याकाण्ड | Random Nepali Crime Series |.</p>
        </div>
    </div>
</div>


<div class="cards">
    <div class="card">
        <img src="images/thumb4-1680143186.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">News</h5>
            <p class="card-text">19 people including nine Chinese arrested on charge of online fraud.</p>
        </div>
    </div>
    <div class="card">
        <img src="images/Khabar-Hub-News_Chinese-Criminal-2_1200px-630X-px-Final_2021.07.07-English-1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Latest News</h5>
            <p class="card-text">Is Nepal becoming a haven for Chinese criminals? « Khabarhub.</p>
        </div>
    </div>
    <div class="card">
        <img src="images/mqdefault.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Random News</h5>
            <p class="card-text">नेपाली Poison किलर | Nepali Serial Killer| New Nepali Crime Stories | Random Nepali.</p>
        </div>
    </div>
</div>

<div class="footer">

    <div class="footer-content">
        <img src="images/crime.jpeg" alt="Aaron Lowe Coaching logo">
        <p> Our rights can be curtailed in the interest of public safety</p>
        <a href="tel:100">Call us: 100</a>Email us:  <a href="">crimereportingsystemNepal@gmail.com</a></a>
      </div>
      <div class="footer-copyright">
        <p>&copy; Copyright © Crime Reporting System (CRS) 2024</p>
      </div>
</div>
 
  </footer>

</body>
</html>
