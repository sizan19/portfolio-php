<?php
session_start();
include_once '../includes/config.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  // Using MD5 here for simplicity, but in production use password_hash()
  $password = md5($password);

  $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ? AND password = ?");
  $stmt->bind_param("ss", $username, $password);
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
  <title>Admin Login - Eternal Moments</title>
  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container my-5">
    <h2 class="text-center">Admin Login</h2>
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <?php if (isset($error)): ?>
          <div class="alert alert-danger"><?= $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" 
                   class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" 
                   class="form-control" required>
          </div>
          <button type="submit" name="login" class="btn btn-primary w-100">
            Login
          </button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
