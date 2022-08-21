<?php
include('../connect.php');

if (isset($_POST['btnRegister'])) {
    $customerFirstName = $_POST['customerFirstName'];
    $customerLastName = $_POST['customerLastName'];
    $customerEmail = $_POST['customerEmail'];
    $customerPassword = $_POST['customerPassword'];
    $customerPassword = password_hash($customerPassword, PASSWORD_DEFAULT);
    $customerAddress = $_POST['customerAddress'];
    $customerPhone = $_POST['customerPhone'];

    $query = "INSERT INTO `customer`(`customerFirstName`, `customerLastName` `customerEmail`, `customerPassword`, `customerAddress`, `customerPhone`) VALUES ( '$customerFirstName', '$customerLastName', '$customerEmail' , '$customerPassword' , '$customerAddress' ,  '$customerPhone' )";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "<script>alert('Register successfully')</script>";
        echo "<script>window.open('DW-Assignment-HKZ/signin.html', '_self')</script>";
    } else {
        echo "<script>window.open('DW-Assignment-HKZ/signup.html', '_self')</script>";
        die("Query failed: " . mysqli_error($connection));
    }
    }
?>