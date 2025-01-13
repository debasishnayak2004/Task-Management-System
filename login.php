<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: url('https://images.unsplash.com/photo-1531972111231-7482a960e109?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
      font-family: Arial, sans-serif;
    }

    .form-container {
      background: rgba(30, 30, 30, 0.9); /* Slightly transparent black background */
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .form-container .btn-primary {
      background-color: #ffcc00;
      border: none;
      color: #000;
    }

    .form-container .btn-primary:hover {
      background-color: #e6b800;
    }

    .gold-divider {
      border: 1px solid #ffcc00;
      margin: 20px 0;
    }

    .register-link {
      color: #ffcc00;
      text-decoration: none;
    }

    .register-link:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
      <div class="col-md-4">
        <div class="form-container">
          <h2 class="text-center">Login</h2>
          <hr class="gold-divider">
          <form action="login_action.php" method="post">
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="rememberMe">
              <label class="form-check-label" for="rememberMe">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <div class="text-center mt-3">
              <p>Don't have an account? <a href="index.php" class="register-link">Register here</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <?php

if(isset( $_SESSION["register_success"]) &&  $_SESSION["register_success"] == "register_success"){
echo "<script>alert('Registration Success') </script>";
$_SESSION["register_success"] = "";
}
// if(isset( $_SESSION["email_error"]) &&  $_SESSION["email_error"] == "error"){
//   echo "<script>alert('Invalid Email Id') </script>";
//   $_SESSION["email_error"] = "";
//   }
  if(isset( $_SESSION["password_error"]) &&  $_SESSION["password_error"] == "error"){
    echo "<script>alert('Invalid Email Id') </script>";
    $_SESSION["password_error"] = "";
    }
?>
</body>

</html>
