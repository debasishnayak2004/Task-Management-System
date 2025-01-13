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
            height: auto;
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
                <h1 class="text-center">Create a new Task</h1>
                <marquee class="py-3 fs-5">Welcome to your task management system.</marquee>

                <!-- Example content cards -->
                <div class="row">
                    <div class="col-8 offset-2">
                    <form action="cteated_task_action.php" method="post">
                            <div class=" mb-2">
                                <label for="comment">Select User:</label>
                                <select class="form-select mt-2" name="user_id" required>
                                    <option>--Select--</option>
                                    <?php
                                        $sql = "select * from `user` where roll = 0";
                                        $result = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_assoc($result)){

                                    ?>
                                    <option value="<?php echo $row["id"]  ?>"><?php echo $row["name"]; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class=" mb-2">
                                <label  for="comment">Task:</label>
                                <textarea class="form-control mt-2" rows="5" placeholder="Enter Task Message...." id="message" name="massage" required></textarea>
                            </div>
                            <div class="mb-2 ">
                                <label for="studentName" class="form-label">Start Date :</label>
                                <input type="date" name="start_date" class="form-control" id="start_date" placeholder="Enter Expiry Date"  required>
                            </div>
                            <div class="mb-2 ">
                                <label for="studentName" class="form-label">End Date :</label>
                                <input type="date" name="end_date" class="form-control" id="end_date" placeholder="Enter Expiry Date"  required>
                            </div>
  
  
                            <button type="submit" class="btn btn-primary w-100 my-3 ">Create</button>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php

if(isset( $_SESSION["task"]) &&  $_SESSION["task"] == "task"){
echo "<script>alert('Add Task Success') </script>";
$_SESSION["task"] = "";
}
?>
</body>
</html>
