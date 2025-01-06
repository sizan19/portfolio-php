<?php
include_once 'includes/config.php'; // Include database connection and runQuery function

if (isset($_POST['submit'])) {
    // Sanitize user inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Insert message into the database
    $sql = "INSERT INTO messages (name, email, message) VALUES (?, ?, ?)";
    $params = [$name, $email, $message];

    if (runQuery($sql, $params)) {
        // Redirect to thank you page or show success message
        header("Location: thank_you.php");
        exit;
    } else {
        $error = "There was an error submitting your message. Please try again later.";
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
  <meta charset="UTF-8">
  <title>Eternal Moments - Contact</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    .container-contactus {
      padding: 50px;
      border-radius: 10px;
      width: 50%;
      /* Remove height:100% to allow flexbox to manage height
         or keep it if you specifically need a tall container. */
      background-color: #1a1a1a;
      color: white;
    }
    .map-responsive iframe {
      width: 100%;
      height: 250px;
      border: 0;
    }
    .form-label {
      font-weight: bold;
    }
  </style>
</head>
<body class="d-flex flex-column h-100">
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
          <li class="nav-item"><a class="nav-link active" href="contact.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="admin/index.php">Admin</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content (flex-fill pushes footer down) -->
  <main class="flex-fill">
    <!-- Contact Form Container -->
    <div class="bg-dark text-light container my-5 container-contactus">
      <h1 class="text-center mb-4">Contact Us</h1>
      <div class="row">
        <div class="col-md-6">
          <h3 class="mb-5">Our Office</h3>
          <p><strong>Office Name:</strong> Eternal Moments</p>
          <p><strong>Location:</strong> Koteshwor, Kathmandu</p>
          <p><strong>Contact Number:</strong> +977 9843937012</p>
          <!-- Google Maps Embed -->
          <div class="map-responsive">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4255.149407666304!2d85.34653887604276!3d27.68873902631093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198bf9bd6c7d%3A0xb9e9193ddf9eda4f!2sISMT%20College!5e1!3m2!1sen!2snp!4v1735288333628!5m2!1sen!2snp" 
              loading="lazy" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-6">
          <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
          <?php endif; ?>
          <form method="POST" action="">
            <div class="mb-3">
              <label for="name" class="form-label">Name:</label>
              <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message:</label>
              <textarea name="message" class="form-control" id="message" rows="5" required></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer (mt-auto ensures footer is pushed down) -->
  <footer class="bg-dark text-light py-3 text-center mt-auto">
    <p>&copy; <?= date('Y') ?> Eternal Moments. All Rights Reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
