<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<?php 

$mis = "";

if(!empty($_POST['phone']) && !empty($_POST['email'])) {
    echo $_POST['phone'] . " : " . $_POST['email'];
}
else {
    $mis = "Gabim";
}

?>

<form id="forgotPass" method="post">

    <p style="line-height: 1.5; text-align: center;">Please enter your mobile number or backup email to search for your account.</p>
    <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" placeholder="Phone" required>
    <input type="email" id="email" name="email" placeholder="Email" required>
    <br>
    <input type="submit" value="Search">
</form>
    
</body>
</html>