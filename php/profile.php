<?php 

if(!empty($_POST['titulli']) && !empty($_POST['autori']) && !empty($_POST['permbajtja'])) {
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

    $titulli = $_POST["titulli"];
    $autori = $_POST["autori"];
    $permbatja = $_POST["permbajtja"];
    $koha = date("Y-m-d h:i:sa");

    $sql = "INSERT INTO news(titulli, autori, permbajtja, kohaPublikimit)
            VALUES ('$titulli', '$autori', '$permbatja', '$koha')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header("Location: news.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/profile.css">
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
            <a class="nav-link active" href="#">Profile</a>
        </li>
        <li class="nav-item pe-4">
            <a class="nav-link" href="./news.php">News</a>
        </li>
    </ul>
</nav>

<br><br><br>

<div class="container clearfix">
<section class="float-start">
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
                    
                    echo $row['fname'] . ' ' . $row['lname'];
                }
            } else {
                echo "0 results";
            }
        
        
        $conn->close();
        
        ?></h1>
</section>

    <form action="profile.php" method="post" id="lajmet" class="float-end">
        <div>
            <h1>Ngarkoni nje lajm</h1>
        </div>    
        <br>
        <div>
            <label for="titulli">Titulli</label><br>
            <input type="text" name="titulli" id="titulli">
        </div>
        <br>
        <div>
            <label for="autori">Autori</label><br>
            <input type="text" name="autori" id="autori">
        <div>
        <br>
        <div>
            <label for="permbajtja">Permbajtja</label><br>
            <textarea id="permbajtja" name="permbajtja"> 
                
            </textarea>
        </div>
        <br>
        <div>
            <input type="submit" value="Dergo">
        </div>
    </form>
    
    
</div>




</body>
</html>