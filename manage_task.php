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
                <h1 class="text-center">All Assigned Tasks</h1>
                <marquee class="py-3 fs-5">Welcome to your task management system.</marquee>

                <!-- Example content cards -->
               
                <div class="row">
                 <div class="col-12 px-4 py-3">
                 <table class="table  table-hover table-responsive">
                    <thead class="table-dark">
                    <tr>
                        <th>Sl.No</th>
                        <th>Name</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Start_Date</th>
                        <th>End Date</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                    </thead>
                    <?php
                    $sql = "select task.id as task_id, task.message, task.status, task.start_date, task.end_date, user.name from `task` left join `user` on task.user_id = user.id";
                    $result = mysqli_query($conn, $sql);
                    $sl = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $sl++;

                    ?>
                    
                    <tr>
                    <td><?php echo $sl;  ?></td>
                    <td><?php echo $row["name"];  ?></td>
                    <td><?php echo $row["message"];  ?></td>
                    <td><?php echo $row["status"];  ?></td>
                    <td><?php echo $row["start_date"];  ?></td>
                    <td><?php echo $row["end_date"];  ?></td>
                    <td><a href="task_delete.php?id=<?php echo $row["task_id"] ?>">Delete</a></td>
                    <td><a href="task_update.php?id=<?php echo $row["task_id"] ?>">Update</a></td>
                    </tr>

                    <?php
                    }
                    ?>
                </table>
                 </div>
                 </div>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php

        if(isset($_SESSION["task_delete"]) &&  $_SESSION["task_delete"] == "task_delete"){
        echo "<script>alert('Delete Success') </script>";
        $_SESSION["task_delete"] = "";
        }
        if(isset($_SESSION["update_task"]) &&  $_SESSION["update_task"] == "update_task"){
            echo "<script>alert('Task Update Success') </script>";
            $_SESSION["update_task"] = "";
            }
?>

</body>
</html>
