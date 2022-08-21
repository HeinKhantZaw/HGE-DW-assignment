<?php
session_start();
include 'db/connect.php';
if(isset($_POST['btnLogin'])){
    $email = $_POST['customerEmail'];
    $password = $_POST['customerPassword'];
    $query = "SELECT * FROM `customer` WHERE `customerEmail` = '$email'";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if($count == 0){
        echo "<script>alert('Email does not exist')</script>";
        echo "<script>window.open('login.php', '_self')</script>";
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
        $time = time() - (3 * 60);
        $query = "SELECT count(*) as total_attempts from LoginAttempt where loginTime > $time and loginIP ='$ip'";
        $result = mysqli_query($connection, $query);
        $login_data = mysqli_fetch_assoc($result);
        $total_login_attempts = $login_data['total_attempts'];
        if ($total_login_attempts == 3) {
            echo "<script>alert('Too many failed attempts. Please try after 3 minutes.')</script>";
        }
        $row = mysqli_fetch_assoc($result);
        $db_password = $row['Password'];
        if(password_verify($password, $db_password)){
            $_SESSION['cid'] = $row['id'];
            $_SESSION['cname'] = $row['customerName'];
            echo "<script>alert('Login successful');</script>";
            echo "<script>window.open('product_display.php', '_self')</script>";
        }else{

        }
    }
}
?>