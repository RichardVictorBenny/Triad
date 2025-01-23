<?php
header('Content-Type: application/json');
require '../../autoloader.php';
require '../../db.php';
require '../../database.php';

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
// $path = trim($_SERVER['PATH_INFO'], '/');


if ($request === '/api/' && $method === 'GET') {
    echo json_encode(["message" => "GET request to /user"]);
} elseif ($request === '/user' && $method === 'POST') {
    echo json_encode(["message" => "POST request to /user"]);
} else {
    http_response_code(404);
    echo json_encode(["message" => "Endpoint not found", "request"=>$request,"method"=>$method ]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        try {


            $db = new Database($pdo, 'users');
            $user = $db->Find('name', $username)[0];
            if($password == $user['password']){
                echo json_encode(['success' => true, 'message' => 'User Valid', 'user' => $user]);
            }

            echo json_encode(['success' => true, 'message' => 'User inserted successfully']);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Username and password are required']);
    }
} else {
    http_response_code(404);
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>

