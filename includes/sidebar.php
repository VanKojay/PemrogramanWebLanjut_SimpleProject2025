<!-- Mobile Navbar -->
<nav class="navbar navbar-light bg-light d-md-none shadow-sm fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-primary" href="#">MyApp</a>
    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
      <i class="bi bi-list"></i>
    </button>
  </div>
</nav>

<!-- Sidebar -->
<div class="offcanvas-md offcanvas-start bg-light shadow" tabindex="-1" id="sidebarMenu">
  <div class="offcanvas-header d-md-none">
    <h5 class="offcanvas-title">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <div class="offcanvas-body d-flex flex-column p-3" style="height: 100vh;">
    <a href="dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
      <span class="fs-4 fw-bold text-primary">PWL</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="dashboard.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) === 'dashboard.php' ? 'active' : 'text-dark' ?>">
          <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
      </li>
      <li>
        <a href="user_list.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) === 'user_list.php' ? 'active' : 'text-dark' ?>">
          <i class="bi bi-people me-2"></i> User
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://ui-avatars.com/api/?name=User" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>Admin</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser">
        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</div>
