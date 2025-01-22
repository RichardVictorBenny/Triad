<?php
$servername = "localhost";
$username = "test";
$password = "triad";
$dbname = "my_app_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
