<?php
$insert = false;
if(isset($_POST['name'])){
    
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("Connection to Database failed" .mysqli_connect_error());
    }

    // echo "Sucessfully Connected to Database"

    $name   = $_POST['name'];
    $age    = $_POST['age'];
    $gender = $_POST['gender'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $desc  = $_POST['desc'];


    $sql = "INSERT INTO `redbus`.`redbus` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // echo $sql;

    if($con->query($sql) == true){
        // echo "Sucessfully submitted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Bus Travel Agency</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <img clas="bg" src="bg.jpeg" alt="travel agency">
    <div class="container">
        <h1>Welcome to Red Bus Travel Agency</h1>
        <p>
            Enter your details & Submit for Travel Booking
        </p>
        <!-- Form Section -->
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="text" name="email" id="email" placeholder="Enter Your Email">
            <input type="text" name="phone" id="phone" placeholder="Enter Your Phone Number">
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="Enter any other information/ query"></textarea>
            <button class="btn">Submit</button>
        </form>
        <?php
            if($insert == true){
            echo"<p class='endline'>Thanks For Submitting the form.  Wishing a Happy Journey</p>"
            ;
            }
        ?>
    </div>
    <script src="index.js"></script>
</body>

</html>