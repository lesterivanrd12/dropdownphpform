<?php

require_once 'conn.php';

// Process form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pnumber = $_POST['pnumber'];
    $email = $_POST['email'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `users`(`first_name`, `last_name`, `phone_number`, `email`, `region`, `province`, `city`, `barangay`, `message`) VALUES ('$fname','$lname','$pnumber','$email','$region','$province','$city','$barangay','$message')";

    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "<script>alert('Entry sent!')</script>";
    } else {
        echo "Error: ". mysqli_error($result);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact Form</title>
</head>
<body>
    <div class="form-container">
        <form class="form-row" action="" method="post">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" placeholder="John">

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" placeholder="Doe">

            <label for="pnumber">Phone Number:</label>
            <input type="text" id="pnumber" name="pnumber" placeholder="09123456789">

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="example@email.com">

            <label for="region">Region: </label>
            <select name="region" id="region">
                <option value="">--- Select Region ---</option>
                <?php
                    $records = mysqli_query($conn, "SELECT `region` FROM `phillocations` ORDER BY `region` ASC");

                    while($data = mysqli_fetch_array($records)) {
                        echo "<option value=".$data['region'].">".$data['region']."</option>";
                    }
                ?>
            </select>

            <label for="province">Province: </label>
            <select name="province" id="province">
                <option value="">--- Select Province ---</option>
                <?php
                    $records = mysqli_query($conn, "SELECT `province` FROM `phillocations` ORDER BY `province` ASC");

                    while($data = mysqli_fetch_array($records)) {
                        echo "<option value=".$data['province'].">".$data['province']."</option>";
                    }
                ?>
            </select> 

            <label for="city">City: </label>
            <select name="city" id="city">
                <option value="">--- Select City ---</option>
                <?php
                    $records = mysqli_query($conn, "SELECT `city` FROM `phillocations` ORDER BY `city` ASC");

                    while($data = mysqli_fetch_array($records)) {
                        echo "<option value=".$data['city'].">".$data['city']."</option>";
                    }
                    ?>
            </select> 

            <label for="barangay">Barangay: </label>
            <select name="barangay" id="barangay">
                <option value="">--- Select Barangay ---</option>
                <?php
                    $records = mysqli_query($conn, "SELECT `barangay` FROM `phillocations` ORDER BY `barangay` ASC");

                    while($data = mysqli_fetch_array($records)) {
                        echo "<option value=".$data['barangay'].">".$data['barangay']."</option>";
                    }
                ?>
            </select>

            <textarea name="message" id="message" cols="30" rows="10"></textarea>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>