<?php
require_once('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $voter_id = $_POST['voter_id'];
    $aadhar_no = $_POST['aadhar_no'];

    // Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO users (Name, Password, VoterID, Aadhar_no) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $hashed_password, $voter_id, $aadhar_no);

    if ($stmt->execute()) {
        echo "Registration successful!";
        // Redirect the user to ../index.html after 5 seconds
        echo '<script>
            setTimeout(function(){
                window.location.href = "register_user_1.php";
            }, 500);
        </script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
