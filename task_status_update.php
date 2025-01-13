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
                <h1 class="text-center">Update Your Task</h1>
                <marquee class="py-3 fs-5">Welcome to your task management system.</marquee>
                <!-- Example Content Section -->
                <div class="row">
                    <?php
                    if(isset($_GET["id"])){
                        $id = $_GET["id"];
                    }
                    ?>
                <div class="col-6 offset-3">
                    <form action="task_status_update_action.php" method="post">
                        <input type="hidden" name="id" id="id" value="<?php echo $id ;  ?>">
                        <div>
                        <label for="sel1" class="form-label">Update Task Status:</label>
                        <select class="form-select" id="status" name="status" required>
                        <option value="">--Select--</option>
                        <option value="Process">Process</option>
                        <option value="Complete">Complete</option>
                        </select>
                        </div>
    
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
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
