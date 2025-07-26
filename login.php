<?php include 'includes/header.php'; ?>
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
    <h3 class="text-center mb-4">Login</h3>
    <form onsubmit="event.preventDefault(); loginUser(document.getElementById('username').value, document.getElementById('password').value)">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
