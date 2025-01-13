<?php
include("connection.php");
if(isset($_POST["email"]) && isset($_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "select * from `user` where email = '$email' && password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    session_start();
    if(mysqli_num_rows($result) > 0 && $row["roll"] == 0){
        $name = $row["name"];
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $name;
        $_SESSION["login_success"] = "login_success";
        header("location: user_dashboard.php");
    }
    if(mysqli_num_rows($result) > 0 && $row["roll"] == 1){
         $name = $row["name"];
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $name;
        $_SESSION["login_success"] = "login_success";
        header("location: admin_dashboard.php");
    }
    if($row["password"] != $password && $row["email"] != $email){
        $_SESSION["password_error"] = "error";
        echo "error";
       header("location: login.php");
   }
//    if($row["email"] != $email){
//     $_SESSION["email_error"] = "error";
//     echo "error";
//    header("location: login.php");
// }
    // else{
    //     $_SESSION["email_error"] = "error";
    //    }
    //    if(isset($_SESSION["email_error"]) && $_SESSION["email_error"] == "error"){
    //     echo "<script> alert(' Invalid Email Id');   </script>";
    //     $_SESSION["email_error"] = "";
    //   }
}
?>