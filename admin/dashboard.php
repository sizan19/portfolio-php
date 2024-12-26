<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Eternal Moments</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    /* Optional custom styling for the side navbar */
    .sidebar {
      height: 100vh;           /* Make sidebar full screen height */
      position: fixed;         /* Keep sidebar fixed */
      top: 0;
      left: 0;
      overflow-y: auto;        /* Scroll if the sidebar content is too long */
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .sidebar .nav-link {
      color: #333;
    }
    .sidebar .nav-link.active {
      background-color: #0d6efd;
      color: #fff;
    }
    /* Offset the main content so it doesn't hide behind the fixed sidebar */
    .main-content {
      margin-left: 220px;  /* same as the .col-md-2 (roughly 200-220px) width */
      padding: 20px;
    }
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Side Navbar -->
    <nav class="col-md-2 bg-danger-subtle sidebar">
      <h4 class="pb-3 border-bottom m-4">Admin Panel</h4>
      <ul class="nav flex-column mt-5">
        <li class="nav-item">
          <a class="nav-link active" href="dashboard.php">
            <i class="bi bi-house-door"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="upload.php">
            <i class="bi bi-upload"></i> Upload Images
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="messages.php">
            <i class="bi bi-envelope"></i> View Messages
          </a>
        </li>
        <li class="nav-item mt-5">
          <a class="nav-link text-danger" href="logout.php">
            <i class="bi bi-box-arrow-left"></i> Logout
          </a>
        </li>
      </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content col-md-10 ms-sm-auto">
      <h1>Welcome to the Admin Dashboard</h1>
      <p>Use the side navigation to manage your portfolio items, upload images, or check messages.</p>
      <!-- Additional dashboard content goes here -->
    </div>
  </div>
</div>

<!-- Bootstrap Icons (optional) -->
<link rel="stylesheet" 
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<!-- Bootstrap JavaScript Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
