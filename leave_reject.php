<?php
include("connection.php");
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "update `leave` set status = 'Reject' where id = $id";
    $result = mysqli_query($conn, $sql);
    session_start();
    if($result){
        $_SESSION["Reject"] = "Reject";
        header("location: all_leave.php");
        echo "success";
    }else{
        echo "error";
    }

}
?>