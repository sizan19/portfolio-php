<?php include_once 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Eternal Moments - Home</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <style>
    .main-banner {
      height: 30vh;    
    }
    .main-banner h1 {
      margin-top: 5vh;
    }
    .main-content{
      height: 650px;
    }
    .main-content-1 {
      margin: 150px 50px 20px 150px;
      width: 35%;
    }
    .main-content-2 img{
      max-height: 600px;
      padding: 20px;
      margin-right: 200px;
    }
    .main-content-row{
      display: flex;
      justify-content: space-between;
    }

  </style>
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
          <a href="admin/index.php" class="btn btn-info">Login</a>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Banner / Jumbotron -->
  <div class="bg-dark text-light p-5 text-center main-banner">
    <h1>Welcome to Eternal Moments</h1>
    <p class="lead">Capturing your precious moments, forever.</p>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="row">
      <div class="col-md-12 main-content-row">
          <div class="main-content-1">
          <h2>Who We Are</h2>
          <p>
            We are a team of professional photographers, with years of experience 
            in capturing the best memories. Explore our portfolio to see our work.
          </p>
          <button type="button" class="btn btn-primary btn-lg mt-3">View my works</button>
        </div>
        <div class="main-content-2">
          <img src="assets/img/sheep.png" alt="Photographer image">
        </div>
      </div>
    </div>
  </div>

  <!-- Customers Served Section -->
  <div class="bg-dark text-light p-5 m-5">
    <h2 class="text-center p-3">Our Happy Customers</h2>
    <div class="row p-5 mt-5">
      <div class="col-md-4 text-center">
        <img src="assets/img/customer-1.png" class="img-fluid rounded-circle mb-3" alt="Customer 1">
        <h5>John Doe</h5>
        <p>"Eternal Moments captured our wedding beautifully. Highly recommend!"</p>
      </div>
      <div class="col-md-4 text-center">
        <img src="assets/img/customer-2.png" class="img-fluid rounded-circle mb-3" alt="Customer 2">
        <h5>Jane Smith</h5>
        <p>"Amazing experience! The photos were stunning and the team was very professional."</p>
      </div>
      <div class="col-md-4 text-center">
        <img src="assets/img/customer-3.png" class="img-fluid rounded-circle mb-3" alt="Customer 3">
        <h5>Emily Johnson</h5>
        <p>"Great service and beautiful photos. Will definitely hire them again for future events."</p>
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
