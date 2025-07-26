<?php
require_once '../config/database.php';
header('Content-Type: application/json');

// Ambil data JSON dari body
$data = json_decode(file_get_contents("php://input"), true);

$username = $data['username'] ?? '';
$password = $data['password'] ?? '';

if (!$username || !$password) {
    echo json_encode([
        "status" => "error",
        "message" => "Username dan password harus diisi"
    ]);
    exit;
}

$query = "SELECT * FROM tbEmployee WHERE Username = ? AND Password = SHA2(?, 256) AND Banned = 0";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ss", $username, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if ($user) {
    echo json_encode([
        "status" => "success",
        "message" => "Login berhasil",
        "user" => $user
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Username atau password salah"
    ]);
}
