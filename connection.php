<?php
$servername = "localhost";
$username = "developer";
$password = "Developer@123";
$dbname = "wallet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>