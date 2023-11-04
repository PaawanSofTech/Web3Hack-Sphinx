<?php
require_once "config.php";

$admin_name = $password = $confirm_password = "";
$admin_name_err = $password_err = $confirm_password_err = "";
$voterid = "";
$aadhar = "";
$voterid_err = "";
$contact = "";
$contact_err = "";
$aadhar_err = "";
$address_err = "";
$city_err = "";
$state_err = "";
$zip_err = "";
$address = "";
$city = "";
$state = "";
$zip = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check for admin_name
    if (empty(trim($_POST['admin_name']))) {
        $admin_name_err = "admin_name cannot be blank";
    } else {
        $admin_name = trim($_POST['admin_name']);
    }

    // Check if voterid is empty
    if (empty(trim($_POST["voterid"]))) {
        $voterid_err = "voterid cannot be blank";
    } else {
        $sql = "SELECT id FROM admin WHERE voterid = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_voterid);
            $param_voterid = trim($_POST['voterid']);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $voterid_err = "This voterid is already created";
                    echo '<script>alert("This voterid is already created")</script>';
                } else {
                    $voterid = trim($_POST['voterid']);
                }
            } else {
                echo "Something went wrong";
            }
            mysqli_stmt_close($stmt);
        }
    }

    // Check if aadhar is empty
    if (empty(trim($_POST['aadhar']))) {
        $aadhar_err = "aadhar cannot be blank";
    } else {
        $sql = "SELECT id FROM admin WHERE aadhar = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_aadhar);
            $param_aadhar = trim($_POST['aadhar']);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $aadhar_err = "This aadhar is already created";
                    echo '<script>alert("This aadhar is already created")</script>';
                } elseif (strlen(trim($_POST['aadhar'])) < 12) {
                    $aadhar_err = "Aadhar No. cannot be less than 12 characters";
                } else {
                    $aadhar = trim($_POST['aadhar']);
                }
            } else {
                echo "Something went wrong";
            }
            mysqli_stmt_close($stmt);
        }
    }

    // Check for password
    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be blank";
    } elseif (strlen(trim($_POST['password'])) < 5) {
        $password_err = "Password cannot be less than 5 characters";
    } else {
        $password = trim($_POST['password']);
    }

    // Check for confirm password field
    if (trim($_POST['password']) != trim($_POST['confirm_password'])) {
        $password_err = "Passwords should match";
        echo '<script>alert("Passwords should match")</script>';
    }

    // Check if contact is empty
    if (empty(trim($_POST["contact"]))) {
        $contact_err = "Contact cannot be blank";
    } elseif (strlen(trim($_POST["contact"])) != 10) {
        $contact_err = "Contact must be 10 digits";
    } else {
        $contact = trim($_POST["contact"]);
    }

    // Check if address is empty
    if (empty(trim($_POST["address"]))) {
        $address_err = "Address cannot be blank";
    } else {
        $address = trim($_POST["address"]);
    }

    // Check if city is empty
    if (empty(trim($_POST["city"]))) {
        $city_err = "City cannot be blank";
    } else {
        $city = trim($_POST["city"]);
    }

    // Check if state is empty
    if (empty(trim($_POST["state"]))) {
        $state_err = "State cannot be blank";
    } else {
        $state = trim($_POST["state"]);
    }

    // Check if zip is empty
    if (empty(trim($_POST["zip"]))) {
        $zip_err = "Zip code cannot be blank";
    } else {
        $zip = trim($_POST["zip"]);
    }

    // If there are no errors, insert into the database
    if (empty($admin_name_err) && empty($password_err) && empty($confirm_password_err) && empty($voterid_err) && empty($aadhar_err) && empty($contact_err) && empty($address_err) && empty($city_err) && empty($state_err) && empty($zip_err)) {
        $sql = "INSERT INTO admin (admin_name, password, voterid, aadhar, contact, address, city, state, zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_admin_name, $param_password, $param_voterid, $param_aadhar, $param_contact, $param_address, $param_city, $param_state, $param_zip);

            // Set parameters
            $param_admin_name = $admin_name;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_voterid = $voterid;
            $param_aadhar = $aadhar;
            $param_contact = $contact;
            $param_address = $address;
            $param_city = $city;
            $param_state = $state;
            $param_zip = $zip;

            // Execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                header("location: redirect_admin.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($conn);
}
?>







<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP login system!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html" style="font-size: 20px;">EXIT
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    
    

    <div class="container mt-4">
        <h3>Please Register Here:</h3>
        <hr>
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputadmin_name">Admin Name</label>
                    <input type="text" class="form-control" name="admin_name" id="inputadmin_name"
                        placeholder="User Name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword"
                        placeholder="Password" required minlength="5" maxlength="20">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword4">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" id="inputPassword"
                    placeholder="Confirm Password" required minlength="5" maxlength="20">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputvoterid">Voter ID</label>
                    <input type="text" class="form-control" name="voterid" id="inputvoterid" placeholder="Voter ID"
                        required minlength="10" maxlength="10">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputaadhar">Aadhar No.</label>
                    <input type="text" class="form-control" name="aadhar" id="inputaadhar" placeholder="Aadhar"
                        minlength="12" maxlength="12">
                </div>
            </div>
            <div class="form-group">
                <label for="inputContact">Contact No.</label>
                <input type="text" class="form-control" name="contact" id="inputContact" placeholder="Contact No."
                    required minlength="10" maxlength="10">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Address </label>
                <input type="text" class="form-control" name="address" id="inputAddress"
                    placeholder="Apartment, studio, or floor" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" name="city" id="inputCity" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" name="state" class="form-control" required>
                        <option selected>Choose...</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" name="zip" id="inputZip" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>