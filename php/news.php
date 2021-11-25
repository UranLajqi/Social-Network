<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/news.css">

</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center fixed-top">
    <ul class="navbar-nav">
        <li class="nav-item pe-4">
            <a class="nav-link" href="./home.php">Home</a>
        </li>
        <li class="nav-item pe-4">
            <a class="nav-link" href="./message.php">Message</a>
        </li>
        <li class="nav-item pe-4">
            <a class="nav-link" href="./profile.php">Profile</a>
        </li>
        <li class="nav-item pe-4">
            <a class="nav-link active" href="#">News</a>
        </li>
    </ul>
    </nav>

    <div style="margin-top: 70px;"></div>
    
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "social network";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT titulli, autori, permbajtja, kohaPublikimit FROM news";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div id='news'>";
            echo "<h1>" . $row['titulli'] . "</h1>";
            echo "<p><i>By: " . $row['autori'] . "</i></p>";
            echo "<p>" . $row['permbajtja'] . "</p>";
            echo "<p style='color: red; text-align: right; font-size: 15px;'>" . $row['kohaPublikimit'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();

    ?>

</body>
</html>