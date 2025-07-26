<?php
header('Content-Type: application/json');
require_once '../config/database.php';

// Ambil parameter action (create/read/update/delete)
$action = $_GET['action'] ?? '';

switch ($action) {

    // ------------------ CREATE ------------------
    case 'create':
        $data = json_decode(file_get_contents("php://input"), true);
        $username = $data['username'];
        $password = $data['password'];
        $alamat   = $data['alamat'];
        $desa     = $data['desa'];
        $kecamatan = $data['kecamatan'];
        $kota     = $data['kota'];

        $query = "INSERT INTO tbUser (Username, Password, Role, Alamat, Desa, Kecamatan, Kota) 
                  VALUES (?, SHA2(?, 256), 'user', ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssss", $username, $password, $alamat, $desa, $kecamatan, $kota);
        $success = mysqli_stmt_execute($stmt);

        echo json_encode(["status" => $success ? "success" : "error"]);
        break;

    // ------------------ READ ------------------
    case 'read':
        $id = $_GET['id'] ?? null;

        if ($id) {
            $query = "SELECT * FROM tbUser WHERE Id_User = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);

            echo json_encode($user ?: ["status" => "not found"]);
        } else {
            $result = mysqli_query($conn, "SELECT * FROM tbUser");
            $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo json_encode(["data" => $users]); // ← ini penting
        }
        break;

    // ------------------ UPDATE ------------------
    case 'update':
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo json_encode(["status" => "error", "message" => "ID is required"]);
            break;
        }

        $data = json_decode(file_get_contents("php://input"), true);
        $username = $data['username'];
        $alamat   = $data['alamat'];
        $desa     = $data['desa'];
        $kecamatan = $data['kecamatan'];
        $kota     = $data['kota'];

        $query = "UPDATE tbUser SET Username=?, Alamat=?, Desa=?, Kecamatan=?, Kota=?, Update_Date=NOW() WHERE Id_User=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssssi", $username, $alamat, $desa, $kecamatan, $kota, $id);
        $success = mysqli_stmt_execute($stmt);

        echo json_encode(["status" => $success ? "success" : "error"]);
        break;

    // ------------------ DELETE ------------------
    case 'delete':
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo json_encode(["status" => "error", "message" => "ID is required"]);
            break;
        }

        $query = "DELETE FROM tbUser WHERE Id_User = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        $success = mysqli_stmt_execute($stmt);

        echo json_encode(["status" => $success ? "success" : "error"]);
        break;

    // ------------------ DEFAULT ------------------
    default:
        echo json_encode(["status" => "error", "message" => "Invalid action"]);
}
