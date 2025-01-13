<?php
include("connection.php");
if(isset($_POST["id"]) && isset($_POST["status"])){
    $id = $_POST["id"];
    $status = $_POST["status"];
    $sql = "update `task` set status = '$status' where id = $id";
    $result = mysqli_query($conn, $sql);
    session_start();
    if($result){
        $_SESSION["task_status"] = "task_status";
        header("location: update_task.php");
        echo "success";
    }else{
        echo "erroe";
    }
}
?>