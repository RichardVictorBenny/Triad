<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        try {
            // Connect to SQLite database
            $db = new PDO('sqlite:database.db'); // Change to your DB connection string

            // Insert data into the table
            $stmt = $db->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password); // Use hashed passwords in production
            $stmt->execute();

            echo json_encode(['success' => true, 'message' => 'User inserted successfully']);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Username and password are required']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
