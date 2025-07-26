<?php include 'includes/header.php'; ?>

<!-- Mobile Navbar -->
<?php include 'includes/sidebar_mobile.php'; ?>

<div class="d-flex">
  <!-- Sidebar Desktop -->
  <div class="d-none d-md-block">
    <?php include 'includes/sidebar.php'; ?>
  </div>

  <!-- Konten utama -->
  <div class="main-content p-4 pt-md-4" style="min-height: 100vh;">
  <?php if (isset($page)) include $page; ?>
</div>
</div>

<?php include 'includes/footer.php'; ?>
