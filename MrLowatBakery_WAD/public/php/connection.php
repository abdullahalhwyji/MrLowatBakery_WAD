<?php

// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Use your database password
$dbname = "mrlowatbakery";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

date_default_timezone_set('Asia/Kuala_Lumpur');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}
?>