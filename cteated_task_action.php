<?php
include("connection.php");
if(isset($_POST["user_id"]) && isset($_POST["massage"]) && isset($_POST["start_date"]) && isset($_POST["end_date"])){
    $user_id = $_POST["user_id"];
    $message = $_POST["massage"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $sql = "insert into `task` (user_id, message, start_date, end_date) values ('$user_id', '$message', '$start_date', '$end_date')";
    $result = mysqli_query($conn, $sql);
    session_start();
    if($result){
        $_SESSION["task"] = "task";
        header("location: create_task.php");
        echo "success";
    }else{
        echo "error";
    }
}
?>