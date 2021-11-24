<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center fixed-top">
    <ul class="navbar-nav">
        <li class="nav-item pe-4">
            <a class="nav-link" href="home.html">Home</a>
        </li>
        <li class="nav-item pe-4">
            <a class="nav-link" href="message.html">Message</a>
        </li>
        <li class="nav-item pe-4">
            <a class="nav-link active" href="#">Profile</a>
        </li>
        <li class="nav-item pe-4">
            <a class="nav-link" href="news.html">News</a>
        </li>
    </ul>
</nav>

<br><br><br>
<div class="container">
    <h1><?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "social network";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

        $sql = "SELECT fname, lname FROM signup";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                
                echo $_SESSION['fname'] . ' ' . $_SESSION['lname'];
            }
        } else {
            echo "0 results";
        }
      
    
    $conn->close();
    
    ?></h1>
</div>

</body>
</html>