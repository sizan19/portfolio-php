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
  <div class="container my-5 mt-5">
    <h1 class="text-center mb-4">Experience & Skills</h1>
    <div class="row mt-5">
      <div class="col-md-6">
        <div class="card mb-4">
          <div class="card-header bg-primary text-white">
            <h2>Our Experience</h2>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">5+ years of professional photography experience.</li>
              <li class="list-group-item">Covered over 200 events including weddings, concerts, and corporate events.</li>
              <li class="list-group-item">Worked with top brands for marketing campaigns and ad shoots.</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card mb-4">
          <div class="card-header bg-success text-white">
            <h2>Skills</h2>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Portrait photography
                <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                </div>
              </li>
              <li class="list-group-item">Landscape & Nature photography
                <div class="progress">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                </div>
              </li>
              <li class="list-group-item">Expert in Photoshop & Lightroom
                <div class="progress">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">95%</div>
                </div>
              </li>
              <li class="list-group-item">Event Photography
                <div class="progress">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                </div>
              </li>
              <li class="list-group-item">Photo Editing
                <div class="progress">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                </div>
              </li>
              <li class="list-group-item">Studio Lighting
                <div class="progress">
                  <div class="progress-bar bg-secondary" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header bg-info text-white">
            <h2>Awards & Publications</h2>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Winner of XYZ Photography Award, 2023</li>
              <li class="list-group-item">Published in “Photography Weekly” magazine</li>
            </ul>
          </div>
        </div>
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
