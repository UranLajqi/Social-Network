<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "social network";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!empty($_POST['email']) && !empty($_POST['password'])) 
{
  $email = $_POST['email'];
  $password = $_POST['password'];

    $sql = "SELECT email, password, fname, lname FROM signup";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["email"] == $email && $row["password"] == $password) {
            $_SESSION["fname"] = $row['fname'];
            $_SESSION["lname"] = $row['lname'];
            header("Location: ./html/home.html");

        }
        else  {
            echo "paassi gabim";
        }
    }
    } else {
        echo "0 results";
    }
  
}

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="./css/styles.css">
    <script src="./javascript/skripta.js"></script>
</head>
<body>

<form id="login" name="login" method="post">
    <h1>Log In</h1>
    <input type="email" name="email" placeholder="Email" required>
    <br>
    <input type="password" name="password" placeholder="Password" required>
    <br>
    <input type="submit" value="Log In">
    <br>
    <a href="./html/forgotPassword.html">Forgot password?</a>
    <hr>
    <input type="button" value="Create New Account" onclick="createNewAccount()">
</form>

</body>
</html>