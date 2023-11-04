<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
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
    <h2>Registration</h2>
    
    <form class="login" action="register_process.php" method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="voter_id" placeholder="VoterID" required>
        <input type="text" name="aadhar_no" placeholder="Aadhar no." required>
        <!-- Add an onclick attribute to the button to perform the redirection -->
        <button onclick="redirectLogin()">Register</button>
    </form>
    
</body>
</html>
