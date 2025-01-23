<?php
header("Content-Type: application/json");
require_once './db.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = trim($_SERVER['PATH_INFO'], '/');
$request = $_SERVER['REQUEST_URI'];

echo json_encode(["method" => $method, "request" => $request]);

// if ($path !== '') {
//     $file = __DIR__ . '/' . $path . '/' . strtolower($method) . '.php';
//     if (file_exists($file)) {
//         require $file;
//     } else {
//         http_response_code(404);
//         echo json_encode(["message" => "Endpoint not found"]);
//     }
// } else {
//     http_response_code(400);
//     echo json_encode(["message" => "Invalid path"]);
// }
