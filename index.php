<?php
    $insert = false;
    if(isset($_POST['name'])){
        $server = "localhost";
        $username = "root";
        $password = "";

        $con = mysqli_connect($server, $username, $password); // con = connect
        if (!$con) {
            die("Connection failed: ".mysqli_connect_error());
        }

        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];
        $sql = "INSERT INTO `trip`.`trip` (`NAME`, `AGE`, `GENDER`, `EMAIL`, `PHONE`, `DESC`, `DT`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

        if($con->query($sql)==true){
            $insert = true;
        }
        else{
            echo "Error: $sql <br> $con->error";
        }
        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@400..700&family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Edu+NSW+ACT+Foundation:wght@400..700&family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <img class="bg" src="DTU.JPG" alt="DTU">
    <div class="container">
        <h3>Welcome to DTU - US Trip Form</h3>
        <p>Enter your details and submit your form to confrim your participation in a trip</p>
        <?php
        if($insert == true){
            echo "<p class='submitMSG'>Thanks for submitting your form. We are happy to see you joining us for the US trip.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name"  placeholder="Enter your name">
            <input type="text" name="age" id="age"  placeholder="Enter your age">
            <input type="text" name="gender"nder id="gender"  placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email address">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
