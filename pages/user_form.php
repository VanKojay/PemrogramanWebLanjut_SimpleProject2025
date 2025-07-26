<?php include '../includes/header.php'; ?>
<?php
$id = $_GET['id'] ?? '';
$nama = $email = '';
if ($id) {
  // Ambil data user untuk diedit
  $user = json_decode(file_get_contents("http://localhost/projectapi/user.php?id=$id"), true)['data'];
  $nama = $user['nama'];
  $email = $user['email'];
}
?>
<h2><?= $id ? 'Edit' : 'Tambah' ?> User</h2>
<form action="proses_user.php" method="POST">
  <input type="hidden" name="id" value="<?= $id ?>">
  <div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control" value="<?= $nama ?>" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="<?= $email ?>" required>
  </div>
  <button type="submit" class="btn btn-primary"><?= $id ? 'Update' : 'Simpan' ?></button>
</form>
<?php include '../includes/footer.php'; ?>
