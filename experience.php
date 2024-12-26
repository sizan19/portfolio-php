<?php include_once 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Eternal Moments - Experience & Skills</title>
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
          <li class="nav-item"><a class="nav-link active" href="experience.php">Experience & Skills</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="admin/index.php">Admin</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Experience Content -->
  <div class="container my-5">
    <h1 class="text-center mb-4">Experience & Skills</h1>
    <div class="row">
      <div class="col-md-6">
        <h2>Our Experience</h2>
        <ul>
          <li>5+ years of professional photography experience.</li>
          <li>Covered over 200 events including weddings, concerts, and corporate events.</li>
          <li>Worked with top brands for marketing campaigns and ad shoots.</li>
        </ul>
      </div>
      <div class="col-md-6">
        <h2>Skills & Awards</h2>
        <ul>
          <li>Portrait photography</li>
          <li>Landscape & Nature photography</li>
          <li>Expert in Photoshop & Lightroom</li>
          <li>Winner of XYZ Photography Award, 2023</li>
          <li>Published in “Photography Weekly” magazine</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-light py-3 text-center">
    <p>&copy; <?= date('Y') ?> Eternal Moments. All Rights Reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
