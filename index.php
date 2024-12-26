<?php include_once 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Eternal Moments - Home</title>
  <!-- Bootstrap CSS -->
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
          <li class="nav-item"><a class="nav-link" href="portfolio.php">Portfolio</a></li>
          <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="experience.php">Experience & Skills</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          <!-- Admin Login Link (optional) -->
          <li class="nav-item"><a class="nav-link" href="admin/index.php">Admin</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Banner / Jumbotron -->
  <div class="bg-dark text-light p-5 text-center">
    <h1>Welcome to Eternal Moments</h1>
    <p class="lead">Capturing your precious moments, forever.</p>
  </div>

  <!-- Main Content -->
  <div class="container my-5">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Who We Are</h2>
        <p>
          We are a team of professional photographers, with years of experience 
          in capturing the best memories. Explore our portfolio to see our work.
        </p>
        <a href="portfolio.php" class="btn btn-primary">View Our Portfolio</a>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-light py-3 text-center">
    <p>&copy; <?= date('Y') ?> Eternal Moments. All Rights Reserved.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
