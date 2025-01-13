<?php
include("connection.php");
session_start();
if(isset($_POST["subject"]) && isset($_POST["message"])){
$email = $_SESSION["email"];
$name =  $_SESSION["name"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$sql = "insert into `leave` (email, name, subject, message) values ('$email', '$name', '$subject', '$message')";
$result = mysqli_query($conn, $sql);
if($result){
    $_SESSION["apply_leave"] = "apply_leave";
    header("location: apply_leave.php");
    echo "success";
}else{
    echo "error";
}
}
?>