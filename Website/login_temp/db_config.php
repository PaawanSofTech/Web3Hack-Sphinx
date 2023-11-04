<?php
// Database connection configuration
$host = "localhost"; // e.g., localhost
$username = "root";
$password = "";
$database = "new_1";

// Create a connection to the database
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
