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
    `categoryName` varchar(30) NOT NULL
)";
$result = getResult($connection, $category, 'Category');

$query = "CREATE TABLE IF NOT EXISTS `Product`(
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `productName` varchar(255) NOT NULL,
    `productPrice` int CHECK (productAmount >= 0),
    `productQuantity` int CHECK (productQuantity >= 0),
    `productImage` text,
    `productDescription` text,
    `productStatus` varchar(30),
    `categoryId` int(11),
     FOREIGN KEY (categoryId) REFERENCES `Category`(`id`)
)";
$result = getResult($connection, $query, 'Product');


$query = "CREATE TABLE IF NOT EXISTS `Order`(
    `orderId` varchar(11) NOT NULL PRIMARY KEY,
    `customerId` int(11),
    `orderDate` date,
    `orderLocation` varchar(255),
    `orderPhone` varchar(30),
    `remark` varchar(255),
    `subTotal` int(11),
    `tax` int(11),
    `grandTotal` int,
    `paymentMethod` varchar(30),
    `orderStatus` varchar(30),
    FOREIGN KEY (customerId) REFERENCES `Customer`(`id`)  
)";
$result = getResult($connection, $query, 'Order');

$query = "CREATE TABLE IF NOT EXISTS `OrderDetails`(
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `orderId` varchar(11),
    `productId` int(11),
    `quantity` int(11),
    `price` int(11),
    `total` int(11),
    `status` varchar(30),
    FOREIGN KEY (orderId) REFERENCES `Order`(`orderId`),
    FOREIGN KEY (productId) REFERENCES `Product`(`id`) 
)";
$result = getResult($connection, $query, 'OrderDetails');

$query = "CREATE TABLE IF NOT EXISTS `Bookings`(
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `customerId` int(11),
    `email` varchar(50),
    `bookingType` ENUM('Face to Face', 'Online') DEFAULT 'Face to Face',
    FOREIGN KEY (customerId) REFERENCES `Customer`(`id`)
    )";
$result = getResult($connection, $query, 'Bookings');

$query = "CREATE TABLE IF NOT EXISTS `ContactForms`(
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(50) NOT NULL,
    `email` varchar(30) NOT NULL CHECK (email LIKE '%@%'),
    `phone` varchar(30),
    `message` varchar(255)
    )";
$result = getResult($connection, $query, 'ContactForms');