<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: url('https://images.unsplash.com/photo-1577412647305-991150c7d163?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
      font-family: Arial, sans-serif;
    }

    .form-container {
      background: rgba(30, 30, 30, 0.9); /* Slightly transparent black background */
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      height: 100vh;
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

    .login-link {
      color: #ffcc00;
      text-decoration: none;
    }

    .login-link:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
      <div class="col-md-6">
        <div class="form-container">
          <h2 class="text-center">Registration Form</h2>
          <hr class="gold-divider">
          <form action="register_action.php" method="post">
            <div class="mb-2">
              <label for="fullName" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
            </div>
            <div class="mb-2">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-2">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter a strong password" required>
            </div>
            <div class="mb-2">
              <label for="confirmPassword" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm your password" required>
            </div>
            <div class="mb-2">
              <label class="form-label">Gender</label>
              <div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" required>
                  <label class="form-check-label" for="genderMale">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female" required>
                  <label class="form-check-label" for="genderFemale">Female</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="genderOther" value="Other" required>
                  <label class="form-check-label" for="genderOther">Other</label>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
            <div class="text-center mt-3">
              <p>Already have an account? <a href="login.php" class="login-link">Login here</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php

if(isset($_SESSION["email_error"]) && $_SESSION["email_error"] == "email_error"){
echo "<script>alert('This Email Id Already Exists') </script>";
$_SESSION["email_error"] = "";
}
if(isset($_SESSION["password_error"]) && $_SESSION["password_error"] == "password_error"){
    echo $_SESSION["password_error"];
    // echo "<script>alert('Please Enter Your Confirm Password') </script>";
    // $_SESSION["password_error"] = "";
    }
?>
</body>

</html>
