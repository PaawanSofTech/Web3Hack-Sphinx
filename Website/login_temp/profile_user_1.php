<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f6fa;
            margin: 0;
            padding: 0;
        }

        /* Profile Container Styles */
        .container {
            padding: 20px;
            margin: 90px auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            max-width: 800px;
            background-color: white;
            text-align: center;
            position: relative; /* Position relative for absolute positioning */
        }

        h2 {
            color: black;
        }

        img.profile-img {
            max-width: 200px;
            margin: 20px auto;
            border-radius: 50%;
            display: block;
        }

        .info {
            text-align: left;
            padding-top: 10px;
            color: #333;
        }

        /* Button Styles */
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .redirect-btn {
            padding: 10px 20px;
            background-color: #5438c3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }

        .redirect-btn:hover {
            background-color: #7453fc;
        }

        /* Logout Button Styles */
        .logout-btn {
            position: absolute;
            top: 10px; /* Adjust the top position as needed */
            right: 10px; /* Adjust the right position as needed */
            padding: 5px 10px;
            background-color: #ff5555;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #ff0000;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Logout Button -->
    <a href="logout.php" class="logout-btn">Logout</a>

    <h2>Welcome to Your Profile</h2>
    
    <?php
    session_start(); // Start the PHP session
    require_once('db_config.php');
    
    // Check if the user is logged in (based on session)
    if (isset($_SESSION['username'])) {
        // Check if the user has previously logged out
        if (isset($_SESSION['logout_time'])) {
            $userID = $_SESSION['ID']; // Replace 'ID' with the actual user ID column name
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
                echo '<p style="color: red; font-size: 18px;">You can log in again after ' . (300 - $elapsedTime) . ' seconds.</p>';
            } else {
                // Proceed with displaying the user's profile information
                echo '
                <div class="row">
                    <div class="col-sm-4">
                        <div class="media">
                            <img class="profile-img" src="../img/profile.jpg" alt="Profile Image">
                        </div>
                    </div>
                    <div class="col-sm-8 info">
                        <h2>Name: ' . $_SESSION['username'] . '</h2>
                        <h2>VID: ' . $_SESSION['voterid'] . '</h2>
                        <h2>AADHAR: ' . $_SESSION['aadhar'] . '</h2>
                    </div>
                </div>';
                
                // Add a button for redirection
                echo '
                <div class="btn-container">
                    <a href="../login_face.html" class="redirect-btn">Vote</a>
                </div>';
            }
        } else {
            // Proceed with displaying the user's profile information if logout_time is not set
            echo '
            <div class="row">
                <div class="col-sm-4">
                    <div class="media">
                        <img class="profile-img" src="../img/profile.jpg" alt="Profile Image">
                    </div>
                </div>
                <div class="col-sm-8 info">
                    <h2>Name: ' . $_SESSION['username'] . '</h2>
                    <h2>VID: ' . $_SESSION['voterid'] . '</h2>
                    <h2>AADHAR: ' . $_SESSION['aadhar'] . '</h2>
                </div>
            </div>';
            
            // Add a button for redirection
            echo '
            <div class="btn-container">
                <a href="http://localhost:3000" class="redirect-btn">Vote</a>
            </div>';
        }
    } else {
        // If the user is not logged in, display a message and link to register
        echo '<p style="color: red; font-size: 18px;">User not found. Please register first.</p>';
        echo '<a href="register_user_1.php" style="text-decoration: none; padding: 10px 20px; background-color: #3498db; color: #fff; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">Register</a>';
    }
    
    // Close the database connection
    mysqli_close($conn);
    ?>
</div>

</body>
</html>