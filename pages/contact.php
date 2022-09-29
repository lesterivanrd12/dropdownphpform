<?php

    require_once('../utils/conn.php');

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
                <select name="region" id="">
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
                <select name="province" id="">
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
                <select name="city" id="">
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
                <select name="barangay" id="">
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


    <script>
        $(document).ready(function(){
            $("#city option").hide();
            $("#brgy option").hide();

            $(province).change(function(){
                var val=$(this).val();
                $("#city option").hide();
                $("#city").val("");
                $("#city [data-city='" + val + "']").show();
                $("#city").change();
            });

            $("#city").change(function(){
                var val=$(this).find(":selected").prop("id");
                $("#brgy option").hide();
                $("#brgy").val("");
                $("#brgy [data-brgy='" + val + "']").show();
                $("#brgy").change();
            });
        });
    </script>

</body>
</html>