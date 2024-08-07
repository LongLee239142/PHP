<?php
// Replace these variables with your database credentials
$servername = "localhost";
$username_db = "root";
$password_db = "12345678";
$dbname = "demo_db_php";

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>