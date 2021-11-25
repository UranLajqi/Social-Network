<?php
session_start(); 

/* Lidhja me databaz */
$conn = new mysqli("localhost", "root", "", "social network");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$mistakes = "";

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    /* Marrja e emailit dhe passwordit nga forma */
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        /* Marrja e te dhenave nga databaza, tabela signup */
        $sql = "SELECT email, password, fname, lname FROM signup";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                /* Kontrollimi se a eshte emaili dhe passwordi i njejte i fomres
                   me ndonje email dhe password ne databaz */
                if($row["email"] == $email && $row["password"] == $password) {
                    $_SESSION["fname"] = $row['fname'];
                    $_SESSION["lname"] = $row['lname'];
                    header("Location: ./php/home.php");
                } 
                else if($row["email"] != $email && $row["password"] == $password) {
                    $mistakes = "Keni shenuar emailin gabim";
                    break;
                } 
                else if($row["email"] == $email && $row["password"] != $password) {
                    $mistakes = "Keni shenuar passwordin gabim";
                    break;
                }
                else  {
                    $mistakes = "Keni shenuar emailin dhe passwordin gabim";
                    break;
                }
            }
        } 
        else {
            $mistakes = "Nuk ka te dhena ne databaz";
        }
    }
    else {
        $mistakes = "Email is not a valid email address";
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
    <link rel="stylesheet" href="./css/login.css">
    <script src="./javascript/login.js"></script>
</head>
<body onload="startTimer()">

<div id="img">
    <form id="login" name="login" method="post">
        <div id="mistakes">
            <?php
                if($mistakes != "") {
                    echo "<script>document.getElementById('mistakes').style.display = 'block';</script>";
                    echo $mistakes;
                }
            ?>
        </div>
        
        <h1>Log In</h1>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" value="Log In"><br>
        <a href="./php/forgotPassword.php">Forgot password?</a><hr>
        <input type="button" value="Create New Account" onclick="ndrroFaqen()">
    </form>
</div>

</body>
</html>