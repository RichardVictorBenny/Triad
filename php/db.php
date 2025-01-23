<?php
$servername = "mysql_db";
$port = 3306;
$username = "test";
$password = "triad";
$dbname = "booking";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
