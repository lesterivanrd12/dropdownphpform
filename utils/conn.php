<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "insti-db";

// CONNECTED NAKA SA DATABASE
$connect = mysqli_connect($server, $username, $password, $database) or die("Error: ". mysqli_connect_error($connect));

if($connect) {
    echo("<script>console.log('Connected!')</script>");
}
?>