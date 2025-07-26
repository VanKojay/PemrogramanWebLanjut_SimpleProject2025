<?php
// Ambil ID dari URL
$id = $_GET['id'] ?? 0;

// Dummy data (ganti dengan DB nanti)
$userDetail = [
  1 => ['nama' => 'John Doe', 'username' => 'johndoe', 'email' => 'john@example.com', 'role' => 'Admin'],
  2 => ['nama' => 'Jane Smith', 'username' => 'janesmith', 'email' => 'jane@example.com', 'role' => 'User'],
];

$data = $userDetail[$id] ?? null;

if (!$data) {
  echo "<p>User tidak ditemukan.</p>";
  exit;
}
?>

<h2>Detail User</h2>
<ul>
  <li><strong>Nama:</strong> <?= $data['nama'] ?></li>
  <li><strong>Username:</strong> <?= $data['username'] ?></li>
  <li><strong>Email:</strong> <?= $data['email'] ?></li>
  <li><strong>Role:</strong> <?= $data['role'] ?></li>
</ul>
<a href="user_list.php" class="btn btn-secondary">← Kembali ke Daftar</a>
