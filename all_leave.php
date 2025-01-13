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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <div class="container mt-4" >
                <h1 class="text-center">All Leave Applications</h1>
                <marquee class="py-3 fs-5">Welcome to your task management system.</marquee>

                <!-- Example content cards -->
                <div class="row" >
                 <div class="col-12 px-4 py-3" >
                 <div class="table-responsive">
                 <table class="table  table-bordered" id="table">
                    <thead class="table-dark">
                    <tr>
                        <th>Sl.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Apply Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <?php
                    $sql = "select * from `leave`";
                    $result = mysqli_query($conn, $sql);
                    $sl = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $sl++;

                    ?>
                    
                    <tr>
                    <td><?php echo $sl;  ?></td>
                    <td><?php echo $row["name"];  ?></td>
                    <td><?php echo $row["email"];  ?></td>
                    <td><?php echo $row["subject"];  ?></td>
                    <td><?php echo $row["message"];  ?></td>
                    <td><?php echo $row["status"];  ?></td>
                    <td><?php echo $row["created_at"];  ?></td>
                    <td>
                        <a href="leave_approve.php?id=<?php echo $row["id"] ?>">Approve</a> <span>|</span>
                        <a href="leave_reject.php?id=<?php echo $row["id"] ?>">Reject</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <?php

if(isset( $_SESSION["Approve"]) &&  $_SESSION["Approve"] == "Approve"){
echo "<script>alert('Leave Application Approve') </script>";
$_SESSION["Approve"] = "";
}
if(isset( $_SESSION["Reject"]) &&  $_SESSION["Reject"] == "Reject"){
    echo "<script>alert('Leave Application Reject') </script>";
    $_SESSION["Reject"] = "";
    }
?>
</body>
</html>
