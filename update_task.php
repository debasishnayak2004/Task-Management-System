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
                <h1 class="text-center">Your Task List</h1>
                <marquee class="py-3 fs-5">Welcome to your task management system.</marquee>
                <!-- Example Content Section -->
                <div class="row" >
                 <div class="col-12 px-4 py-3" >
                 <div class="table-responsive">
                 <table class="table  table-bordered" id="table">
                    <thead class="table-dark">
                    <tr>
                        <th>Sl.No</th>
                        <th>Task</th>
                        <th>Start_date</th>
                        <th>End_date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <?php
                    $email = $_SESSION["email"];
                    $sql1 = "select * from `user` where email = '$email'";
                    $res = mysqli_query($conn, $sql1);
                    $data = mysqli_fetch_assoc($res);
                    $id = $data["id"];
                    $sql = "select * from `task` where user_id = $id";
                    $result = mysqli_query($conn, $sql);
                    $sl = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $sl++;

                    ?>
                    
                    <tr>
                    <td><?php echo $sl;  ?></td>
                    <td><?php echo $row["message"];  ?></td>
                    <td><?php echo $row["start_date"];  ?></td>
                    <td><?php echo $row["end_date"];  ?></td>
                    <td><?php echo $row["status"];  ?></td>
                    <td>
                        <a href="task_status_update.php?id=<?php echo $row["id"] ?>">Update</a>
                    </td>
                  
                    </tr>

                    <?php
                    }
                    ?>
                </table>
                 </div>
                 </div>
                 </div>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php

if(isset( $_SESSION["task_status"]) &&  $_SESSION["task_status"] == "task_status"){
echo "<script>alert('Status Update') </script>";
$_SESSION["task_status"] = "";
}
?>
</body>
</html>
