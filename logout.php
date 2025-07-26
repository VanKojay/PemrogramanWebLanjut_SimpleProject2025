<?php include 'includes/header.php'; ?>

<script>
// Hapus data user dari localStorage dan redirect
localStorage.removeItem("user");
window.location.href = "login.php";
</script>

<?php include 'includes/footer.php'; ?>
