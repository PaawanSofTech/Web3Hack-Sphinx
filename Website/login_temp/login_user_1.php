<?php
session_start(); // Start the PHP session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    require_once('db_config.php');

    // Retrieve user input from the form
    $name = $_POST["name"];
    $password = $_POST["password"];
    $voter_id = $_POST["voter_id"];
    $aadhar_no = $_POST["aadhar_no"];

    // Query the database to retrieve the user's hashed password, VoterID, and Aadhar number
    $query = "SELECT * FROM users WHERE Name='$name'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['Password'];
        $stored_voter_id = $row['VoterID'];
        $stored_aadhar_no = $row['Aadhar_no'];

        // Verify the entered password, VoterID, and Aadhar number
        if (password_verify($password, $hashed_password) && $voter_id == $stored_voter_id && $aadhar_no == $stored_aadhar_no) {
            // Check if the user has previously logged out
            if (isset($_SESSION['logout_time'])) {
                $userID = $row['ID']; // Replace 'ID' with the actual user ID column name
                $sql = "SELECT `logout_time` FROM `users` WHERE `ID` = ?";

                // Prepare and execute the SQL query to fetch logout_time
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $userID); // Bind the user ID as an integer
                $stmt->execute();
                $stmt->bind_result($logoutTime);
                $stmt->fetch();
                $stmt->close();

                // Calculate the elapsed time in seconds
                $logoutTime = strtotime($logoutTime); // Convert to Unix timestamp
                $currentTime = time(); // Get the current Unix timestamp
                $elapsedTime = $currentTime - $logoutTime;

                // Check if 5 minutes (300 seconds) have passed since logout
                if ($elapsedTime < 300) {
                    // Display a message indicating the login delay
                    echo '<p style="color: red; font-size: 18px;">You can log in again after ' . (300 - $elapsedTime) . ' seconds.</p>';
                } else {
                    // Set session variables with user data
                    $_SESSION['username'] = $row['Name'];
                    $_SESSION['voterid'] = $row['VoterID'];
                    $_SESSION['aadhar'] = $row['Aadhar_no'];

                    // Redirect to profile_user_1.php
                    header("Location: profile_user_1.php");
                    exit();
                }
            } else {
                // Set session variables with user data
                $_SESSION['username'] = $row['Name'];
                $_SESSION['voterid'] = $row['VoterID'];
                $_SESSION['aadhar'] = $row['Aadhar_no'];
            
                // Redirect to a different URL
                header("Location: https://9vx5t59p-3003.inc1.devtunnels.ms/"); // Change this URL to the desired destination
                exit();
            }
            
        }
    }

    // If no matching record or incorrect credentials, display an error message
    echo "<p>Login failed. Please check your credentials.</p>";

    // Close the database connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
     <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet"><link rel="stylesheet" href="login.css">

    <style>
        .container{
            width:500px;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        form {
            background-color: #fff;
            border: 1px solid #ccc;
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
<h2>Login</h2>
<form class="login" action="login_user_1.php" method="post">
    <input type="text" name="name" placeholder="Name" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="text" name="voter_id" placeholder="VoterID" required>
    <input type="text" name="aadhar_no" placeholder="Aadhar no." required>
    <button>Login</button>
</form>
</body>
</html>
