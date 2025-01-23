<?php
$servername = "mysql_db";
$port = 3306;
$username = "test";
$password = "triad";
$dbname = "booking";

try {
    // Create connection using PDO
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
