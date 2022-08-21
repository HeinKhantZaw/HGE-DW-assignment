<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'HGE';
$connection = mysqli_connect($host, $user, $pass, $db);
if (!$connection) {
    die('Could not connect: ' . mysqli_error($connection));
}