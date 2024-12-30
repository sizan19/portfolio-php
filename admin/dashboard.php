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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Eternal Moments</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .sidebar {
      background-color: #343a40;
      min-height: 100vh;
      padding-top: 20px;
    }
    .sidebar h4 {
      color: #ffffff;
      text-align: center;
      margin-bottom: 20px;
    }
    .sidebar .nav-link {
      color: #ffffff;
      padding: 10px 15px;
      border-radius: 5px;
      margin: 5px 15px;
    }
    .sidebar .nav-link.active, .sidebar .nav-link:hover {
      background-color: #495057;
      color: #ffffff;
    }
    .sidebar .nav-link i {
      margin-right: 10px;
    }
    .main-content {
      margin-left: 220px; /* Matches sidebar width */
      padding: 20px;
    }
    .main-content h1 {
      font-size: 2rem;
      color: #343a40;
    }
    .main-content p {
      font-size: 1rem;
      color: #6c757d;
    }
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Side Navbar -->
    <nav class="col-md-2 sidebar">
      <h4>Admin Panel</h4>
      <ul class="nav flex-column">
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
      <!-- Additional dashboard content -->
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
