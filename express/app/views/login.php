<?php


echo "tea";

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        echo "Form submitted successfully!<br>";
        echo "Username: " . htmlspecialchars($username) . "<br>";
        echo "Password: " . htmlspecialchars($password); // In a real app, avoid echoing passwords!
    } else {
        echo "Error: Please fill in all fields.";
    }
} else {
    echo "Error: Invalid request method.";
}
?>