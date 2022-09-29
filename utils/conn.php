<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "insti-db";

$connect = mysqli_connect($server, $username, $password, $database) or die("Error: ". mysqli_connect_error($connect));
?>