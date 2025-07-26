<?php

// ===========================
// CORS Headers
// ===========================
header("Access-Control-Allow-Origin: *"); // Atau ganti * dengan asal spesifik seperti http://localhost:5173
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");


// Untuk handle preflight (OPTIONS request)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$endpoint = $_GET['endpoint'] ?? '';

switch ($endpoint) {
    case 'user':
        require_once '../api/user.php';
        break;

    case 'login':
        require_once '../api/login.php';
        break;

    default:
        http_response_code(404);
        echo json_encode([
            "status" => "error",
            "message" => "Endpoint not found"
        ]);
        break;
}
