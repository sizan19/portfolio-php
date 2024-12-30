<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}

include_once '../includes/config.php';

// Fetch messages using runQuery function
$sql = "SELECT * FROM messages ORDER BY submitted_at DESC";
$result = runQuery($sql);

// Fetch all messages into an array
$messages = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row;
    }
} else {
    $_SESSION['error'] = "Failed to fetch messages from the database.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Messages - Admin Panel</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    /* Sidebar Styling */
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

    /* Main Content */
    .main-content {
      margin-left: 220px; /* Sidebar width */
      padding: 20px;
    }

    .table th, .table td {
      vertical-align: middle;
    }

    .card {
      margin-bottom: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: #343a40;
      color: white;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-2 sidebar">
        <h4>Admin Panel</h4>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="upload.php"><i class="bi bi-upload"></i> Upload Images</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="messages.php"><i class="bi bi-envelope"></i> View Messages</a>
          </li>
          <li class="nav-item mt-5">
            <a class="nav-link text-danger" href="logout.php"><i class="bi bi-box-arrow-left"></i> Logout</a>
          </li>
        </ul>
      </nav>

      <!-- Main Content -->
      <div class="main-content col-md-10 ms-sm-auto">
        <!-- Messages -->
        <?php if (isset($_SESSION['success'])): ?>
          <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])): ?>
          <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <h2>Contact Messages</h2>
        <?php if (!empty($messages)): ?>
          <div class="card">
            <div class="card-header">
              <h5>Messages List</h5>
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Submitted At</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($messages as $message): ?>
                  <tr>
                    <td><?= htmlspecialchars($message['id']); ?></td>
                    <td><?= htmlspecialchars($message['name']); ?></td>
                    <td><?= htmlspecialchars($message['email']); ?></td>
                    <td><?= htmlspecialchars($message['message']); ?></td>
                    <td><?= htmlspecialchars($message['submitted_at']); ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        <?php else: ?>
          <p class="text-center">No messages found.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>