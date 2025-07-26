<?php

// header('Content-Type: application/json');

// $host = "103.150.117.84";
// $user = "myuser";
// $password = "mypassword";
// $database = "mydb";

// // Versi Prosedural
// $conn = mysqli_connect($host, $user, $password, $database);

// if (!$conn) {
//     http_response_code(500); // Internal Server Error
//     echo json_encode([
//         "status" => "error",
//         "message" => "Koneksi gagal: " . mysqli_connect_error()
//     ]);
//     exit;
// }

// echo json_encode([
//     "status" => "success",
//     "message" => "Koneksi berhasil!"
// ]);

$host = "103.150.117.84";
$user = "myuser";
$password = "mypassword";
$database = "mydb";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die(json_encode(["error" => mysqli_connect_error()]));
}



?>
