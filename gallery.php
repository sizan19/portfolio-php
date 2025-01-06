<?php
include_once 'includes/config.php'; // Include database connection and runQuery function

// Fetch images from the database (currently sorted by newest first)
$sql = "SELECT * FROM images ORDER BY uploaded_at DESC";
$result = runQuery($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Eternal Moments - Gallery</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    /* Make the page take full height and use flex to push the footer down */
    html, body {
      height: 100%;
      margin: 0; /* Remove default margin on the body */
      padding: 0;
    }
    body {
      display: flex;
      flex-direction: column;
    }
    main {
      flex: 1 0 auto; /* Allows the main content to grow and push footer down */
      padding-top: 4.5rem; /* So main content is not hidden behind sticky navbar */
    }
    footer {
      flex-shrink: 0; /* Footer won't shrink and will stay at bottom */
    }
  </style>
</head>
<body>
  <!-- Navigation (Sticky on top) -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Eternal Moments</a>
      <button class="navbar-toggler" type="button" 
              data-bs-toggle="collapse" data-bs-target="#navbarNav" 
              aria-controls="navbarNav" aria-expanded="false" 
              aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="portfolio.php">Portfolio</a></li>
          <li class="nav-item"><a class="nav-link active" href="gallery.php">Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="experience.php">Experience & Skills</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="admin/index.php">Admin</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main content area -->
  <main>
    <div class="container my-1">
      <h1 class="text-center mb-1">Gallery</h1>

      <!-- Sort Feature Placeholder (Visually Enhanced, Non-Functional) -->
      <div class="d-flex justify-content-end mb-3">
        <div class="input-group" style="width: 300px;">
          <span class="input-group-text">Sort by</span>
          <select id="sort" name="sort" class="form-select">
            <option value="">Select...</option>
            <option value="newest">Newest First</option>
            <option value="oldest">Oldest First</option>
          </select>
          <button type="button" class="btn btn-danger">
            Sort
          </button>
        </div>
      </div>

      <div class="row">
        <?php 
        if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $imagePath = 'admin/' . $row['image_path'];
            ?>
            <div class="col-md-4 mb-4">
              <div class="card">
                <img 
                  src="<?= htmlspecialchars($imagePath) ?>" 
                  class="card-img-top" 
                  alt="<?= htmlspecialchars($row['title']) ?>"
                >
                <div class="card-body">
                  <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                </div>
              </div>
            </div>
            <?php
          }
        } else {
          echo "<p class='text-center'>No images found in the gallery.</p>";
        }
        ?>
      </div>
    </div>
  </main>

  <!-- Footer (stays at the bottom) -->
  <footer class="bg-dark text-light py-3 text-center">
    <p>&copy; <?= date('Y') ?> Eternal Moments. All Rights Reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
