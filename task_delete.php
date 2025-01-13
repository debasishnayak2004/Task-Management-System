<?php
include("connection.php");
$id = $_GET["id"];
$sql = "delete  from `task` where id = $id";
$result = mysqli_query($conn, $sql);
session_start();
if($result){
    $_SESSION["task_delete"] = "task_delete";
    header("location: manage_task.php");
    echo "success";
}else{
    echo "error";
}
?>