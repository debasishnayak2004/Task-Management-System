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
    <style>
        #nav-bar{
            height: 100vh;
        }
        @media only screen and (max-width: 676px) {
            #nav-bar{
            height: auto;
        }
}
    </style>
</head>
<body style="background-color: #FBF5E5;">
    <div class="d-flex">
        <!-- Sidebar Menu -->
        <nav class="bg-success text-white flex-shrink-0 p-3" id="nav-bar" style="width: 250px; ">
            <a href="user_dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 text-white text-decoration-none">
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
            <nav class="navbar navbar-expand-lg navbar-light bg-light  border-bottom">
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
                <h1 class="text-center">User Dashboard</h1>
                <marquee class="py-3 fs-5">Welcome to your task management system.</marquee>
                <!-- Example Content Section -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card  bg-primary mb-3">
                            <div class="card-body">
                                <a href="update_task.php" style="text-decoration: none;"><h5 class="card-title text-white">Update Tasks</h5>
                                <p class="card-text text-white">Update your tasks here.</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                            <a href="apply_leave.php" style="text-decoration: none;"><h5 class="card-title text-white">Apply Leave</h5>
                            <p class="card-text text-white">Apply your leave status here.</p></a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-body">
                            <a href="leave_status.php" style="text-decoration: none;"><h5 class="card-title text-white">Leave Status</h5>
                            <p class="card-text text-white">Track your leave status here.</p></a>
                              
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php

if(isset( $_SESSION["login_success"]) &&  $_SESSION["login_success"] == "login_success"){
echo "<script>alert('Login Success') </script>";
$_SESSION["login_success"] = "";
}
?>
</body>
</html>
