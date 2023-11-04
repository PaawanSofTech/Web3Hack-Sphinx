<?php
session_start(); // Start the PHP session
require_once('db_config.php'); // Include your database configuration

// Check if the user is logged in (based on session)
if (isset($_SESSION['username'])) {
    $userID = $_SESSION['ID']; // Replace 'ID' with the actual user ID column name

    // Get the current timestamp for logout_time
    $logoutTime = date("Y-m-d H:i:s");

    // Update the logout_time column with the current timestamp
    $sql = "UPDATE `users` SET `logout_time` = ? WHERE `ID` = ?";

    // Prepare and execute the SQL query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $logoutTime, $userID); // Bind the timestamp and user ID
    $stmt->execute();

    // Record the login time in the login_time column
    $loginTime = date("Y-m-d H:i:s");
    $sql = "UPDATE `users` SET `login_time` = ? WHERE `ID` = ?";

    // Prepare and execute the SQL query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $loginTime, $userID); // Bind the timestamp and user ID
    $stmt->execute();

    // Destroy the session
    session_destroy();

    // Redirect the user to another page (e.g., login page)
    header("Location: ../index.html"); // Replace with your desired URL
    exit();
} else {
    // Handle the case where the user is not logged in
    echo '<p style="color: red; font-size: 18px;">You are not logged in.</p>';
    // Optionally, provide a link to the login page
    // ...
}

?>
