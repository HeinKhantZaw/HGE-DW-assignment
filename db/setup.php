<?php
include 'connect.php';

function getResult(mysqli $connection, $query, $name)
{
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "<p>Table $name created successfully</p>";
    } else {
        die("Query failed: " . mysqli_error($connection));
    }
    return $result;
}

$customer = "CREATE TABLE IF NOT EXISTS `Customer` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `customerFirstName` varchar(50),
    `customerLastName` varchar(50),
    `customerEmail` varchar(50),
    `customerPassword` varchar(255),
    `customerAddress` varchar(255),
    `customerPhone` varchar(30),
    `Image` Text,
    `viewCount` int(11) DEFAULT 1
)";


$result = getResult($connection, $customer, 'Customer');

$loginAttempt = "CREATE TABLE IF NOT EXISTS `LoginAttempt` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `customerId` int(11),
    `loginTime` varchar(30),
    `loginIP` varchar(30),
    FOREIGN KEY (customerId) REFERENCES `Customer`(`id`)
)";
$result = getResult($connection, $loginAttempt, 'LoginAttempt');


$category = "CREATE TABLE IF NOT EXISTS `Category`(
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `categoryName` varchar(30)
)";
//$result = getResult($connection, $category, 'Category');

$query = "CREATE TABLE IF NOT EXISTS `Product`(
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `productName` varchar(255),
    `productAmount` int,
    `productQuantity` int,
    `productImage` text,
    `productDescription` varchar(255),
    `productStatus` varchar(30),
    `categoryId` int(11),
     FOREIGN KEY (categoryId) REFERENCES `Category`(`id`)
)";
$result = getResult($connection, $query, 'Product');
