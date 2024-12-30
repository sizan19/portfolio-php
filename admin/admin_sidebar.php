<!-- admin_sidebar.php -->
<nav class="col-md-2 sidebar p-3">
  <h4 class="pb-3 border-bottom">Admin Panel</h4>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link <?= basename($_SERVER['PHP_SELF']) === 'dashboard.php' ? 'active' : '' ?>" 
         href="dashboard.php">
        <i class="bi bi-house-door"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?= basename($_SERVER['PHP_SELF']) === 'upload.php' ? 'active' : '' ?>" 
         href="upload.php">
        <i class="bi bi-upload"></i> Upload Images
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?= basename($_SERVER['PHP_SELF']) === 'messages.php' ? 'active' : '' ?>" 
         href="messages.php">
        <i class="bi bi-envelope"></i> View Messages
      </a>
    </li>
    <li class="nav-item mt-3">
      <a class="nav-link text-danger" href="logout.php">
        <i class="bi bi-box-arrow-left"></i> Logout
      </a>
    </li>
  </ul>
</nav>
