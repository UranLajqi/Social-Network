<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "social network";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['phone']) && 
    !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['birthdate'])) 
{
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $phone = $_POST['phone'];
  $email = $_POST['email']; 
  $password = $_POST['password']; 
  $birthdate = $_POST['birthdate']; 

  $sql = "INSERT INTO signup(fname, lname, phone, email, password, birthdate) 
  VALUES ('$fname', '$lname', '$phone', '$email', '$password', '$birthdate')";

  if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Account</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/signup.css">
</head>
<body>

<form id="signup" name="signup" method="post" action="#">
    <h1>Sign Up</h1>
    <input type="text" name="fname" placeholder="First name" required>
    <input type="text" name="lname" placeholder="Last name" required>
    <br>
    <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" 
    placeholder="Phone" required>
    <br>
    <input type="email" name="email" placeholder="Email" required>
    <br>
    <input type="password" name="password" placeholder="Password" required>
    <br>
    <label for="birthdate">Birthday</label>
    <input type="date" name="birthdate" id="birthdate" required>
    <br>
    <label>Gender</label><br>
    <input type="radio" id="Female" name="gender" value="Female" required>
    <label for="female">Female</label>
    <input type="radio" id="Male" name="gender" value="Male">
    <label for="male">Male</label>
    <input type="radio" id="other" name="gender" value="Other">
    <label for="other">Other</label>
    <br>
    <input type="submit" value="Sign Up">
</form>
    
</body>
</html>