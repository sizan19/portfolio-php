<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}

include_once '../includes/config.php';

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload'])) {
    $title = htmlspecialchars(trim($_POST['title']));
    $image = $_FILES['image'];

    $targetDir = "uploads/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    $targetFile = $targetDir . basename($image["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (getimagesize($image["tmp_name"]) === false) {
        $_SESSION['error'] = "File is not a valid image.";
    } elseif (file_exists($targetFile)) {
        $_SESSION['error'] = "File already exists.";
    } elseif ($image["size"] > 50000000) {
        $_SESSION['error'] = "File is too large. Maximum size is 5MB.";
    } elseif (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
        $_SESSION['error'] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
    } else {
        if (move_uploaded_file($image["tmp_name"], $targetFile)) {
            $stmt = $conn->prepare("INSERT INTO images (image_path, title) VALUES (?, ?)");
            $stmt->bind_param("ss", $targetFile, $title);

            if ($stmt->execute()) {
                $_SESSION['success'] = "Image uploaded successfully!";
            } else {
                $_SESSION['error'] = "Error saving image to the database.";
            }

            $stmt->close();
        } else {
            $_SESSION['error'] = "Error uploading the file.";
        }
    }
    header("Location: upload.php");
    exit;
}

// Handle update title
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $title = htmlspecialchars(trim($_POST['title']));

    $stmt = $conn->prepare("UPDATE images SET title = ? WHERE id = ?");
    $stmt->bind_param("si", $title, $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Title updated successfully!";
    } else {
        $_SESSION['error'] = "Error updating the title.";
    }

    $stmt->close();
    header("Location: upload.php");
    exit;
}

// Handle delete image
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $id = intval($_POST['id']);

    // Fetch image path
    $stmt = $conn->prepare("SELECT image_path FROM images WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($imagePath);
    $stmt->fetch();
    $stmt->close();

    // Delete file from the server
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Delete record from database
    $stmt = $conn->prepare("DELETE FROM images WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Image deleted successfully!";
    } else {
        $_SESSION['error'] = "Error deleting the image.";
    }

    $stmt->close();
    header("Location: upload.php");
    exit;
}

// Fetch images from the database
$sql = "SELECT * FROM images ORDER BY uploaded_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Images - Admin Panel</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
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
      margin-left: 0;
      padding: 20px;
    }
    .main-content h2 {
      color: #343a40;
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
        <li class="nav-item mt-5">
          <a class="nav-link text-danger" href="logout.php">
            <i class="bi bi-box-arrow-left"></i> Logout
          </a>
        </li>
      </ul>
    </nav>

    <!-- Main Content -->
    <div class="col-md-10 main-content">
      <!-- Messages -->
      <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
      <?php endif; ?>
      <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
      <?php endif; ?>

      <!-- Upload Section -->
      <h2>Upload a New Image</h2>
      <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary" name="upload">Upload</button>
      </form>

      <!-- Gallery Section -->
      <h2 class="mt-5">Manage Images</h2>
      <div class="row">
        <?php if ($result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
              <div class="card">
                <img src="<?= htmlspecialchars($row['image_path']); ?>" class="card-img-top" alt="<?= htmlspecialchars($row['title']); ?>">
                <div class="card-body">
                  <h5 class="card-title"><?= htmlspecialchars($row['title']); ?></h5>
                  <form method="POST">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                    <div class="mb-3">
                      <label for="title-<?= $row['id']; ?>" class="form-label">Update Title</label>
                      <input type="text" class="form-control" id="title-<?= $row['id']; ?>" name="title" value="<?= htmlspecialchars($row['title']); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success" name="update">Update</button>
                    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                  </form>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <p class="text-center">No images found in the gallery.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
