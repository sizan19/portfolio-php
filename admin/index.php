<?php
session_start();
include_once '../includes/config.php';

if (isset($_POST['login'])) {
    // Sanitize user input
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    
    // Hash the input password using MD5
    $hashedPassword = md5($password);

    // Check the credentials in the database
    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $hashedPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - Eternal Moments</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    .vh-100 {
      min-height: 100vh;
    }
    .card {
      border-radius: 1rem;
    }
    .card-body {
      padding: 2rem;
    }
    .btn-dark {
      background-color: #343a40;
    }
    .btn-dark:hover {
      background-color: #23272b;
    }
  </style>
</head>
<body>

<section class="bg-dark vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://media.discordapp.net/attachments/1283308655055212607/1324250776964698112/logo.png?ex=67777824&is=677626a4&hm=b36ada0245cb57d94dbbc64de2d3184e8f362688bf7f2f7438d896d38d0622cd&=&format=webp&quality=lossless"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body text-black">

                <form method="POST" action="">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <span class="h1 fw-bold mb-0 text-dark">Admin Panel</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error; ?></div>
                  <?php endif; ?>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="Username">Username</label>
                    <input type="text" id="Username" name="username" class="form-control form-control-lg" required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="Password">Password</label>
                    <input type="password" id="Password" name="password" class="form-control form-control-lg" required />
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="login">Login</button>
                  </div>

                  <a href="#" class="small text-muted">Terms of use</a>
                  <a href="#" class="small text-muted ms-2">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
