<?php include_once 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Eternal Moments - Portfolio</title>
  <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
          <li class="nav-item"><a class="nav-link active" href="portfolio.php">Portfolio</a></li>
          <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="experience.php">Experience & Skills</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="admin/index.php">Admin</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container my-5">
    <h1 class="text-center mb-4">Our Portfolio</h1>
    <p class="text-center">
      Here is a curated selection of our past and current photography projects.
    </p>

    <div class="row">
      <!-- Add your portfolio items here. They can be static or dynamic. -->
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="images/sample1.jpg" class="card-img-top" alt="Project 1">
          <div class="card-body">
            <h5 class="card-title">Wedding Shoot</h5>
            <p class="card-text">A beautiful wedding project capturing every moment.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="images/sample2.jpg" class="card-img-top" alt="Project 2">
          <div class="card-body">
            <h5 class="card-title">Nature Photography</h5>
            <p class="card-text">Exploring the beauty of nature in different seasons.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="images/sample3.jpg" class="card-img-top" alt="Project 3">
          <div class="card-body">
            <h5 class="card-title">Travel Photography</h5>
            <p class="card-text">Capturing the essence of different cultures and landscapes.</p>
          </div>
        </div>
      </div>
      <!-- Add more projects as needed -->
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-light py-3 text-center">
    <p>&copy; <?= date('Y') ?> Eternal Moments. All Rights Reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
