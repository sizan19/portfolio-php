<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  header("Location: index.php");
  exit;
}
include_once '../includes/config.php';

// Process the file upload logic...
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload Images - Admin Panel</title>
  <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      overflow-y: auto;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .main-content {
      margin-left: 220px;
      padding: 20px;
    }
    .sidebar .nav-link {
      color: #333;
    }
    .sidebar .nav-link.active {
      background-color: #0d6efd;
      color: #fff;
    }
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Side Navbar -->
    <nav class="col-md-2 bg-light sidebar p-3">
      <h4 class="pb-3 border-bottom">Admin Panel</h4>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">
            <i class="bi bi-house-door"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="upload.php">
            <i class="bi bi-upload"></i> Upload Images
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="messages.php">
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

    <!-- Main Content -->
    <div class="main-content col-md-10 ms-sm-auto">
      <h2>Upload a New Image</h2>
      <!-- Here goes your form to upload images -->
      <form method="POST" action="" enctype="multipart/form-data">
        <!-- Form fields -->
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
