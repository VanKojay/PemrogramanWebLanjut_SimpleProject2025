<nav class="navbar navbar-light bg-light d-md-none shadow-sm fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-primary" href="#">MyApp</a>
    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
      <i class="bi bi-list"></i>
    </button>
  </div>
</nav>

<!-- OFFCANVAS Sidebar -->
<div class="offcanvas offcanvas-start bg-light" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="mobileSidebarLabel">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <?php include 'includes/sidebar_content.php'; ?>
  </div>
</div>
