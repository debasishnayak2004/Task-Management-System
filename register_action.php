<?php
include("connection.php");
if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["gender"]) && isset($_POST["password"]) && isset($_POST["confirmPassword"]));
$pass = $_POST["password"];
$password = md5($pass);
$confirmPassword = $_POST["confirmPassword"];
if($pass == $confirmPassword){
 $email = $_POST["email"];
$name = $_POST["name"];
$gender = $_POST["gender"];
$sql1 = "select * from `user` where email = '$email'";
$res = mysqli_query($conn, $sql1);
session_start();
if(mysqli_num_rows($res) > 0){
    $_SESSION["email_error"] = "email_error";
    header("location: index.php");
}else{
    $sql = "insert into `user` (name, email, gender, password) values ('$name', '$email', '$gender', '$password')";
$result = mysqli_query($conn, $sql);
if($result){
    $_SESSION["register_success"] = "register_success";
    header("location: login.php");
}else{
    echo "error";
}
}
}else{
    // header("location: index.php");
    // $_SESSION["password_error"] = "password_error";
    echo "password error";
}

?>