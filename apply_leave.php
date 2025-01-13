<?php
include("connection.php");
session_start();
if(!(isset($_SESSION["email"]))){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #FBF5E5;">
    <div class="d-flex">
        <!-- Sidebar Menu -->
        <nav class="bg-success text-white flex-shrink-0 p-3" style="width: 250px; height: 100vh;">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 text-white text-decoration-none">
                <span class="fs-2 fw-bold">Task Manager</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="user_dashboard.php" class="nav-link text-white fs-5" aria-current="page">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="update_task.php" class="nav-link text-white text-white fs-5">
                        Update Task
                    </a>
                </li>
                <li>
                    <a href="apply_leave.php" class="nav-link text-white text-white fs-5">
                        Apply Leave
                    </a>
                </li>
                <li>
                    <a href="leave_status.php" class="nav-link text-white text-white fs-5">
                        Leave Status
                    </a>
                </li>
                <li>
                    <a href="logout.php" class="nav-link text-white text-white fs-5">
                        Logout
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Top Bar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <div class="d-flex align-items-center">
                        <p class="fs-5">Name - <?php echo $_SESSION["name"];  ?></p>
                    </div>
                    <div class="d-flex align-items-center">
                        <p class="fs-5">Email Id - <?php echo $_SESSION["email"];  ?></p>
                    </div>
                </div>
            </nav>

            <!-- Dashboard Content -->
            <div class="container py-4">
                <h1 class="text-center">Apply Leave</h1>
                <marquee class="py-3 fs-5">Welcome to your task management system.</marquee>
                <!-- Example Content Section -->
                 <div class="row">
                 <div class="col-6 offset-3">
                 <form action="apply_leave_action.php" method="post">
                    <div class="mb-3 mt-3">
                        <label for="subject" class="form-label">Subject:</label>
                        <input type="text" class="form-control"  name="subject" id="subject" placeholder="Enter Your Subject" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="message">Message:</label>
                        <textarea class="form-control mt-1" rows="5" placeholder="Enter Your Message....." id="message" name="message" required></textarea>
                    </div>
  
                    <button type="submit" class="btn btn-primary">Apply</button>
                 </form>
                 </div>
                 </div>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php

if(isset( $_SESSION["apply_leave"]) &&  $_SESSION["apply_leave"] == "apply_leave"){
echo "<script>alert('Apply Leave Success') </script>";
$_SESSION["apply_leave"] = "";
}
?>
</body>
</html>
