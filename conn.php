<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "testdb";

// Connection to database
$conn = mysqli_connect($server, $user, $password, $db) or die("Connection failed: " . mysqli_connect_error());
?>