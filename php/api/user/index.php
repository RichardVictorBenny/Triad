<?php
header('Content-Type: application/json');

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
// $path = trim($_SERVER['PATH_INFO'], '/');


if ($request === '/api/user/' && $method === 'GET') {
    echo json_encode(["message" => "GET request to /user"]);
} elseif ($request === '/user' && $method === 'POST') {
    echo json_encode(["message" => "POST request to /user"]);
} else {
    http_response_code(404);
    echo json_encode(["message" => "Endpoint not found", "request"=>$request,"method"=>$method ]);
}
?>
