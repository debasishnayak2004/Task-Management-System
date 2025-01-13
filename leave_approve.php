<?php
include("connection.php");
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "update `leave` set status = 'Approve' where id = $id";
    $result = mysqli_query($conn, $sql);
    session_start();
    if($result){
        $_SESSION["Approve"] = "Approve";
        header("location: all_leave.php");
        echo "success";
    }else{
        echo "error";
    }

}
?>