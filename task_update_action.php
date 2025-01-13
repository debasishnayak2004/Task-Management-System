<?php
include("connection.php");
if(isset($_POST["id"]) && isset($_POST["user_id"]) && isset($_POST["message"]) && isset($_POST["start_date"]) && isset($_POST["end_date"])){
    $id = $_POST["id"];
    $user_id = $_POST["user_id"];
    $message = $_POST["message"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $sql = "update `task` set user_id = '$user_id', message = '$message', start_date = '$start_date', end_date = '$end_date' where id = $id";
    $result = mysqli_query($conn, $sql);
    session_start();
    if($result){
        $_SESSION["update_task"] = "update_task";
        header("location: manage_task.php");
        echo "success";
    }else{
        echo "error";
    }
}

?>