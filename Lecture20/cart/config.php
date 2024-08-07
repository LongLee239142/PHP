<?php
// Replace these variables with your database credentials
$servername = "localhost";
$usernameConnect = "root";
$passwordConnect = "12345678";
$dbname = "shopping_cart_php";

// Create a connection to the MySQL database
$conn = new mysqli($servername, $usernameConnect, $passwordConnect, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>