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
<body style="background-color: #EDF4C2;">
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class=" text-white p-3" id="nav-bar" style="min-width: 250px; background-color: #DF9755;">
            <a href="admin_dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 text-white text-decoration-none">
                <span class="fs-2 fw-bold">Task Manager</span>
            </a>
            <hr>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="admin_dashboard.php" class="nav-link text-white fs-5">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="create_task.php" class="nav-link text-white fs-5">Create Task</a>
                </li>
                <li class="nav-item">
                    <a href="manage_task.php" class="nav-link text-white fs-5">Manage Task</a>
                </li>
                <li class="nav-item">
                    <a href="all_leave.php" class="nav-link text-white fs-5">Leave Applications</a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link text-white fs-5">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Top Bar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <span class="navbar-text">Welcome, </span> 
                    <span><?php echo $_SESSION["name"];  ?></span>
                    <span><?php echo $_SESSION["email"];  ?></span>
                </div>
            </nav>

            <!-- Dashboard Content -->
            <div class="container mt-4">
                <h1 class="text-center">Admin Dashboard</h1>
                <marquee class="py-3 fs-5">Welcome to your task management system.</marquee>

                <!-- Example content cards -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Create a Task</h5>
                                <p class="card-text">Add new tasks to stay organized.</p>
                                <a href="create_task.php" class="btn btn-primary">Create Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Tasks Overview</h5>
                                <p class="card-text">View and manage your tasks efficiently.</p>
                                <a href="manage_task.php" class="btn btn-success">Go to Tasks</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Leave Applications</h5>
                                <p class="card-text">Submit and view leave applications.</p>
                                <a href="all_leave.php" class="btn btn-danger">View Applications</a>
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
