<?php

    require_once('../utils/conn.php'); //I REQUIRE SA NI NIYA NA ICHECK OR I RUN

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $pnumber = $_POST["pnumber"];
        $snumber = $_POST["snumber"];
        $region = $_POST["region"];
        $province = $_POST["province"];
        $city = $_POST["city"];
        $barangay = $_POST["barangay"];
        $msg = $_POST["msg"];

    
        $sql = "INSERT INTO `contact`(`first_name`, `last_name`, `email`, `pnumber`, `snumber`, `region`, `province`, `city`, `barangay`, `message`) VALUES ('$fname','$lname','$email','$pnumber','$snumber','$region','$province','$city','$barangay','$msg')";

        if (mysqli_query($connect, $sql)) {
            echo("<script>alert('Data stored in a database successfully')</script>");
        } else {
            echo("Error: ". mysqli_connect_error($connect));
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dropdownphpform/assets/contact.css">
    <link rel="stylesheet" href="/dropdownphpform/assets/index.css">
    <title>Contact Page</title>
    <script src="jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#province option").hide();
            $("#city option").hide();
            $("#barangay option").hide();

            $(region).change(function(){
                var val=$(this).val();
                $("#province option").hide();
                $("#province").val("");
                $("#province [data-province='" + val + "']").show();
                $("#province").change();
            });

            $("#province").change(function(){
                var val=$(this).find(":selected").prop("id");
                $("#city option").hide();
                $("#city").val("");
                $("#city [data-brgy='" + val + "']").show();
                $("#city").change();
            });

            $("#city").change(function(){
                var val=$(this).find(":selected").prop("id");
                $("#barangay option").hide();
                $("#barangay").val("");
                $("#barangay [data-brgy='" + val + "']").show();
                $("#barangay").change();
            });
        });


    </script>
</head>
<body>
    
    <?php include 'header.php'?>

    <div class="content-container">
        <div class="left-container">
            <div class="message">
                <h1>SEND US A MESSAGE:</h1>
                <p>Fill out the form and our Team will get back to you within 24 hours. </p>
            </div>
            <form class="form-group" method="post">
                <label for="fname">First Name:</label>
                <input type="text" name="fname" placeholder="John" required>

                <label for="lname">Last Name: </label>
                <input type="text" name="lname" placeholder="Doe" required>

                <label for="email">Email:</label>
                <input type="text" name="email" placeholder="johndoe@email.com" required>

                <label for="pnumber">Phone:</label>
                <input type="text" name="pnumber" placeholder="09123456789" required>

                <label for="snumber">Street:</label>
                <input type="text" name="snumber" placeholder="123 St." required>

                <label for="region">Region:</label>
                <select name="region" id="region">
                    <option value=""></option>
                    <?php
                    // _
                        $select = "SELECT `region` FROM `phils_regions` GROUP BY `region` ASC"; 
                        $res = mysqli_query($connect, $select);

                        while($data = mysqli_fetch_array($res)) {
                            echo "<option value=".$data['region'].">".$data['region']."</option>";
                        }
                    ?>
                </select>

                <label for="province">Province:</label>
                <select name="province" id="province">
                    <option value=""></option>
                    <?php
                    // _
                        $select = "SELECT `province` FROM `phils_regions` GROUP BY `province` ASC"; 
                        $res = mysqli_query($connect, $select);

                        while($data = mysqli_fetch_array($res)) {
                            echo "<option value=".$data['province'].">".$data['province']."</option>";
                        }
                    ?>
                </select>

                <label for="city">City:</label>
                <select name="city" id="city">
                    <option value=""></option>
                    <?php
                    // _
                        $select = "SELECT `city` FROM `phils_regions` GROUP BY `city` ASC"; 
                        $res = mysqli_query($connect, $select);

                        while($data = mysqli_fetch_array($res)) {
                            echo "<option value=".$data['city'].">".$data['city']."</option>";
                        }
                    ?>
                </select>

                <label for="barangay">Barangay:</label>
                <select name="barangay" id="barangay">
                    <option value=""></option>
                    <?php
                    // _
                        $select = "SELECT `barangay` FROM `phils_regions` GROUP BY `barangay` ASC"; 
                        $res = mysqli_query($connect, $select);

                        while($data = mysqli_fetch_array($res)) {
                            echo "<option value=".$data['barangay'].">".$data['barangay']."</option>";
                        }
                    ?>
                </select>
                <textarea name="msg" id="" cols="93" rows="10" ></textarea>
                <input type="submit">

            </form>
        </div>
        <div class="right-container">
        </div>
    </div>

    <?php include 'footer.php'?>

</body>
</html>